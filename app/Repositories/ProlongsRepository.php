<?php
namespace App\Repositories;
use App\Http\Requests\ProlongRequest;
use App\Models\Application;
use App\Models\ExtendMessage;
use App\Models\Prolong;
use Carbon\Carbon;



class ProlongsRepository extends Repository {

    public function __construct(Prolong $prolong) {
        $this->model = $prolong;
    }

    public function add(ProlongRequest $prolongRequest, Application $application, ExtendMessage $extendMessage){
        $data = $prolongRequest->validated();
        if(empty($data))
            return ['error'=>'No Data'];
        if($prolongRequest->hasFile('order'))
            $data['order'] = $prolongRequest->file('order')->store('documents/d'.$prolongRequest->user()->id);
        else
            $data['order'] = $extendMessage->attachment;
        $data['message_id'] = $extendMessage->id;
        $this->model->fill($data);
        if($result = $application->prolongs()->save($this->model)){
            return $result;
        }
    }

    public function accept(Prolong $prolong){
        $maxDecreeNum = ($prolong->application->prolongs->max('decree_num') ?? 0) + 1;
        $prolong->decree_num = $maxDecreeNum;
        $prolong->decree_date = Carbon::now();
        if($prolong->update()) {
            $prolong->update(['old_deadline_date'=>$prolong->application->deadline_date]);
            $prolong->application->update(['deadline_date'=>$prolong->deadline_date]);
            return $prolong;
        }
    }
}
