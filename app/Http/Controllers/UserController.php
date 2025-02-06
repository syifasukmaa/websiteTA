<?php

namespace App\Http\Controllers;

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
    public function detail($id)
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
    public function update(Request $request, $id)
    {
        $user = User::findOrfail($id);


        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->id_rt = $request->id_rt;
        $user->save();

        session()->flash('success', 'Data user ' . $user->name . ' berhasil diubah');
        return redirect()->route('pengguna.index');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $user = new User();
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->id_rt = $request->id_RT;
        $user->save();
        session()->flash('success', 'Data user ' . $user->name . ' berhasil ditambahkan');
        return redirect()->route('pengguna.index');
    }

    public function delete($id)
    {
        $user = User::findOrfail($id);

        $user->delete();
        session()->flash('success', 'Data user ' . $user->name . ' berhasil dihapus');
        return redirect()->route('pengguna.index');
    }


    public function adminLogin()
    {

        return view('admin.login');
    }
}
