<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $user = Auth::user();

        if (!$user->isAdmin()) {
            session()->flash(
                'warning',
                'У вас немає прав адміністратора. Але як покупцю ми вам раді! Клікніть по товару, щоб додати його у кошик.'
            );
            return redirect()->route('index');
        }
         return $next($request);
    }
}
