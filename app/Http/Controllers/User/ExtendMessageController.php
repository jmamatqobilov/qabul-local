<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\EndpointRequest;
use App\Http\Requests\ExtendMessageRequest;
use App\Models\Application;
use App\Models\Endpoint;
use App\Repositories\ApplicationsRepository;
use App\Repositories\EndpointsRepository;
use App\Repositories\MessagesRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ExtendMessageController extends UserController
{
    public function __construct(
        MessagesRepository $mes_rep
    )
    {
        parent::__construct();
        $this->mes_rep = $mes_rep;
        $this->template = 'user.page';
        $this->icon = 'message-square';
        $this->component = env('THEME').'.user.request.';
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
        $this->template = 'user.blank';
        if(isset($application)){
            $this->authorizeAction('message_access', $application);
        }else{
            abort(404);
        }
        $this->content = view($this->component.'list')
            ->with(['application' => $application])->render();
        return $this->renderOutput();
    }

    public function store(ExtendMessageRequest $request, Application $application)
    {
        $this->authorizeAction('message_access', $application);

        return $this->repositoryResult(
            $this->mes_rep->add($request, $application),
            route('user.applications.index'),
            'application.message_created'
        );
    }
}
