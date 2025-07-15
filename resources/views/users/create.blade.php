<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah User</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f3f4f6;
            padding: 2rem;
        }

        .card {
            background: white;
            max-width: 500px;
            margin: 0 auto;
            padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 1rem;
            color: #333;
        }

        form div {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.25rem;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 0.375rem;
        }

        .btn {
            background: #2563eb;
            color: white;
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn:hover {
            background: #1e40af;
        }

        .btn-secondary {
            background: #6b7280;
            margin-right: 0.5rem;
        }

        .btn-secondary:hover {
            background: #4b5563;
        }

        .error {
            color: #dc2626;
            font-size: 0.875rem;
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>Tambah User Baru</h2>

        {{-- tampilkan error validasi --}}
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="image">Upload Gambar</label>
                <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png">
            </div>

            <div>
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div>
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <div>
                <label for="pdf">Upload File PDF</label>
                <input type="file" id="pdf" name="pdf" accept=".pdf">
            </div>

            <div>
                <label for="excel">Upload File Excel</label>
                <input type="file" id="excel" name="excel" accept=".xls,.xlsx">
            </div>

            <div>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">← Batal</a>
                <button type="submit" class="btn">Simpan</button>
            </div>
        </form>
    </div>

</body>

</html>