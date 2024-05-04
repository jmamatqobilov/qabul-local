<?php
namespace App\Repositories;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class MenusRepository extends Repository {

    public function __construct(Menu $menu) {
        $this->model = $menu;
    }

    public function getByRole($role){
        $menus = Role::where('code',$role)->first()->menus;
        foreach ($menus as $item){
            foreach(Auth::user()->unreadNotifications as $notification){
                if(Str::endsWith($item->path, $notification->data['group'])){
                    if(!property_exists($item, 'badge'))
                        $item->append('badge');
                    $item->badge = $item->badge + 1;
                }
            }
        }
        return $menus;
    }

    public function add(MenuRequest $menuRequest, RolesRepository $rol_rep){
        $data = $menuRequest->validated();
        if(empty($data)){
            return ['error'=> __('No Data')];
        }
        $this->model->fill($data);
        if($result = $rol_rep->one($data['role_id'])->menus()->save($this->model)){
            return $result;
        }
    }

    public function edit(MenuRequest $menuRequest, Menu $menu){
        $data = $menuRequest->validated();
        if(empty($data)){
            return ['error'=> __('No Data')];
        }
        if($menu->fill($data)->update()) {
            return $menu;
        }
        return ['error'=> __('Internal Error')];
    }

    public function delete(Menu $menu){
        if($menu->delete()) {
            return ['status'=> __('Menu deleted')];
        }
    }
}
