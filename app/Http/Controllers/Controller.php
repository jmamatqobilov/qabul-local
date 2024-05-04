<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\Request;
use App\Notifications\AcceptDecree;
use App\Notifications\AcceptDecreeProlong;
use App\Notifications\ActAttached;
use App\Notifications\ApplicationClosed;
use App\Notifications\ApplicationCreated;
use App\Notifications\ApplicationDenied;
use App\Notifications\ApplicationRefilled;
use App\Notifications\DecreeAttached;
use App\Notifications\EndpointsRefillDone;
use App\Notifications\MessageAnswered;
use App\Notifications\ObjectDeleted;
use App\Notifications\ObjectFillingDone;
use App\Notifications\RefillEndpoints;
use App\Notifications\RefillObjects;
use App\Notifications\UserWroteMessage;
use App\Notifications\ValidationsDone;
use App\Repositories\MenusRepository;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Lavary\Menu\Menu;
use Spatie\Image\Image;
use Throwable;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $app_rep;
    protected $dir_rep;
    protected $dic_rep;
    protected $dic_val_rep;
    protected $doc_rep;
    protected $ept_rep;
    protected $ter_rep;
    protected $menu_rep;
    protected $obj_rep;
    protected $photo_rep;
    protected $insp_rep;
    protected $obj_type_rep;
    protected $app_status_rep;
    protected $rol_rep;
    protected $usr_rep;
    protected $vcm_rep;
    protected $mes_rep;
    protected $pro_rep;

    protected $template;
    protected $component;
    protected $content = false;
    protected $title = false;
    protected $icon = false;
    protected $use_map = false;
    protected $user = false;
    protected $vars;

    public function __construct(){
        $this->menu_rep = new MenusRepository(new \App\Models\Menu());
        $this->user = Auth::user();
    }
    public function baseRenderOutput($group_prefix){
        $this->vars = Arr::add($this->vars,'title',$this->title);
        $this->vars = Arr::add($this->vars,'icon',$this->icon);
        $this->vars = Arr::add($this->vars,'use_map',$this->use_map);
        $menu = $this->getMenu($group_prefix);
        $navigation = view(config('custom.theme').'.'.$group_prefix.'.navigation')->with('menu',$menu)->render();
        $this->vars = Arr::add($this->vars,'navigation',$navigation);
        if($this->content){
            $this->vars = Arr::add($this->vars,'content',$this->content);
        }
        return view($this->template)->with($this->vars);
    }
    public function getMenu($role){
        $menu = $this->menu_rep->getByRole($role);
        return $this->menuBuilder($menu);
    }
    public function menuBuilder($menu){
        return (new Menu)->make('menu', function($m) use ($menu){
            foreach($menu as $item){
                if($item->alter == "скрыть" || $item->alter == "hide") continue;
                if(!$item->parent){
                    $element = $m->add('<span class="menu-item__label">'.($item->alter ? $item->alter:$item->name).'</span>', ['url'=>$item->path, 'class'=>'side-menu__item menu-item'])->id($item->id)
                        ->prepend('<span class="side-icon"><i data-feather="'.($item->icon ?: 'home').'"></i></span>');
                    if($item->badge)
                        $element->append(' <span class="count">'.$item->badge.'</span>');
                }else{
                    if($parentmenu = $m->find($item->parent)){
                        $parentmenu->add($item->name, $item->path)->id($item->id);
                    }
                }
            }
        });
    }

    public function authorizeAction($function, $object = false, $dontabort = false){
        if($object){
            if(Gate::denies($function, $object))
                if($dontabort) return false;
                else
                    abort(403,__('You dont have permission or status of application is wrong'));
        }else{
            if(Gate::denies($function))
                if($dontabort) return false;
                else
                    abort(403,__('You dont have permission or status of application is wrong'));
        }
        if($dontabort) return true;
    }

    public function repositoryResult($result, $redirect, $notification = false){
        if(is_array($result) && !empty($result['error'])){
            return back()->withInput()->with(['error'=>$result['error']]);
        }else{
            if($notification)
                $this->sendNotification($notification, $result);
            return redirect($redirect)->with(['status'=>__('Success!')]);
        }
    }

    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        $cookie = Cookie::forever('locale', $locale);
        return redirect()->back()->withCookie($cookie);
    }

    public function profile(){
        $this->user = Auth::user();
        $this->template = 'auth.profile';
        $this->icon = 'user';
        $this->title = __('Edit Profile Page').' - '.$this->user->company_name;
        $this->vars = Arr::add($this->vars,'user', $this->user);
        return $this->baseRenderOutput($this->user->roles->first()->code);
    }

    public function profile_change(ProfileRequest $request){
        $data = $request->validated();
        $this->user = Auth::user();
        if (array_key_exists('current_password', $data) && array_key_exists('password', $data)){
            $data['password'] = Hash::make($data['password']);
        }elseif(array_key_exists('password', $data)){
            unset($data['password']);
        }
        if($request->hasFile('photo')){

            $photo = $request->file('photo')->store('photos/u'.$this->user->id);

            /*if(!File::isDirectory('photos/u'.$this->user->id.'/thumbs')){
                File::makeDirectory(public_path().'/app/'.'photos/u'.$this->user->id.'/thumbs');
            }*/

           /* Image::load($photo)->width(200)->height(200)->save(
                Str::replaceFirst('u'.$this->user->id,'u'.$this->user->id.'/thumbs', $photo)
            );*/

            $data['photo'] = 'storage/app/'.$photo;
        }

        return $this->repositoryResult(
            $this->user->update($data),
            route($this->user->roles->first()->code.'.index')
        );
    }

    public function delete_profile_image($id)
    {
        $user = User::find($id);
        $user->photo = null;
        $user->save();

        return redirect()->back();
    }

