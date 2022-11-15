<?php

namespace App\Http\Middleware;

use App\Models\TokenForUserRegistration;
use Closure;
use Illuminate\Http\Request;

class TokenVerified
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
        $token = TokenForUserRegistration::where('token', $request->headers->get('token'))->first();

        if(!$token) {
            return response([
                'success' => false,
                'message' => 'The token expired.'
            ], 401);
        }

        $token->delete();

        return $next($request);
    }
}
