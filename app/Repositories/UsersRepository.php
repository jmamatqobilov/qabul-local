<?php
namespace App\Repositories;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Direction;
use App\Models\EntryLog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;


class UsersRepository extends Repository {
    public function __construct(User $user) {
        $this->model = $user;
    }
    public function getusersbyrolecode($roleName){
        return $this->model->whereHas('roles', function ($q) use ($roleName) {
            $q->where('code', $roleName);
        })->get();
    }

    public function getSubjectsToList($name = 'company_name', $key = 'id'){
        return $this->model->whereHas('roles', function ($q) {
            $q->where('code', 'user');
        })->get()->pluck($name, $key);
    }
    public function addUser($request) {
        $data = $request->all();
        $user = $this->model->create([
            'company_name' => $data['company_name'],
            'email' => $data['email'],
            'director_fio' => $data['director_fio'],
            'inn' => $data['inn'],
            'address' => $data['address'],
            'license' => $data['license'],
            'password' => Hash::make($data['password']),
        ]);
        if($user) {
            $user->roles()->attach($data['role_id']);
        }
        return ['status' => __('Пользователь добавлен')];
    }

    public function updateUser(UserRequest $request, $user) {
        if (Gate::denies('edit', $this->model)) {
            abort(403);
        }
        $data = $request->validated();
        if(array_key_exists('password', $data) && isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }else{ unset($data['password']); }

        if($user->fill($data)->update()){
            $user->roles()->sync([$data['role_id']]);
            return $user;
        }
        return ['error' => __('Internal Error')];
    }

    public function deleteUser($user) {
        if (Gate::denies('edit',$this->model)) {
            abort(403);
        }
        $user->roles()->detach();
        if($user->delete()) {
            return ['status' => __('Пользователь удален')];
        }
    }

    public function logEntry(Request $request, $user){
        EntryLog::create([
            'user_id' => $user->id,
            'entry_date' => \Carbon\Carbon::now(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'session_id' => $request->session()->getId()
        ]);
    }
}
