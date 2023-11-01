<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    protected $redirectTo = '/dashboard';
    public function index(){
        return view('auth.register');

    }
    public function register(Request $request){
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        Auth::login($user); // Automatically login the user after registration

        return redirect($this->redirectTo);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'role' => $data['role'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
