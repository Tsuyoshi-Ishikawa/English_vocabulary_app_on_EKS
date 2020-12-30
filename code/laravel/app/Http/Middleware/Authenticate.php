<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        //元はこっち、こっちでも問題なさそうだがapi用に修正
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }

        //結局これは使わないことになった
        if ($request->current_user_id == 0) {
            return response()->json(['error_message' => 'You need register or login', 'isNotLogin' => true]);
        }
    }
}
