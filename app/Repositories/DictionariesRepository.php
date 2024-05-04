<?php
namespace App\Repositories;
use App\Http\Requests\DictionaryRequest;
use App\Http\Requests\DictionaryValueRequest;
use App\Models\Dictionary;
use App\Models\DictionaryValue;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;


class DictionariesRepository extends Repository {

    public function __construct(Dictionary $dictionary) {
        $this->model = $dictionary;
    }

    public function getDicWithVals(){
        $dics = $this->getToList('name','code')->toArray();
        $dictionaries = $this->get(false);
        foreach ($dictionaries as $dictionary)
            $dicvals[$dictionary->code] = Arr::pluck($dictionary->values->toArray(), 'name','id');
        return ['names'=>$dics, 'values'=>$dicvals];
    }

    public function add(DictionaryRequest $dictionaryRequest){
        if(Gate::denies('MANAGE_DICTIONARY')) {
            abort(403,__('You dont have permission to add dictionary'));
        }
        $data = $dictionaryRequest->validated();
        if(empty($data)){
            return ['error'=> __('No Data')];
        }
        if(!$data['code'])
            $data['code'] = Str::slug($data['name_ru']);
        $this->model->fill($data);
        if($result = $this->model->save()){
            return $result;
        }
    }
    public function edit(
        DictionaryRequest $dictionaryRequest,
        Dictionary $dictionary
    ){
        if(Gate::denies('MANAGE_DICTIONARY')) {
            abort(403,__('You dont have permission to manage dictionary'));
        }
        $data = $dictionaryRequest->validated();
        if(empty($data)){
            return ['error'=> __('No Data')];
        }
        if($dictionary->fill($data)->update()){
            return $this->model;
        }
    }

    public function delete(Dictionary $dictionary)
    {
        $dictionary->delete();
        return 'deleletd';
    }
}
