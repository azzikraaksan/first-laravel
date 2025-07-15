<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan daftar semua user
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Menampilkan form tambah user
    public function create()
    {
        return view('users.create');
    }

    // Menyimpan user baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        // Simpan user baru
        //User::create([
        //    'name' => $validated['name'],
        //    'email' => $validated['email'],
        //    'password' => Hash::make($validated['password']),
        //]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);

        // Upload file (jika ada)
        if ($request->hasFile('image')) {
            $user->image_path = $request->file('image')->store('uploads/images', 'public');
        }
        if ($request->hasFile('pdf')) {
            $user->pdf_path = $request->file('pdf')->store('uploads/pdfs', 'public');
        }
        if ($request->hasFile('excel')) {
            $user->excel_path = $request->file('excel')->store('uploads/excels', 'public');
        }

        $user->save();

        //return redirect()->route('users.index')->with('success', 'User berhasil dibuat!');
    }

    //menampilkan form edit user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    //memproses update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        // Upload ulang file (jika ada)
        if ($request->hasFile('image')) {
            if ($user->image_path && \Storage::disk('public')->exists($user->image_path)) {
                \Storage::disk('public')->delete($user->image_path);
            }
            $user->image_path = $request->file('image')->store('uploads/images', 'public');
        }

        if ($request->hasFile('pdf')) {
            if ($user->pdf_path && \Storage::disk('public')->exists($user->pdf_path)) {
                \Storage::disk('public')->delete($user->pdf_path);
            }
            $user->pdf_path = $request->file('pdf')->store('uploads/pdfs', 'public');
        }

        if ($request->hasFile('excel')) {
            if ($user->excel_path && \Storage::disk('public')->exists($user->excel_path)) {
                \Storage::disk('public')->delete($user->excel_path);
            }
            $user->excel_path = $request->file('excel')->store('uploads/excels', 'public');
        }


        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui!');
    }

    // Menghapus user berdasarkan ID
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');
    }


    // (Optional: Bisa tambahkan edit, update, destroy di sini nanti)
}
