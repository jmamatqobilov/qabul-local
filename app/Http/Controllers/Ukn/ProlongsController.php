<?php

namespace App\Http\Controllers\Ukn;


use App\Http\Requests\ExtendMessageRequest;
use App\Http\Requests\ProlongRequest;
use App\Models\Application;
use App\Models\ExtendMessage;
use App\Models\Prolong;
use App\Repositories\ProlongsRepository;

class ProlongsController extends UknController
{
    public function __construct(
        ProlongsRepository $pro_rep
    )
    {
        parent::__construct();
        $this->pro_rep = $pro_rep;
        $this->template = 'ukn.page';
        $this->icon = 'message-square';
        $this->component = env('THEME').'.ukn.prolong.';
    }

    /**
     * Display a listing of the resource.
     *
     * @param Application|null $application
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(Application $application)
    {
        $this->title = __('Extend Message for Application');
        $this->template = 'ukn.blank';
        if(isset($application)){
            $this->authorizeAction('hududiy_objects_list', $application);
        }else{
            abort(404);
        }
        $this->content = view($this->component.'list')
            ->with(['application' => $application])->render();
        return $this->renderOutput();
    }

    public function create(Application $application, ExtendMessage $extendMessage)
    {
        $this->authorizeAction('edit', $application);
        $this->icon = 'plus';
        $this->template = 'ukn.form';
        $this->title = __('Продление распоряжения');
        $this->content = view($this->component.'add')
            ->with([
                'application' => $application,
                'extendMessage' => $extendMessage
            ])->render();
        return $this->renderOutput();
    }

    public function store(ProlongRequest $request, Application $application, ExtendMessage $extendMessage)
    {
        $this->authorizeAction('edit', $application);

        return $this->repositoryResult(
            $this->pro_rep->add($request, $application, $extendMessage),
            route('ukn.applications.prolongs.index', ['application'=>$application->id]),
            'ukn.application.prolongation_added'
        );
    }

    public function accept(Application $application, Prolong $prolong){
        $this->authorizeAction('apply', $application);

        return $this->repositoryResult(
            $this->pro_rep->accept($prolong),
            route('ukn.applications.index'),
            'ukn.application.prolongation_accept'
        );
    }
}
