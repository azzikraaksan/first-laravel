<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f6fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 20px;
            color: #333;
        }

        label {
            font-weight: 600;
            margin-top: 15px;
            display: block;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        .button-group {
            display: flex;
            justify-content: flex-end;
            margin-top: 25px;
            gap: 10px;
        }

        .btn {
            padding: 10px 16px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            border: none;
        }

        .btn-cancel {
            background-color: #6b7280;
            color: white;
            text-decoration: none;
        }

        .btn-save {
            background-color: #2563eb;
            color: white;
        }

        .btn-cancel:hover {
            background-color: #4b5563;
        }

        .btn-save:hover {
            background-color: #1e3a8a;
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>Edit User</h2>
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="image">Upload Gambar</label>
            <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png">
            @if ($user->image_path)
                <div><a href="{{ asset('storage/' . $user->image_path) }}" target="_blank">Lihat Gambar Saat Ini</a></div>
            @endif

            <label for="name">Nama</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>

            <label for="password">Password Baru (opsional)</label>
            <input type="password" id="password" name="password">

            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation">

            <label for="pdf">Upload File PDF</label>
            <input type="file" id="pdf" name="pdf" accept=".pdf">
            @if ($user->pdf_path)
                <div><a href="{{ asset('storage/' . $user->pdf_path) }}" target="_blank">Lihat PDF Saat Ini</a></div>
            @endif

            <label for="excel">Upload File Excel</label>
            <input type="file" id="excel" name="excel" accept=".xls,.xlsx">
            @if ($user->excel_path)
                <div><a href="{{ asset('storage/' . $user->excel_path) }}" target="_blank">Download Excel Saat Ini</a></div>
            @endif


            <div class="button-group">
                <a href="{{ route('users.index') }}" class="btn btn-cancel">← Batal</a>
                <button type="submit" class="btn btn-save">Simpan</button>
            </div>
        </form>
    </div>

</body>

</html>