<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('locale')) {
            $this->setLocale(session()->get('locale'));
        }elseif(Cookie::get('locale') !== null){
            $this->setLocale(Cookie::get('locale'));
        }
        return $next($request);
    }

    protected function setLocale($locale){
        App::setLocale($locale);
        if($locale == 'uz')
            \Carbon\Carbon::setLocale('uz_Latn');
    }
}
