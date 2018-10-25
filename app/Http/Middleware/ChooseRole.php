<?php

namespace App\Http\Middleware;

use Closure;

class ChooseRole
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
        if(auth()->user() && !auth()->user()->roles->count() && $request->route()->getName()!=='webauth.choserole'){
            return redirect(route('webauth.choserole'));
        }
        return $next($request);
    }
}
