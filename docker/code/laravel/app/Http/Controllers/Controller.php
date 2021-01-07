<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // protected function auth($request) {
    //     if ($request->currentUserId == 0) {
    //         return response()->json(['error_message' => 'You need register or login', 'isNotLogin' => true]);
    //     }
    //     return false;
    // }
}
