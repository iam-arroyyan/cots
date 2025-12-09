<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureRole
{
    public function handle(Request $request, Closure $next, $role){
        if(session('role') !== $role){
            abort(403, "Akses ditolak anda bukan $role" );
        }
        return $next($request);
    }
}
