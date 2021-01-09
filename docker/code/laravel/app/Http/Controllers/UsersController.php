<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRegister;
use App\Http\Requests\UserLogin;
use App\Http\DTO\Input\UserRegisterInputData;
use App\Http\DTO\Input\UserLoginInputData;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function registerConfirm(Request $request) {
        $userInfo = new UserRegisterInputData($request->name, $request->email, $request->password);

        //usecaseをDI
        $outputData = app()->make('UserInteractor')->register($userInfo);

        //validation result
        if ($outputData->getError()) {
            return response()->json(['error_message' => $outputData->getError()->getMessage()]);
        }
        $currentUserId = $outputData->getId();
        return response()->json(['currentUserId' => $currentUserId]);
    }

    public function loginConfirm(Request $request) {
        clock("loginConfirmのrequest is {$request}");
        $userInfo = new UserLoginInputData($request->email, $request->password);

        //usecaseをDI
        $outputData = app()->make('UserInteractor')->login($userInfo);

        //validation result
        if ($outputData->getError()) {
            return response()->json(['error_message' => $outputData->getError()->getMessage()]);
        }
        $currentUserId = $outputData->getId();
        return response()->json(['currentUserId' => $currentUserId]);
    }

    public function home(Request $request) {
        $currentUserId = $request->currentUserId;

        //usecaseをDI
        $outputData = app()->make('UserInteractor')->getAllWords($currentUserId);

        $words = $outputData->getAllWords();
        return response()->json(['words' => $words]);
    }
}
