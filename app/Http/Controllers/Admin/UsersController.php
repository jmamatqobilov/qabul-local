<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserRequest;
use App\Repositories\DirectionsRepository;
use App\Repositories\TerritoriesRepository;
use App\Repositories\UsersRepository;
use App\User;
use App\Repositories\RolesRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;

class UsersController extends AdminController
{
    protected $component;
    public function __construct(
        RolesRepository $rol_rep,
        UsersRepository $us_rep,
        DirectionsRepository $dir_rep,
        TerritoriesRepository $ter_rep
    ) {
        parent::__construct();

        $this->usr_rep = $us_rep;
        $this->rol_rep = $rol_rep;
        $this->dir_rep = $dir_rep;
        $this->ter_rep = $ter_rep;

        $this->template = '.admin.users';
        $this->component = config('custom.theme').'.admin.user.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index()
    {
        if(Gate::denies('MANAGE_USERS')) abort(403);

        $this->title = __('Users Manager');
        $users = $this->usr_rep->get();
        $this->content = view($this->component.'list')->with('users',$users)->render();
        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function create()
    {
        if(Gate::denies('MANAGE_USERS')) abort(403);

        $this->title =  __('New user');
        $roles = Arr::pluck($this->rol_rep->get(false)->toArray(),'name','id');
        $this->content = view($this->component.'.add')
            ->with(['roles' => $roles])->render();
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        if(Gate::denies('MANAGE_USERS')) abort(403);
        return $this->repositoryResult(
            $this->usr_rep->addUser($request),
            route('admin.users.index')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function edit(User $user)
    {
        if(Gate::denies('MANAGE_USERS')) abort(403);

        $this->title =  __('Edit user - ').$user->company_name;

        $roles = Arr::pluck($this->rol_rep->get(false)->toArray(),'name','id');
        if($user->roles()->first()->code == 'ukn'){
            $directions = Arr::prepend(
                $this->dir_rep->getToList()->toArray(),
                __('Select Direction'),
                ''
            );
            $territories = Arr::prepend(
                $this->ter_rep->getToList()->toArray(),
                __('Select Territory'),
                ''
            );
        }

        $this->content = view($this->component.'.add')
            ->with([
                'roles' => $roles,
                'user' => $user,
                'directions' => (isset($directions) ? $directions:null),
                'territories' => (isset($territories) ? $territories:null)
                ])->render();
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        if(Gate::denies('MANAGE_USERS')) abort(403);

        return $this->repositoryResult(
            $this->usr_rep->updateUser($request,$user),
            route('admin.users.index')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        if(Gate::denies('MANAGE_USERS')) abort(403);

        return $this->repositoryResult(
            $this->usr_rep->deleteUser($user),
            route('admin.users.index')
        );
    }
}
