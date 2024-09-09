<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController  
{
    public function create()
    {
        return view('users.create');
    }
    
    public function store()
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);
        
        auth()->login($user);
        
        return to_route('series.index');
    }
}