<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Menampilkan semua role
    public function index()
    {
        $roles = Role::getAllRoles();
        return view('role.index', compact('roles')); // Mengirim data roles ke view
    }

    // Menampilkan role berdasarkan ID
    public function show($id)
    {
        $role = Role::getRoleById($id);
        if ($role) {
            return response()->json($role); // Role ditemukan
        }
        return response()->json(['message' => 'Role not found'], 404); // Role tidak ditemukan
    }

    // Membuat role baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'role_name' => 'required|string|max:255',
            'role_description' => 'nullable|string',
            'role_salary' => 'required|integer',
            'role_status' => 'required|boolean',
        ]);

        $role = Role::createRole($validated);
        return response()->json($role, 201); // Mengembalikan data role yang baru dibuat
    }

    // Mengupdate role berdasarkan ID
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'role_name' => 'required|string|max:255',
            'role_description' => 'nullable|string',
            'role_salary' => 'required|integer',
            'role_status' => 'required|boolean',
        ]);

        $role = Role::editRole($id, $validated);
        if ($role) {
            return response()->json($role); // Role berhasil diperbarui
        }
        return response()->json(['message' => 'Role not found'], 404); // Role tidak ditemukan
    }

    // Menghapus role berdasarkan ID
    public function destroy($id)
    {
        $role = Role::getRoleById($id);
        if ($role) {
            Role::deleteRole($id);
            return response()->json(['message' => 'Role deleted successfully']); // Role berhasil dihapus
        }
        return response()->json(['message' => 'Role not found'], 404); // Role tidak ditemukan
    }
}
