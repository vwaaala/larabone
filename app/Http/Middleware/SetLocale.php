<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if ($request->has('lang')) {
            $language = $request->input('lang');
            Cache::put('language', $language);
        } elseif (Cache::has('language')) {
            $language = Cache::get('language');
        } elseif (config('panel.primary_language')) {
            $language = config('panel.primary_language');
        }

        if (isset($language)) {
            app()->setLocale($language);
        }

        return $next($request);
    }
}
