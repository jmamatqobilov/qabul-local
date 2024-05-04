<?php

namespace App\Http\Controllers\Ukn;

use App\Http\Requests\ExtendMessageRequest;
use App\Models\Application;
use App\Repositories\MessagesRepository;
use Illuminate\Support\Facades\Auth;

class ExtendMessageController extends UknController
{
    public function __construct(
        MessagesRepository $mes_rep
    )
    {
        parent::__construct();
        $this->mes_rep = $mes_rep;
        $this->template = 'ukn.page';
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
        $this->template = 'ukn.blank';
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
            route(Auth::user()->roles->first()->code.'.applications.index'),
            'ukn.application.message_answered'
        );
    }
}
