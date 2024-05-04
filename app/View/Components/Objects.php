<?php

namespace App\View\Components;

use App\Models\Application;
use App\Repositories\ObjectTypesRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\Component;

class Objects extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $application;
    public $objects;
    public $current;
    public $object_types;
    protected $obj_types_rep;
    public function __construct(Application $application, ObjectTypesRepository $obj_types_rep)
    {
        $this->application = $application;
        $this->obj_types_rep = $obj_types_rep;
        $builder = $application->objects();
        if( $this->validateRequest() &&
            !request()->filled('o-clear-button') &&
            request()->get('o-clear-button') != 'clear' &&
            request()->filled('o-object-type')
        ){
            $builder->where('object_type_id', request()->get('o-object-type'));
            $this->current = request()->get('o-object-type');
        }
        $this->objects = $builder->paginate(10);
        $this->object_types = $this->obj_types_rep->getToListWhere(
            $this->application->objects->pluck('object_type_id')->toArray()
        );
    }

    public function validateRequest(){
        $validator = Validator::make(request()->all(), [
            'o-object-type' => 'numeric|exists:d_object_types,id'
        ]);
        if ($validator->fails()) return false;
        return true;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.application.objects');
    }
}
