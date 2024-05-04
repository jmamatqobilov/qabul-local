<?php
namespace App\Repositories;

use App\Filters\ApplicationFilters;
use App\Http\Requests\ApplicationFinalActRequest;
use App\Http\Requests\ApplicationModerateRequest;
use App\Http\Requests\ApplicationUserRequest;
use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Models\StatusChange;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ApplicationsRepository extends Repository {

    public function __construct(Application $app, ApplicationFilters $app_filt) {
        $this->filter = $app_filt;
        $this->model = $app;
    }

    private function togglerFunctionality($startFrom = 1){
        if(request()->filled('show-complete') && request()->get('show-complete') == 'on'){
            $fromLevel = 32;  $toLevel = 34;
        }else { $fromLevel = $startFrom; $toLevel = 32;  }
        return ['name'=>'status', 'field'=>'level', 'value'=> $fromLevel, 'operand'=> '>=', 'andvalue' => $toLevel, 'operand2'=>'<'];
    }
    private function togglerDirectorFunctionality(){
        if(request()->filled('show-complete') && request()->get('show-complete') == 'on')
            return null;
        else return ['name'=>'status','field'=>'code','value'=>'order_attached','orvalue'=>'order_close'];
    }
    private function togglerDirectorFunctionality2(){
        if(request()->filled('show-complete') && request()->get('show-complete') == 'on')
            return false;
        else return ['name'=>'prolongs','field'=>'decree_num','value' => false];
    }
    public function getUsers($user_id){
        return $this->get(true,20,[['owner_id','=',$user_id]], $this->togglerFunctionality());
    }
    public function getUsersObjectFill($user_id){
        return $this->get(true,20,[['owner_id','=',$user_id],['status_id','=',3]]);
    }
    public function getHududiys($hududiy_id){
        return $this->get(true,20,[['hududiy_id', '=', $hududiy_id]], $this->togglerFunctionality(20));
    }
    public function getDirectors(){
        return $this->get(true,20, false,
            $this->togglerDirectorFunctionality(), false, false, $this->togglerDirectorFunctionality2());
    }
    public function getDirections($direction_id){
        return $this->get(true,20,[['direction_id','=',$direction_id]], $this->togglerFunctionality());
    }
    public function getDecrees4Monitoring($direction_id = false){
        $where = false;
        if($direction_id) $where = [['direction_id','=',$direction_id]];
        return $this->get(
            true,
            20,
            $where,
            $this->togglerFunctionality(20),
            ['field'=>'deadline_date','order'=>'ASC']
        );
    }
    public function getUsersByDirection($user_id, $direction_id){
        return $this->getcount([
            ['owner_id', $user_id],
            ['direction_id', $direction_id]
        ]);
    }

    public function apply($request, $application){
        $maxDecreeNum = (Application::whereBetween('created_at', [Carbon::now()->startOfYear(),Carbon::now()->endOfYear()])->max('decree_num') ?? 0) + 1;
        $application->decree_num = $maxDecreeNum;
        $application->decree_date = Carbon::now();

        $statusToChange = ApplicationStatus::where('code','object_filling')->first();
        $application->status()->associate($statusToChange);
        $this->statusChangeLog($application, $statusToChange, $request->user());
        $application->apply_datetime = Carbon::now();
        if($application->update()) {
            return $application;
        }
    }

    public function setStatus($application, $status_code){
        $statusToChange = ApplicationStatus::where('code', $status_code)->first();
        $application->status()->associate($statusToChange);
        $this->statusChangeLog($application, $statusToChange, Auth::user());
        if($application->save()) {
            return $application;
        }
    }

    public function attach_act(
        ApplicationFinalActRequest $finalActRequest,
        Application $application,
        DocumentsRepository $doc_rep
    ){
        if($finalActRequest->hasFile('final_act')) {
            $data['final_act_id'] = $doc_rep->saveDocument($finalActRequest->file('final_act'), $finalActRequest->user());
        }
        $statusToChange = ApplicationStatus::where('code','order_close')->first();
        $application->status()->associate($statusToChange);
        $this->statusChangeLog($application, $statusToChange, $finalActRequest->user());
        if($application->fill($data)->update()) {
            return $application;
        }
    }

    public function refill_endpoints_done(Application $application){
        $statusToChange = ApplicationStatus::where('code','validation_endpoints')->first();
        $application->status()->associate($statusToChange);
        $this->statusChangeLog($application, $statusToChange, Auth::user());

        if($application->update()) {
            return $application;
        }
    }

    public function sendToValidate(Application $application){
        $statusToChange = ApplicationStatus::where('code','object_filling_complete')->first();
        $application->status()->associate($statusToChange);
        $this->statusChangeLog($application, $statusToChange, Auth::user());
        if($application->update()) {
            return $application;
        }
    }

    public function add(ApplicationUserRequest $applicationRequest, DocumentsRepository $doc_rep){
        $data = $applicationRequest->validated();
        if(empty($data))
            return ['error'=> __('No Data')];

        if($applicationRequest->hasFile('act'))
            $data['act_id'] = $doc_rep->saveDocument($applicationRequest->file('act'), $applicationRequest->user());

        if($applicationRequest->hasFile('order'))
            $data['order_id'] = $doc_rep->saveDocument($applicationRequest->file('order'), $applicationRequest->user());

        if($applicationRequest->hasFile('final_act'))
            $data['final_act_id'] = $doc_rep->saveDocument($applicationRequest->file('final_act'), $applicationRequest->user());

        $this->model->fill($data);
        $statusToChange = ApplicationStatus::where('code','object_filling')->first();
        $this->model->status()->associate($statusToChange);
        if($result = $applicationRequest->user()->applications()->save($this->model)){
            $this->statusChangeLog($result, $statusToChange, $applicationRequest->user());
            return $result;
        }
        else return ['error'=> __('Internal Error')];
    }

    public function update(
        ApplicationUserRequest $applicationRequest,
        Application $application,
        DocumentsRepository $doc_rep
    ){
        $data = $applicationRequest->validated();
        if(empty($data))
            return ['error'=> __('No Data')];

        if($applicationRequest->hasFile('act'))
            $data['act_id'] = $doc_rep->saveDocument($applicationRequest->file('act'), $applicationRequest->user());

        if($applicationRequest->hasFile('order'))
            $data['order_id'] = $doc_rep->saveDocument($applicationRequest->file('order'), $applicationRequest->user());

        if($applicationRequest->hasFile('final_act'))
            $data['final_act_id'] = $doc_rep->saveDocument($applicationRequest->file('final_act'), $applicationRequest->user());

        if($application->fill($data)->update()) {
            return $application;
        }
        return ['error'=> __('Internal Error')];
    }

    public function setDecree(ApplicationModerateRequest $request, Application $application, DocumentsRepository $doc_rep)
    {
        $data = $request->validated();
        if($data['action'] != 'save')
            if($data['action'] == 'reject'){
                $statusToChange = ApplicationStatus::where('code','refill')->first();
                $application->status()->associate($statusToChange);
                $this->statusChangeLog($application, $statusToChange, $request->user());
            }
            elseif($data['responsible'] && $data['deadline_date']){
                $statusToChange = ApplicationStatus::where('code','order_attached')->first();
                $application->status()->associate($statusToChange);
                $this->statusChangeLog($application, $statusToChange, $request->user());
                unset($data['deny_comment']);
            }
        unset($data['action']);
        if($application->fill($data)->update()) {
            return $application;
        }
    }

    public function updateApplication($request, $application, DocumentsRepository $doc_rep) {
        $data = $request->except('_token','act_file','order_file');
        if(isset($data['status_id']) && Gate::denies('change_status', $this->model)) {
            abort(403, __('You cannot change status of application'));
        }elseif($application->status->code == 'refill'){
            $statusToChange = ApplicationStatus::where('code','refill_complete')->first();
            $application->status()->associate($statusToChange);
            $this->statusChangeLog($application, $statusToChange, $request->user());
        }
        if(empty($data)){
            return ['error'=> __('No Data')];
        }
        if(
            array_key_exists('act_id', $data) &&
            $data['act_id'] != 0 &&
            $data['act_id'] != $application->act->id &&
            !$doc_rep->validateDocument($data['act'],$request->user()->id)
        ) return ['error'=>'Unauthorized use of file'];
        elseif($request->hasFile('act_file'))
            $data['act_id'] = $doc_rep->saveDocument($request->file('act_file'), $request->user());

        if(
            array_key_exists('order_id', $data) &&
            $data['order_id'] != 0 &&
            $data['order_id'] != $application->order->id &&
            !$doc_rep->validateDocument($data['order'],$request->user()->id)
        ) return ['error'=>'Unauthorized use of file'];
        elseif($request->hasFile('order_file'))
            $data['order_id'] = $doc_rep->saveDocument($request->file('order_file'),$request->user());

        if(isset($data['status_id']) && $request->hasFile('decree_file')) {
            $data['decree'] = $doc_rep->saveDocument($request->file('decree_file'),$request->user());
        }
        if($application->fill($data)->update()) {
            return $application;
        }
        return ['error'=> __('Internal Error')];
    }

    public function deleteApplication($application) {
        if($application->delete()) {
            return ['status'=> __('Application deleted')];
        }
    }

    public function statusChangeLog(
        Application $application,
        ApplicationStatus $applicationStatus,
        User $user
    ){
        StatusChange::create([
            'application_id' => $application->id,
            'status_id' => $applicationStatus->id,
            'user_id' => $user->id,
            'event_date' => Carbon::now()
        ]);
    }
}
