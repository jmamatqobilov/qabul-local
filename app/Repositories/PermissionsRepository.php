<?php

namespace App\Repositories;

use App\Permission;

use Illuminate\Support\Facades\Gate;

class PermissionsRepository extends Repository {
	protected $rol_rep;
	public function __construct(Permission $permission, RolesRepository $rol_rep) {
		$this->model = $permission;
		$this->rol_rep = $rol_rep;
	}
	public function changePermissions ($request) {
		if(Gate::denies('change', $this->model)) {
			abort(403);
		}
		$data = $request->except('_token');
		$roles = $this->rol_rep->get();
		foreach($roles as $value) {
			if(isset($data[$value->id])) {
				$value->savePermissions($data[$value->id]);
			}
			else {
				$value->savePermissions([]);
			}
		}
		return ['status' => 'Права обновлены'];
	}
}

?>
