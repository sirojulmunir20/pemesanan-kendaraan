<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PihakMenyetujuiMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role !== 'pihak_menyetujui') {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
