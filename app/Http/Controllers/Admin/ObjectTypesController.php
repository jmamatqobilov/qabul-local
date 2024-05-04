<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\EntityRequest;
use App\Repositories\DirectionsRepository;
use App\Repositories\ObjectTypesRepository;
use Illuminate\Http\Request;
use App\Models\DObjectType;
use Illuminate\Support\Facades\Gate;

class ObjectTypesController extends AdminController
{
    public function __construct(ObjectTypesRepository $dot_rep, DirectionsRepository $dir_rep)
    {
        parent::__construct();
        $this->obj_type_rep =$dot_rep;
        $this->dir_rep =$dir_rep;
        $this->template = 'admin.page';
        $this->component = config('custom.theme').'.admin.objecttype.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index()
    {
        if(Gate::denies('MANAGE_DICTIONARY')){
            abort(403);
        }
        $this->title = __('Object types manager');
        $dotypes = $this->obj_type_rep->get();
        $this->content = view($this->component.'list')->with('objtypes',$dotypes)->render();
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
        if(Gate::denies('MANAGE_DICTIONARY')){
            abort(403);
        }
        $this->title = __('Добавить новый тип объекта');
        $directions = $this->dir_rep->getToList();

        $this->content = view($this->component.'add')
            ->with('directions',$directions)
            ->render();
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EntityRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EntityRequest $request)
    {
        $result = $this->obj_type_rep->add($request);
        if(is_array($result) && !empty($result['error'])){
            return back()->with(['error'=>'Object type Add Error']);
        }else{
            return redirect(route('admin.objecttypes.index'))->with(['status'=>'Object type Added']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DObjectType $objecttype
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function edit(DObjectType $objecttype)
    {
        $this->title = __('Редактирование типа обьекта - ').$objecttype->name;
        $directions = $this->dir_rep->getToList();

        $this->content = view($this->component.'add')->with(['objecttype'=>$objecttype,'directions'=>$directions])->render();
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param DObjectType $objecttype
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EntityRequest $request, DObjectType $objecttype)
    {
        $result = $this->obj_type_rep->updateObjectType($request, $objecttype);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect(route('admin.objecttypes.index'))->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DObjectType $objecttype
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(DObjectType $objecttype)
    {
        $result = $this->obj_type_rep->deleteObjectType($objecttype);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect(route('admin.objecttypes.index'))->with($result);
    }
}
