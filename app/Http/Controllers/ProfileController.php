<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show (User $user){
        return view('profile.show', [
            'user'=>$user,
            'tweets'=>$user->tweets()->latest()->paginate(3), ]);
    }

    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    public function update (User $user)
    {
       $attributes = request()->validate([
            'username' => [
                'string',
                'required',
                'max:255',
                'alpha_dash',
                Rule::unique('users')->ignore($user)
            ],

            'name' => ['string', 'required', 'max:255'],
            'email' => [
                'string',
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user)],
            'avatar' => ['file'],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed']
        ]);

       $attributes['password'] = Hash::make($attributes['password']);
       if(request('avatar')){
           $attributes['avatar']= "storage/".request('avatar')->store('avatars');
       }


       $user->update($attributes);

       return redirect ($user->path());
    }
}
