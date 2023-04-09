<?php

namespace App\Http\Middleware;

use Closure;

class PostLength
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
        if(str_word_count($request->status) > 5000) {
            return back();
        }

        return $next($request);
    }
}
