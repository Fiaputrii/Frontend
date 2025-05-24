<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
     
        if (!session()->has('user') || !session('user')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $user = session('user');
        $userRole = $user['role'] ?? null;

     
        if (!$userRole || !in_array($userRole, $roles)) {
     
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Akses ditolak. Role Anda: ' . ($userRole ?? 'tidak diketahui')
                ], 403);
            }
            
     
            abort(403, 'Akses ditolak. Role Anda (' . ($userRole ?? 'tidak diketahui') . ') tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
