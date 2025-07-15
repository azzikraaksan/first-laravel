<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Users</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            padding: 2rem;
        }

        h2 {
            color: #333;
        }

        .button {
            display: inline-block;
            background: #4f46e5;
            color: white;
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.3s ease;
            margin-right: 10px;
        }

        .button:hover {
            background: #3730a3;
        }

        .delete-button {
            background: #ef4444;
            border: none;
            padding: 8px 14px;
            border-radius: 6px;
            color: white;
            cursor: pointer;
            font-weight: 500;
            transition: background 0.3s ease;
        }

        .delete-button:hover {
            background: #b91c1c;
        }

        .button-container {
            margin-bottom: 15px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            border-radius: 6px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background-color: #f0f0ff;
            color: #444;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .empty-row {
            text-align: center;
            color: #888;
            padding: 20px;
        }

        .action-column {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>

    <div class="button-container">
        <a href="{{ url('/') }}" class="button">← Kembali ke Dashboard</a>
        <a href="{{ route('users.create') }}" class="button">+ Tambah User</a>
    </div>

    <h2 style="margin-bottom: 10px;">Daftar Pengguna</h2>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td style="text-align: center;">
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" 
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');" 
                        style="display: inline-block; margin: auto;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="empty-row">Belum ada data user.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

</body>
</html>
