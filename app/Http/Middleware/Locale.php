<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Config;
use App;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        } else {
            App::setLocale(Config::get('app.fallback_locale'));
        }
        return $next($request);
    }
}
