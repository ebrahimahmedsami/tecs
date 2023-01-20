<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DetectLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,...$locales)
    {

        $locales = $locales ?: ['en'];

        if ($language = $request->getPreferredLanguage($locales)) {
            app()->setLocale($language);
        }

        return $next($request);
    }
}
