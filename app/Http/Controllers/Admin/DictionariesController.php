<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DictionaryRequest;
use App\Models\Dictionary;
use App\Repositories\DictionariesRepository;
use App\Repositories\DirectionsRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;

class DictionariesController extends AdminController
{
    public function __construct(
        DictionariesRepository $dic_rep,
        DirectionsRepository $dir_rep
    )
    {
        parent::__construct();
        $this->dic_rep = $dic_rep;
        $this->dir_rep = $dir_rep;
        $this->template = 'admin.page';
        $this->component = config('custom.theme').'.admin.dictionary.';
    }
    public function index()
    {
        if(Gate::denies('MANAGE_DICTIONARY')){
            abort(403);
        }
        $this->title = __('Dictionaries manager');

        $dictionaries = $this->dic_rep->get();
        $this->content = view($this->component.'list')
            ->with('dictionaries', $dictionaries)->render();
        return $this->renderOutput();
    }

    public function create()
    {
        if(Gate::denies('MANAGE_DICTIONARY')){
            abort(403);
        }
        $this->title = __('Add Dictionary');

        $directions = Arr::pluck($this->dir_rep->get(false)->toArray(),'name','id');

        $this->content = view($this->component.'add')
            ->with([
                'directions'=>$directions
            ])->render();
        return $this->renderOutput();
    }

    public function store(DictionaryRequest $request)
    {
        if(Gate::denies('MANAGE_DICTIONARY')){
            abort(403);
        }
        return $this->repositoryResult(
            $this->dic_rep->add($request),
            route('admin.dictionaries.index')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Dictionary $dictionary
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function edit(Dictionary $dictionary)
    {
        if(Gate::denies('MANAGE_DICTIONARY')){
            abort(403);
        }
        $this->title = __('Change Dictionary #').$dictionary->id;

        $directions = Arr::pluck($this->dir_rep->get(false)->toArray(),'name','id');

        $this->content = view($this->component.'add')
            ->with([
                'dictionary'=>$dictionary,
                'directions'=>$directions
            ])->render();
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DictionaryRequest $request
     * @param Dictionary $dictionary
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(DictionaryRequest $request, Dictionary $dictionary)
    {
        if(Gate::denies('MANAGE_DICTIONARY')){
            abort(403);
        }
        return $this->repositoryResult(
            $this->dic_rep->edit($request, $dictionary),
            route('admin.dictionaries.index')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Dictionary $dictionary
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Dictionary $dictionary)
    {
        return $this->repositoryResult(
            $this->dic_rep->delete($dictionary),
            route('admin.dictionaries.index')
        );
    }


}
