<?php
namespace App\Repositories;

use App\Http\Requests\Admin\EntityRequest;
use App\Models\DObjectType;

class ObjectTypesRepository extends Repository {

    public function __construct(DObjectType $dot) {
        $this->model = $dot;
    }

    public function add(EntityRequest $objecttype){
        $data = $objecttype->validated();
        if(empty($data)){
            return ['error'=>'No Data'];
        }

        $this->model->fill($data);
        if($result = $this->model->save()){
            return $result;
        }
    }

    public function updateObjectType(EntityRequest $request, $objecttype) {

        $data = $request->validated();

        if(empty($data)) {
            return ['error'=>'Нет данных'];
        }

        if($objecttype->fill($data)->update()) {
            return ['status'=>'Тип объекта обновлена'];
        }
    }

    public function getToListOfDirection($direction = false, $name = 'name', $key = 'id'){
        $builder =$this->model;
        if($direction)
            $builder = $builder->select('*')->where('direction_id', $direction->id);
        return $builder->get()->pluck($name, $key);
    }

    public function deleteObjectType(DObjectType $objectType) {
        try {
            if ($objectType->delete()) {
                return ['status' => 'Тип объекта удалена'];
            }
        } catch (\Exception $e) {
            return ['error' => 'Не удалось удалить'];
        }
    }
}
