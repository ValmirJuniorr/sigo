<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\URL;

class CheckPermission
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
        if(isset($request->route()->getAction()['role'])){
            if(User::has_role($request->user(),$request->route()->getAction()['role'])){
                return $next($request);
            }else{
                if ($request->fullUrl() == URL::previous()){
                    return redirect('module')->withErrors(__('messages.no_permission_user'));
                }
                return back()->withErrors(__('messages.no_permission_user'));
            }
        }
        abort(403,__('messages.invalid_route'));
    }
}
