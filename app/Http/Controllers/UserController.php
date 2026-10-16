<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\RT;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest();
        if (request('search')) {
            $users->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('role', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%');
        }
        return view('admin.users.dashboard', [
            'users' => $users->paginate(10),
            'rt' => RT::all()
        ]);
    }

    public function show($id)
    {
        return view('admin.users.detail', [
            'user' => User::where('id', $id)->first(),
            'rt' => RT::all()
        ]);
    }

    public function create()
    {
        return view(
            'admin.users.create',
            [
                'rt' => RT::all()
            ]
        );
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $user = User::create($data);

        session()->flash('success', 'Data user ' . $user->name . ' berhasil ditambahkan');
        return redirect()->route('pengguna.index');
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validated();

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        session()->flash('success', 'Data user ' . $user->name . ' berhasil diubah');
        return redirect()->route('pengguna.index');
    }

    public function destroy($id)
    {
        if (auth()->id() == $id) {
            session()->flash('error', 'Anda tidak dapat menghapus akun Anda sendiri saat sedang aktif.');
            return redirect()->route('pengguna.index');
        }

        $user = User::findOrFail($id);
        $user->delete();

        session()->flash('success', 'Data user ' . $user->name . ' berhasil dihapus');
        return redirect()->route('pengguna.index');
    }


    public function adminLogin()
    {

        return view('admin.login');
    }
}
