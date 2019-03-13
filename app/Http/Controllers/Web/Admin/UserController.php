<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Requests\User\BanUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::role('user')->get();

        return view('admin.pages.users.index', compact('users'));
    }

    public function banned()
    {
        $users = User::role('banned')->get();

        return view('admin.pages.users.banned', compact('users'));
    }

    public function ban(BanUserRequest $request, User $user) {
        $user->syncRoles(['banned']);

        return redirect()->route('users.banned');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name');
        return view('admin.pages.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::make($request->all());
        $user->password = bcrypt($request->get('password'));
        $user->avatar = 'https://iupac.org/wp-content/uploads/2018/05/default-avatar.png';
        $user->save();
        $user->uploadImage($request->file('avatar'));
        $user->assignRole($request->get('role'));

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name');
        return view('admin.pages.users.edit', compact(['user','roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        $user->fill($request->get('password')!= null ?
            array_merge($request->except('password'),
                ['password' => bcrypt($request->input('password'))]) :
                $request->except('password'));

        if ($request->file('avatar') != null) {
            $user->removeImage();
            $user->uploadImage($request->file('avatar'));
        }
        $user->save();
        $user->assignRole($request->get('role'));

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->removeImage();
        $user->delete();

        return redirect()->back();
    }
}
