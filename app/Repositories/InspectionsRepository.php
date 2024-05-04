<?php
namespace App\Repositories;
use App\Http\Requests\InspectionRequest;
use App\Models\Application;
use App\Models\Inspection;
use App\Models\Photo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Spatie\Image\Image;


class InspectionsRepository extends Repository {

    public function __construct(Inspection $inspection) {
        $this->model = $inspection;
    }

    public function add(InspectionRequest $inspectionRequest, Application $application){
        $data = $inspectionRequest->validated();
        if(empty($data)){
            return ['error'=>'No Data'];
        }
        if($inspectionRequest->hasFile('inspection_act'))
            $data['inspection_act'] = $inspectionRequest->file('inspection_act')->store('documents/d'.$inspectionRequest->user()->id);

        $this->model->fill($data);
        if ($result = $application->inspections()->save($this->model)) {
            $data = $inspectionRequest->only('title');
            if($inspectionRequest->hasFile('photo'))
                foreach($inspectionRequest->file('photo') as $key=>$photo){
                    $photo = $photo->store('photos/a'.$application->id);
                    if(!File::isDirectory('photos/a'.$application->id.'/thumbs')) {
                        File::makeDirectory('photos/a'.$application->id.'/thumbs');
                    }
                    Image::load($photo)->width(200)->height(200)
                        ->save(
                            Str::replaceFirst('a'.$application->id,'a'.$application->id.'/thumbs',$photo)
                        );
                    $photo_data['url'] = $photo;
                    $photo_data['title'] = $data['title'][$key];
                    if (!$result->photos()->save(new Photo($photo_data))) {
                        return ['error'=>'Error while adding photo to inspection.'];
                    }
                }
            return $result;
        }
    }

    public function edit(InspectionRequest $inspectionRequest, Inspection $inspection){
        $data = $inspectionRequest->validated();

        if(empty($data)){
            return ['error'=> __('No Data')];
        }
        if($inspectionRequest->hasFile('inspection_act'))
            $data['inspection_act'] = $inspectionRequest->file('inspection_act')->store('documents/d'.$inspectionRequest->user()->id);

        if($inspection->fill($data)->update()) {
            return $inspection;
        }
        return ['error'=> __('Internal Error')];
    }
}
