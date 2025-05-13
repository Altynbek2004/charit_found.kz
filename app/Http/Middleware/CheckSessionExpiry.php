<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

class CheckSessionExpiry
{
    /**
     * Проверяет, не истекла ли сессия пользователя.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Проверка аутентификации

        if (Auth::check()) {
            // Получаем время последней активности из сессии
            $lastActivity = $request->session()->get('last_activity');
            $sessionTimeout = config('session.lifetime') * 60; // Время в секундах

            // Если время последней активности существует
            if ($lastActivity) {
                // Если прошло больше времени, чем разрешено для сессии
                if (Carbon::now()->timestamp - $lastActivity > $sessionTimeout) {
                    // Выход пользователя
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();

                    if ($request->expectsJson()) {
                        return response()->json([
                            'success' => false,
                            'message' => 'Сессия истекла. Пожалуйста, войдите снова.'
                        ], 401);
                    }

                    return redirect()->route('login')->with('error', 'Сессия истекла. Пожалуйста, войдите снова.');
                }
            }

            // Обновляем время последней активности
            $request->session()->put('last_activity', Carbon::now()->timestamp);

            return $next($request);
        }

        // Если пользователь не аутентифицирован
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Необходима авторизация'
            ], 401);
        }

        return redirect()->route('login');
    }
}
