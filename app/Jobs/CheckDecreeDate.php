<?php

namespace App\Jobs;

use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Models\StatusChange;
use App\Notifications\ApplicationFailednClosed;
use App\Notifications\DecreeDateCloseToEnd;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class CheckDecreeDate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 1;
    public $timeout = 900;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->checkDeadlineDate();
        $this->checkBefore10Days();
    }

    private function checkBefore10Days(){
        $lessthan10days = Application::whereHas('status', function($q) {
            $q->where('level', '<', 30);
        })->whereDate('deadline_date', '<=', Carbon::now()->addDays(10))->get();
        foreach($lessthan10days as $application){
            $application->owner->notify(new DecreeDateCloseToEnd($application));
        }
    }

    private function checkDeadlineDate(){
        $deadlinedates = Application::whereHas('status', function($q) {
            $q->where('level', '<', 30);
        })->whereDate('deadline_date', '<=', Carbon::now())->get();
        foreach ($deadlinedates as $application) {
            $statusToChange = ApplicationStatus::where('code', 'application_failed')->first();
            $application->status()->associate($statusToChange);
            StatusChange::create([
                'application_id' => $application->id,
                'status_id' => $statusToChange->id,
                'user_id' => 1,
                'event_date' => Carbon::now()
            ]);
            $application->update();
            $application->owner->notify(new ApplicationFailednClosed($application));
            Notification::send($application->direction->users, new ApplicationFailednClosed($application));
        }
    }
}
