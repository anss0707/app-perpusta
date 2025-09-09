<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $User = User::with('roles')->orderBy('id', 'DESC')->get(); // model pake di ujung nya
        $title = 'Management Role';
        return view('admin.user.index', compact('title', 'User'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorie = User::all();
        $title = 'Tambah Management Role';
        return view('admin.user.create', compact('title', 'categorie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        Alert::success('Berhasil!!', 'Data berhasil ditambah!');
        // Alert::success('Berhasil!!', 'Transaksi berhasil di buat');
        return redirect()->to('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = User::find($id);
        $title = 'Ubah Management Role';
        return view('admin.user.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $User = User::find($id);
        $User->name = $request->name;
        $User->email = $request->email;
        if($request->filled('password')) {
            $User->password = $request->password;
        }
        $User->save();

        Alert::success('Berhail!', 'Data berhasil di ubah!');
        return redirect()->to('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->to('user');
    }
    public function editRole($id)
    {
        $roles = Roles::get();
        $user = User::find($id);
        
        return view('admin.user.add_role', compact('roles', 'user'));
    }
    public function updateRoles(Request $request, $id)
    {
        $user = User::find($id);
        $user->roles()->sync($request->roles ??[]);
        Alert::success('Berhasil!!', 'Data berhasil ditambah');
        return redirect()->to('user');
     }

}