public function notification_read(){
        foreach(Auth::user()->unreadNotifications as $notification)
            $notification->markAsRead();
        return back();
    }

    public function sendNotification($notification, $result){
        try{
            switch ($notification) {
                case 'object.deleted':
                    Notification::send($result->direction->users, new ObjectDeleted($result));
                    break;
                case 'application.created':
                    Notification::send($result->direction->users, new ApplicationCreated($result));
                    Notification::send($result->hududiy->users, new ApplicationCreated($result));
                    break;
                case 'application.message_created':
                    Notification::send($result->application->direction->users, new UserWroteMessage($result->application));
                    break;
                case 'application.updated':
                    if ($result->status->code == 'refill_complete')
                        Notification::send($result->direction->users, new ApplicationRefilled($result));
                    break;
                case 'application.send_to_validate':
                    Notification::send($result->hududiy->users, new ObjectFillingDone($result));
                    break;
                case 'application.refill_endpoints_done':
                    Notification::send($result->hududiy->users, new EndpointsRefillDone($result));
                    break;
                case 'hududiy.application.on_site_validated':
                    $result->owner->notify(new ValidationsDone($result));
                    break;
                case 'ukn.application.message_answered':
                    $result->application->owner->notify(new MessageAnswered($result->application));
                    break;
                case 'application.attach_act':
                    Notification::send($result->hududiy->users, new ActAttached($result));
                    Notification::send($result->direction->users, new ActAttached($result));
                    break;
                case 'ukn.application.closed':
                    $result->owner->notify(new ApplicationClosed($result));
                    Notification::send($result->hududiy->users, new ApplicationClosed($result));
                    Notification::send($result->direction->users, new ApplicationClosed($result));
                    break;
                case 'hududiy.application.objects_declined':
                    $result->owner->notify(new RefillObjects($result));
                    break;
                case 'hududiy.application.endpoints_declined':
                    $result->owner->notify(new RefillEndpoints($result));
                    break;
                case 'ukn.application.apply':
                    $result->owner->notify(new DecreeAttached($result));
                    break;
                case 'ukn.application.prolongation_added':
                    Notification::send(User::director(), new AcceptDecreeProlong($result->application));
                    break;
                case 'ukn.application.edit':
                    if ($result->status->code == 'refill')
                        $result->owner->notify(new ApplicationDenied($result));
                    else
                        Notification::send(User::director(), new AcceptDecree($result));
                    break;
            }
        }
        catch (Throwable $e) {
            Log::error($e->getMessage());
        }
    }
}
