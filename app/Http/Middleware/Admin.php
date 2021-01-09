<?php

namespace App\Http\Middleware;

use App\Models\Enums\RoleEnum;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && RoleEnum::isAdmin(Auth::user()->role_uuid)){
            return $next($request);
        }

        abort(Response::HTTP_FORBIDDEN);
    }
}
