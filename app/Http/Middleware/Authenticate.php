<?php
// app/Http/Middleware/Authenticate.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!session()->has('user') || !session('user')) {

            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthenticated'], 401);
            }
            

            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }


        $user = session('user');
        if (!isset($user['id']) || !isset($user['role'])) {

            session()->forget('user');
            return redirect()->route('login')->with('error', 'Session tidak valid, silakan login ulang');
        }

        return $next($request);
    }
}
