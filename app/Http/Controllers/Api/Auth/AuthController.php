<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Auth\CreateAccount;
use App\Http\Resources\Api\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;

class AuthController extends Controller
{
    public function getCredentials(Request $request)
    {
        return  [
            'email'    => $request->email,
            'password' => $request->password
        ];
    }

    public function createAccount(CreateAccount $request)
    {
        $user = User::create($request->validated());

        if (!Auth::attempt($this->getCredentials($request))) {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => trans('auth.there_is_problem')
            ], 401);
        }

        $user = Auth('sanctum')->user();

        return UserResource::make($user)
            ->additional([
                'status' => true,
                'message' => Lang::get('auth.success')
            ]);
    }

}
