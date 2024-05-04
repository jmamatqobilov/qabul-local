<?php

namespace App\Repositories;

use App\Filters\ObjectFilters;
use App\Helpers\General\CollectionHelper;
use App\Http\Requests\Request;
use App\Models\Application;
use App\Models\Document;
use App\Models\MObject;
use App\Models\RObject;
use App\Models\SObject;
use App\Models\Territory;
use App\Models\TObject;
use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ObjectsRepository extends Repository
{

    public function __construct(ObjectFilters $obj_filt)
    {
        $this->filter = $obj_filt;
    }

    public function getobjects(Application $application)
    {
        $this->model = $application->getCurrentModel();
        return $this->get(true, 20, [['application_id', '=', $application->id]]);
    }

    public function getAllObjects($user = false, $territory = false)
    {
        $applicationFilter = false;
        if ($user)
            $applicationFilter = ['name' => 'application', 'field' => 'owner_id', 'value' => $user->id];
        if ($territory)
            $applicationFilter = ['name' => 'application', 'field' => 'hududiy_id', 'value' => $territory->id];

        $toReturn = new \Illuminate\Database\Eloquent\Collection;
        $this->model = new TObject;
        $toReturn = $toReturn->concat($this->get(false, 20, false, $applicationFilter));
        $this->model = new MObject;
        $toReturn = $toReturn->concat($this->get(false, 20, false, $applicationFilter));
        $this->model = new SObject;
        $toReturn = $toReturn->concat($this->get(false, 20, false, $applicationFilter));
        $this->model = new RObject;
        $toReturn = $toReturn->concat($this->get(false, 20, false, $applicationFilter));
        return $toReturn;
    }

    public function getObjectPointsToMapArray()
    {
        $userRole = Auth::user()->roles->first();
        $objectformap = [
            'type' => 'FeatureCollection',
            'features' => []
        ];
        $counter = 0;
        if (Auth::user()->direction){
            $objects = $this->getAllObjectsList(Auth::user()->direction, false);
//            dd($objects);
        }
        else{
            $objects = $this->getAllObjects();
//            dd($objects);
        }
        foreach ($objects as $object) {
            $coords = json_decode($object->punkt_ustanovki_location);
            $objectformap['features'][] = [
                'type' => 'Feature',
                'id' => $counter++,
                'properties' => [
                    'balloonContent' => __('messages.object-balloon',
                        [
                            'ahref' => route($userRole->code . '.applications.objects.show', ['application' => $object->application->id, 'object' => $object->id]),
                            'id' => $object->id,
                            'object-type' => $object->object_type->name,
                            'applicant' => $object->application->owner->company_name,
                        ]),
                    'clusterCaption' => $object->object_type->name,
                    'hintContent' => $object->object_type->name
                ],
                'options' => ['strokeWidth' => 3, 'strokeColor' => '#1b55cf'],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => $coords[0],
                ]
            ];
            $objectformap['features'][] = [
                'type' => 'Feature',
                'id' => $counter++,
                'properties' => [
                    'balloonContent' => __('messages.object-balloon',
                        [
                            'ahref' => route($userRole->code . '.applications.objects.show', ['application' => $object->application->id, 'object' => $object->id]),
                            'id' => $object->id,
                            'object-type' => $object->object_type->name,
                            'applicant' => $object->application->owner->company_name,
                        ]),
                    'clusterCaption' => $object->object_type->name,
                    'hintContent' => $object->object_type->name
                ],
                'options' => ['strokeWidth' => 3, 'strokeColor' => '#1b55cf'],
                'geometry' => [
                    'type' => 'LineString',
                    'coordinates' => $coords,
                ]
            ];
        }
//        dd($objectformap);
        return $objectformap;
    }

    public function getAllObjectsList($direction = false, $use_pagination = true)
    {
        if ($direction) {
            if (is_object($direction))
                $direction_code = $direction->code;
            else $direction_code = $this->filterFunctionality('direction', 't');
            $model_name = 'App\Models\\' . Str::upper($direction_code) . 'Object';
            $this->model = new $model_name;
            return $this->get($use_pagination);
        } else {
            return CollectionHelper::paginate($this->getAllObjects(), 20);
        }
        return false;
    }

    public function filterFunctionality($key, $default = false)
    {
        if (request()->filled($key))
            return request()->get($key);
        if ($default) return $default;
        return false;
    }

    public function getUserObjects(User $user)
    {
        return CollectionHelper::paginate($this->getAllObjects($user), 20);
    }

    public function getTerritoryObjects(Territory $territory)
    {
        return CollectionHelper::paginate($this->getAllObjects(false, $territory), 20);
    }

    public function getobjcount(Application $application)
    {
        $this->model = $application->getCurrentModel();
        return $this->getcount([['application_id', '=', $application->id]]);
    }

    public function getObjectCommentFields($object, Application $application)
    {
        $this->model = $application->getCurrentModel();
        $thisObject = $this->one($object);
        $arrFields = [];
        if ($thisObject->comments->where('is_solved', false)->count() > 0) {
            foreach ($thisObject->comments->where('is_solved', false) as $comment) {
                $arrFields[] = Str::replaceFirst('_comment', '', $comment->field_name);
            }
        }
        return $arrFields;
    }

    public function getObject($object, Application $application, DocumentsRepository $doc_rep)
    {
//        dd($object); // object-id
//        Document::where('');
        $this->model = $application->getCurrentModel();
        $thisFieldsList = $this->model->getFileAreas();
        $thisObject = $this->one($object);
//        dd($thisObject->documents);
//        dd($thisFieldsList);
        foreach ($thisFieldsList as $filefield) {
            if ($filefield[1] == 'file') {
                //                dd($filefield[0]);
                //                dd($thisObject->$fieldname); // invalid
                //                dd($doc_rep->one($thisObject->$fieldname));
                $fieldname = $filefield[0];
//                dd($fieldname);
//                dd($thisObject);
//                dd($doc_rep);
//                dd($thisObject);
                if (is_int($thisObject->$fieldname)) {
                    $thisObject->$fieldname = $doc_rep->one($thisObject->$fieldname);
                }
            }
        }
        if ($thisObject->comments->where('is_solved', false)->count() > 0) {
            foreach ($thisObject->comments->where('is_solved', false) as $comment) {
                $field_name = $comment->field_name;
                $thisObject->append($field_name);
                $thisObject->$field_name = $comment->comment;
            }
        }
        return $thisObject;
    }

    public function add($object, Application $application, DocumentsRepository $doc_rep)
    {
        $validator = Validator::make(
            \request()->file(),
            $application->getCurrentModel()->getValidationFilesArray()
        );

        if ($validator->fails()) {
            return back()->withInput()->with(['error'=>$validator->errors()->first()]);
        }

        $this->model = $application->getCurrentModel();
        $thisModelFileAreas = $this->model->getFileAreas();
        $data = $object->only(Arr::pluck($thisModelFileAreas, 0));
        if (empty($data)) {
            return ['error' => 'No Data'];
        }

//        dd($data);
        $this->model->fill($data);

//        dd($this->model);
//dd('salam');
        if ($this->model->child_prefix == 't') {
            $object_type = 't';
            $object_data = $application->objects()->save($this->model);
        } elseif ($this->model->child_prefix == 's') {
            $object_type = 's';
            $object_data = $application->objects()->save($this->model);
        } elseif ($this->model->child_prefix == 'r') {
            $object_type = 'r';
            $object_data = $application->objects()->save($this->model);
        } else {
            $object_type = 'm';
            $object_data = $application->objects()->save($this->model);
        }

//dd($thisModelFileAreas); // all file areas
        foreach ($thisModelFileAreas as $fileArea) {
//            dd($fileArea);
            if ($fileArea[1] == 'file') {
                $doc_type = $fileArea[0];
//                dd($doc_type); // podr_license
//                dd($fileArea); //array 1 => podr_license
                if ($data[$fileArea[0]] != 0) {
                    if (!$doc_rep->validateDocument($data[$fileArea[0]], $object->user()->id)) return ['error' => __('Unauthorized use of file')];
                }
                if ($object->hasFile($fileArea[0] . '_file')) {
                    foreach ($object->file($fileArea[0] . '_file') as $file) {
                        $doc_rep->saveDocument($file, $object->user(), $doc_type, $object_data->id, $object_type);
                    }
                }
            }
        }

    }

    public function updateobject($object, Application $application, $curObject, DocumentsRepository $doc_rep)
    {

        $validator = Validator::make(
            \request()->file(),
            $application->getCurrentModel()->getValidationFilesArray()
        );

        if ($validator->fails()) {
            return back()->withInput()->with(['error'=>$validator->errors()->first()]);
        }
        $this->model = $application->getCurrentModel();
        $curObject = $this->one($curObject);
        $thisModelFileAreas = $this->model->getFileAreas();
        $data = $object->only(Arr::pluck($thisModelFileAreas, 0));
        if (empty($data)) {
            return ['error' => 'No Data'];
        }


        $curObject->fill($data)->update();

        if ($curObject->child_prefix == 't') {
            $object_type = 't';
        } elseif ($curObject->child_prefix == 's') {
            $object_type = 's';
        } elseif ($curObject->child_prefix == 'r') {
            $object_type = 'r';
        } else {
            $object_type = 'm';
        }


        foreach ($data as $key => $value) {
            $thisField = Arr::first($thisModelFileAreas, function ($value) use ($key) {
                return $value[0] === $key;
            });
            if ($thisField[1] == 'file') {
                if ($value != 0) {
                    if (!$doc_rep->validateDocument($value, $object->user()->id)) return ['error' => __('Unauthorized use of file')];
                }
                $doc_type = $key;
//                dd($data[$key]);
//                dd($key);
//                dd($object->file($key . '_file'));
                if ($object->hasFile($key . '_file')) {
//                    dd($curObject->child_prefix);
                    foreach ($object->file($key . '_file') as $file){
//                        if ($curObject->child_prefix = 't') {
                        $doc_rep->saveDocument($file, $object->user(), $doc_type, $curObject->id, $object_type);
//                        }
//                    $data[$key] = $doc_rep->saveDocument($object->file($key . '_file'), $object->user(), $doc_type,);
//                        $data[$key] = $name;
                    }
                }
            }
        }
/*
        if ($curObject->fill($data)->update()) {
            return $object;
        }
        */
//        return $object;
//        return ['error' => __('Internal Error')];
    }

    public function delete(Application $application, $object)
    {
        $this->model = $application->getCurrentModel();
        if ($this->one($object)->delete()) {
            foreach ($this->one($object)->endpoints()->get() as $item) {
                $item->delete();
            }
            return $application;
        }
    }

    public function restore(Application $application, $object)
    {
        $this->model = $application->getCurrentModel();
        if ($this->one($object)->restore()) {
            foreach ($this->one($object)->endpoints_all()->whereNotNull('deleted_at')->get() as $item) {
                $item->restore();
            }
            return $application;
        }
    }
}
