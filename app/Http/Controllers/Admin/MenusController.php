<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Repositories\MenusRepository;
use App\Repositories\RolesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class MenusController extends AdminController
{
    protected $component;
    public function __construct(
        MenusRepository $am_rep,
        RolesRepository $role_rep
    )
    {
        parent::__construct();
        $this->menu_rep = $am_rep;
        $this->rol_rep = $role_rep;
        $this->template = 'admin.page';
        $this->component = config('custom.theme').'.admin.menu.';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if(Gate::denies('MANAGE_MENUS')){
            abort(403);
        }
        $this->title = __('Menu manager');
        $menus = $this->menu_rep->get();
        $this->content = view($this->component.'.list')->with('menus',$menus)->render();
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
        if(Gate::denies('MANAGE_MENUS')) abort(403);
        $this->title = __('Добавить меню');
        $roles = Arr::pluck($this->rol_rep->get()->toArray(), 'name','id');
        $this->content = view($this->component.'add')
            ->with([
                'roles' => $roles
            ])->render();
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(MenuRequest $request)
    {
        if(Gate::denies('MANAGE_MENUS')){
            abort(403);
        }
        return $this->repositoryResult(
            $this->menu_rep->add($request, $this->rol_rep),
            route('admin.menus.index')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Menu $menu
     * @return void
     */
    public function show(Menu $menu)
    {
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Menu $menu
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function edit(Menu $menu)
    {
        if(Gate::denies('MANAGE_MENUS')) abort(403);
        $this->title = __('Изменить меню');
        $roles = Arr::pluck($this->rol_rep->get(false)->toArray(), 'name','id');
        $this->content = view($this->component.'add')
            ->with([
                'menu' => $menu,
                'roles' => $roles
            ])->render();
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        if(Gate::denies('MANAGE_MENUS')){
            abort(403);
        }
        return $this->repositoryResult(
            $this->menu_rep->edit($request, $menu),
            route('admin.menus.index')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Menu $menu)
    {
        if(Gate::denies('MANAGE_MENUS')){
            abort(403);
        }
        return $this->repositoryResult(
            $this->menu_rep->delete($menu),
            route('admin.menus.index')
        );
    }
}
