<?php
namespace App\Repositories;
use App\Http\Requests\ExtendMessageRequest;
use App\Http\Requests\PhotoRequest;
use App\Models\Application;
use App\Models\ExtendMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class MessagesRepository extends Repository {

    public function __construct(ExtendMessage $extendMessage) {
        $this->model = $extendMessage;
    }

    public function add(ExtendMessageRequest $photoRequest, Application $application){
        $data = $photoRequest->validated();
        if(empty($data)){
            return ['error'=>'No Data'];
        }

        if($photoRequest->hasFile('attachment'))
            $data['attachment'] = $photoRequest->file('attachment')->store('documents/d'.$photoRequest->user()->id);

        $data['author_id'] = Auth::user()->id;

        $this->model->fill($data);
        if($result = $application->extendMessages()->save($this->model)){
            return $result;
        }
    }
}
