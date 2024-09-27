<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {

//        $user = DB::table('users')->where('email', 'like', '%.com')->latest();
//        dd($user);
        $users =  User::query()->latest()->get();
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function create(){
        return view('users.form', [
            'user' => new User(),
            'page_meta' => [
                'title' => 'Create New user',
            'method' => 'post',
                'url' => route('users.store'),
                'submit_text' => 'Create user'
            ]
        ]);
    }

    public function store(UserRequest $request){

//        User::create($request->all());
        User::create($request->validated());
//        return redirect('users');
        return to_route('users.index');

    }

    public function show(User $user)
    {
//        $user = User::query()->findOrFail($user->id);
        return view('users/show', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('users.form', [
            'user' => $user,
            'page_meta' => [
                'title' => 'Edit User' . $user->name,
                'method' => 'put',
                'url' => route('users.update', $user),
                'submit_text' => 'Update'
            ]
        ]);
    }

    public function update(UserRequest $request, User $user)
    {
     $user->update($request->validated());
//        return redirect('/users');
        return to_route('users.index');


    }

    public function destroy(User $user)
    {
        $user->delete();
//        return redirect(route('users.index'));
        return to_route('users.index');
    }


}
