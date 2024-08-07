<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index() {
        $data = User::all();
        return view('users.index', ['users' => $data]);
    }

    public function register() {
        return view('users.register');
    }

    public function store(Request $form) {
        $data = $form->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'username' => 'required|min:3',
            'password' => 'required|min:3',
            'admin' => 'required|boolean',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('users');
    }

    public function delete(User $user) {
        return view('users.delete', ['user' => $user]);
    }

    public function remove(User $user) {
        $user->delete();
        return redirect()->route('users');
    }

    public function edit(User $user) {
        return view('users.edit', ['user' => $user]);
    }

    public function editStore(Request $form, User $user) {
        $data = $form->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'username' => 'required|min:3',
            'password' => 'required|min:3',
            'admin' => 'required|boolean',
        ]);

        $user->fill($data);

        $user->save();

        return redirect()->route('users');
    }

    public function login(Request $form) {

        if ($form->isMethod('POST')) {

            $credentials = $form->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            if (Auth::attempt($credentials)) return redirect()->intended(route('index'));
            else return redirect()->route('login')->with('erro', 'Usuário ou senha inválidos');

        }

        return view('users.login');
    }

    public function logout(Request $form) {
        Auth::logout();
        return redirect()->route('index');
    }
}