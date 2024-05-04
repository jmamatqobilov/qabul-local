<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DictionaryRequest;
use App\Http\Requests\DictionaryValueRequest;
use App\Models\Dictionary;
use App\Models\DictionaryValue;
use App\Repositories\DictionaryValuesRepository;
use App\Repositories\DirectionsRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;

class DictionaryValuesController extends AdminController
{
    public function __construct(
        DictionaryValuesRepository $dic_val_rep,
        DirectionsRepository $dir_rep
    )
    {
        parent::__construct();
        $this->dic_val_rep = $dic_val_rep;
        $this->dir_rep = $dir_rep;
        $this->template = 'admin.page';
        $this->component = config('custom.theme').'.admin.dictionaryvalues.';
    }
    public function index(Dictionary $dictionary)
    {
        if(Gate::denies('MANAGE_DICTIONARY')){
            abort(403);
        }
        $this->title = __('Dictionaries manager');

        $this->content = view($this->component.'list')
            ->with('dictionary', $dictionary)->render();
        return $this->renderOutput();
    }

    public function create(Dictionary $dictionary)
    {
        if(Gate::denies('MANAGE_DICTIONARY')){
            abort(403);
        }
        $this->title = __('Add Dictionary');

        $directions = Arr::pluck($this->dir_rep->get(false)->toArray(),'name','id');

        $this->content = view($this->component.'add')
            ->with([
                'dictionary' => $dictionary
            ])->render();
        return $this->renderOutput();
    }

    public function store(DictionaryValueRequest $request, Dictionary $dictionary)
    {
        if(Gate::denies('MANAGE_DICTIONARY')){
            abort(403);
        }
        return $this->repositoryResult(
            $this->dic_val_rep->add($request, $dictionary),
            route('admin.dictionaries.values.index', ['dictionary' => $dictionary->id])
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Dictionary $dictionary
     * @param DictionaryValue $value
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function edit(Dictionary $dictionary, DictionaryValue $value)
    {
        if(Gate::denies('MANAGE_DICTIONARY')){
            abort(403);
        }
        $this->title = __('Change DictionaryValue #').$value->id;
        $this->content = view($this->component.'add')
            ->with([
                'dictionary' => $dictionary,
                'dictionary_value' => $value
            ])->render();
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DictionaryValueRequest $request
     * @param DictionaryValue $value
     * @param Dictionary $dictionary
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(
        DictionaryValueRequest $request,
        Dictionary $dictionary,
        DictionaryValue $value
    )
    {
        if(Gate::denies('MANAGE_DICTIONARY')){
            abort(403);
        }
        return $this->repositoryResult(
            $this->dic_val_rep->edit($request, $value),
            route('admin.dictionaries.values.index', ['dictionary' => $dictionary->id])
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Dictionary $dictionary
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Dictionary $dictionary, DictionaryValue $value)
    {
        if(Gate::denies('MANAGE_DICTIONARY')){
            abort(403);
        }
        return $this->repositoryResult(
            // $this->dic_val_rep->delete($dictionary, $value),
            $value->delete(),
            route('admin.dictionaries.values.index', ['dictionary' => $dictionary->id])
        );
    }


}
