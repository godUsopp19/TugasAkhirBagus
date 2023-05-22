<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        if (!auth()->check()|| auth()->user()->role !== 'Admin') {
            abort(403);
        }
        $users = User::latest()->paginate(10);
        return view('user.index', compact('users'));
    }

    public function edit(User $user){
        if (!auth()->check()|| auth()->user()->role !== 'Admin') {
            abort(403);
        }
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        try {
            $this->validate($request, [
                'role'   => 'required'
            ]);

            $user = User::findOrFail($user->id);

            $user->update([
                'role'     => $request->role,
            ]);

            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diupdate!']);

        } catch (\Exception $e){

            return redirect()->route('user.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy($id)
    {
    $user = User::findOrFail($id);
    
    $user->delete();

    if($user){
        //redirect dengan pesan sukses
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('user.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }

}
