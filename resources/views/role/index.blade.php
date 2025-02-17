<!-- resources/views/role/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Role</title>
</head>
<body>

    <h1>Daftar Role</h1>
    <a href="{{ route('roles.create') }}">Buat Role Baru</a>

    <table>
        <thead>
            <tr>
                <th>Nama Role</th>
                <th>Deskripsi</th>
                <th>Gaji</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->role_name }}</td>
                    <td>{{ $role->role_description }}</td>
                    <td>{{ $role->role_salary }}</td>
                    <td>{{ $role->role_status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                    <td>
                        <a href="{{ route('roles.edit', $role->role_id) }}">Edit</a>
                        <form action="{{ route('roles.destroy', $role->role_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
