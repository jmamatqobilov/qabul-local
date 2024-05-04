<?php

namespace App\Repositories;

use App\Http\Requests\DictionaryValueRequest;
use App\Models\Dictionary;
use App\Models\DictionaryValue;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;


class DictionaryValuesRepository extends Repository
{

    public function __construct(DictionaryValue $dictionaryValue)
    {
        $this->model = $dictionaryValue;
    }

    public function add(
        DictionaryValueRequest $dictionaryValueRequest,
        Dictionary $dictionary
    ) {
        if (Gate::denies('MANAGE_DICTIONARY')) {
            abort(403, __('You dont have permission to add dictionary'));
        }
        $data = $dictionaryValueRequest->validated();
        if (empty($data)) {
            return ['error' => __('No Data')];
        }
        if (!$data['code'])
            $data['code'] = Str::slug($data['name_ru']);
        $this->model->fill($data);
        if ($result = $dictionary->values()->save($this->model)) {
            return $result;
        }
    }

    public function edit(
        DictionaryValueRequest $dictionaryValueRequest,
        DictionaryValue $dictionaryValue
    ) {
        if (Gate::denies('MANAGE_DICTIONARY')) {
            abort(403, __('You dont have permission to manage dictionary'));
        }
        $data = $dictionaryValueRequest->validated();
        if (empty($data)) {
            return ['error' => __('No Data')];
        }
        if ($dictionaryValue->fill($data)->update()) {
            return $dictionaryValue;
        }
    }

    public function delete(DictionaryValue $dictionaryValue)
    {
        // return dd($dictionaryValue);
        return 'salam';
    }
}
