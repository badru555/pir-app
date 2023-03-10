<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Userrole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.users', [
            'users' => User::with('userrole')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.userscreate', [
            'userroles' => Userrole::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users|alpha_dash',
            'email' => 'required|unique:users',
            'userrole_id' => 'required',
            'password' => 'min:8|max:16'
        ]);
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        return redirect('/users/create')->with('message', 'Pengguna berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.pages.usersupdate', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = [
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email')
        ];
        if ($request->input('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }
        $user->update($data);
        return redirect('/users')->with('message', 'Pengguna berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/users')->with('message', 'Pengguna berhasil dihapus');
    }
}
