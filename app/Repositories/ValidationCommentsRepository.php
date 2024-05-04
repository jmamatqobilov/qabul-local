<?php
namespace App\Repositories;
use App\Models\Application;
use App\Models\MObject;
use App\Models\ApplicationStatus;
use App\Models\RObject;
use App\Models\SObject;
use App\Models\TObject;
use App\Models\ValidationComment;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;


class ValidationCommentsRepository extends Repository {

    public function __construct(ValidationComment $validationComment) {
        $this->model = $validationComment;
    }

    public function getObjectComment($objectID, Application $application, $fieldname){
        return $this->get(false,0,[
            [$application->direction->code.'_object_id', '=', $objectID],
            ['field_name', '=', $fieldname]
        ])->latest()->first();
    }

    public function getObjectComments($objectID, Application $application){
        $existComments = $this->get(false,0,[[$application->direction->code.'_object_id','=',$objectID],['is_solved','=',false]]);
        $objectComments = [];
        foreach($existComments as $comment){
            $objectComments[$comment->field_name] = $comment->comment;
        }
        return $objectComments;
     }

     public function commentsolved($Object, $fieldname){
        $Object->comments()->where('field_name', $fieldname)->update(['is_solved'=>true]);
     }

     public function isCommentExistOnField($Object, $fieldname, $value){
        if(
            $Object->comments()->where([
                ['field_name','=',$fieldname],
                ['comment','=',$value],
                ['is_solved','=',false]
            ])->first() === null
        )
            return false;
        return true;
     }

    public function setcomments($object, Application $application, $curObject) {
        $curObject = $application->getCurrentModel()->where('id',$curObject)->first();
        $thisModelFileAreas = $curObject->getFileAreas();
        $getFields = [];
        foreach ($thisModelFileAreas as $fileArea){
            $getFields[] = $fileArea[0].'_comment';
            $getFields[] = $fileArea[0].'_del';
        }
        $data = $object->only($getFields);
        if(empty($data)){
            return ['error'=>'No Data'];
        }
        $isAddSuccess = false;
        foreach($data as $fieldname=>$fieldsComment){
            if($fieldsComment){
                if(Str::endsWith($fieldname, 'comment')) {
                    if(!$this->isCommentExistOnField($curObject, $fieldname, $fieldsComment)) {
                        $validationComment = new ValidationComment([
                            $application->direction->code . '_object_id' => $curObject->id,
                            'field_name' => $fieldname,
                            'comment' => $fieldsComment
                        ]);
                        $validationComment->save();
                    }else{
                        continue;
                    }
                }else{
                    $this->commentsolved($curObject,Str::replaceFirst('del','comment',$fieldname));
                }
                $isAddSuccess = true;
            }
        }
        if($isAddSuccess){
            return ['success'=> __('Comments Added')];
        }
        return ['error'=> __('Internal Error')];
    }
}
