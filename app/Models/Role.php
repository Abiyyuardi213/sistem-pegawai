<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'tabel_role';

    // Tentukan primary key
    protected $primaryKey = 'role_id';

    // Tentukan bahwa timestamps digunakan (created_at, updated_at)
    public $timestamps = true;

    // Tentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'role_name',
        'role_description',
        'role_salary',
        'role_status',
    ];

    // Mengambil semua data role
    public static function getAllRoles()
    {
        return self::all();
    }

    // Mengambil role berdasarkan ID
    public static function getRoleById($id)
    {
        return self::find($id);
    }

    // Membuat role baru
    public static function createRole($data)
    {
        return self::create($data);
    }

    // Mengedit role berdasarkan ID
    public static function editRole($id, $data)
    {
        $role = self::find($id);
        if ($role) {
            $role->update($data);
            return $role;
        }
        return null;
    }

    // Menghapus role berdasarkan ID
    public static function deleteRole($id)
    {
        return self::destroy($id);
    }

    // Mengambil semua role berdasarkan status tertentu (default aktif)
    public static function getRoles($status = 1)
    {
        return self::where('role_status', $status)->get();
    }
}
