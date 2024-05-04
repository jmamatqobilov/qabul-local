<?php

namespace App\Jobs;

use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Notifications\TerritorialIsNotReacting;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class CheckTerritorialActivity implements ShouldQueue
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
        $this->checkInactivity('object_filling_complete');
        $this->checkInactivity('validation_objects');
    }

    public function checkInactivity($status = 'validation_objects'){
        $validationStatus = ApplicationStatus::where('code', $status)->first();
        $more7daysInActivity = Application::where('status_id', $validationStatus->id)
            ->whereHas('change_log', function($q) {
                return $q->whereDate('event_date', '<=', Carbon::now()->subDays(config('app.territorials_allowed_inactivity_period')))
                ->where('status_changes.id', function ($sub) {
                    return $sub->select('id')
                        ->from('status_changes')
                        ->whereColumn('application_id', 'applications.id')
                        ->latest()
                        ->limit(1);
                });
            })->get();
        foreach($more7daysInActivity as $application){
            Notification::send($application->direction->users, new TerritorialIsNotReacting($application));
        }
    }
}
