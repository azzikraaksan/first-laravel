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
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 6px;
            overflow: hidden;
        }

        th,
        td {
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
                <th>Foto Profil</th>
                <th>Nama</th>
                <th>Email</th>
                <th>PDF</th>
                <th>Excel</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>
                        @if ($user->image_path)
                            <img src="{{ asset('storage/' . $user->image_path) }}" alt="Gambar" width="50"
                                style="border-radius: 6px;">
                        @else
                            <span style="color: #888;">-</span>
                        @endif
                    </td>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    <!-- PDF -->
                    <td>
                        @if ($user->pdf_path)
                            <a href="{{ asset('storage/' . $user->pdf_path) }}" target="_blank">📄 PDF</a>
                        @else
                            <span style="color: #888;">-</span>
                        @endif
                    </td>

                    <!-- Excel -->
                    <td>
                        @if ($user->excel_path)
                            <a href="{{ asset('storage/' . $user->excel_path) }}" target="_blank">📊 Excel</a>
                        @else
                            <span style="color: #888;">-</span>
                        @endif
                    </td>

                    <td style="text-align: center;" class="action-column">
        <a href="{{ route('users.edit', $user->id) }}" class="button">Edit</a>

        <!-- Tombol Lihat: buka modal atau ke detail page (optional) -->
        <a href="{{ asset('storage/' . $user->image_path) }}" target="_blank" class="button">Lihat</a>

        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
              onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');"
              style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button">Hapus</button>
        </form>
    </td>

                    <!--<td style="text-align: center;">
                        <div class="action-column">
                            <a href="{{ route('users.edit', $user->id) }}" class="button">Edit</a>

                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">Hapus</button>
                            </form>
                        </div>
                    </td>-->

                    <!--<td style="text-align: center;">
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" 
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');" 
                                    style="display: inline-block; margin: auto;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button">Hapus</button>
                                </form>
                            </td>-->
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