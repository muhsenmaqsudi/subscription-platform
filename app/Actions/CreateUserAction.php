<?php

namespace App\Actions;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class CreateUserAction extends Action
{
    public function handle(UserRegisterRequest $request): Model|User
    {
        return User::query()->create([
            'name' => $request->name(),
            'email' => $request->email(),
            'password' => Hash::make($request->password())
        ]);
    }
}
