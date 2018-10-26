<?php

namespace App\Http\Middleware;

use Closure;

class AddBasicInfo
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
        if(auth()->user() && ((auth()->user()->hasRole('lecturer') && !auth()->user()->lecturer)||
            (auth()->user()->hasRole('student') && !auth()->user()->student)) && 
            $request->route()->getName()!=='webauth.addbasicinfo')
        {
            return redirect(route('webauth.addbasicinfo'));
        }
        
        // if(auth()->user() && !auth()->user()->roles->count()){

        // }
        // if(auth()->user() && !auth()->user()->roles->count() && $request->route()->getName()!=='webauth.choserole'){
        //     return redirect(route('webauth.choserole'));
        // }
        return $next($request);
    }
}