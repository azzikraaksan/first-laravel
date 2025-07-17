<!-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Laravel</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 min-h-screen flex items-center justify-center font-sans">

    <div class="bg-white shadow-2xl rounded-2xl p-10 max-w-xl w-full text-center">
        <div class="flex items-center justify-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-500 animate-bounce" viewBox="0 0 20 20" fill="currentColor">
                <path d="M11 3a1 1 0 00-2 0v1a1 1 0 002 0V3zM4.22 4.22a1 1 0 00-1.42 1.42l.71.71a1 1 0 001.42-1.42l-.71-.71zm11.56 0a1 1 0 011.42 1.42l-.71.71a1 1 0 01-1.42-1.42l.71-.71zM17 9a1 1 0 100 2h1a1 1 0 100-2h-1zM3 9a1 1 0 100 2H2a1 1 0 100-2h1zm12.78 6.78a1 1 0 10-1.42 1.42l.71.71a1 1 0 001.42-1.42l-.71-.71zM4.22 15.78a1 1 0 011.42 1.42l-.71.71a1 1 0 01-1.42-1.42l.71-.71zM11 16a1 1 0 10-2 0v1a1 1 0 002 0v-1z" />
            </svg>
        </div>

        <h1 class="text-4xl font-bold text-indigo-800 mb-2">Halo, Azzikra! 👋</h1>
        <p class="text-gray-600 text-lg mb-6">
            Selamat datang di dashboard Laravel yang lebih glowing dari biasanya ✨
        </p>

        <a href="{{ route('users.index') }}"
           class="inline-flex items-center justify-center bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-indigo-600 hover:to-purple-600 text-white px-6 py-3 rounded-xl text-lg shadow-md transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 -ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5V4H2v16h5m10 0l-4-4m0 0l-4 4m4-4v12" />
            </svg>
            Lihat Data Users
        </a>
    </div>

</body>
</html> -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Laravel</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to bottom right, #cfe0fc, #e8d9f8, #ffd8e4);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background: white;
            padding: 2.5rem;
            border-radius: 1.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        .icon {
            animation: bounce 1.2s infinite;
            margin-bottom: 1.5rem;
        }

        .title {
            font-size: 2rem;
            color: #4338ca;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .desc {
            color: #555;
            font-size: 1.125rem;
            margin-bottom: 1.5rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            background: linear-gradient(to right, #6366f1, #8b5cf6);
            color: white;
            border: none;
            border-radius: 0.75rem;
            text-decoration: none;
            transition: background 0.3s ease;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }

        .btn:hover {
            background: linear-gradient(to right, #4f46e5, #7c3aed);
        }

        .btn svg {
            margin-right: 0.5rem;
            height: 1.2rem;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
    </style>
</head>
<body>

    <div class="card">
        <!-- <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" viewBox="0 0 20 20" fill="#6366f1">
                <path d="M11 3a1 1 0 00-2 0v1a1 1 0 002 0V3zM4.22 4.22a1 1 0 00-1.42 1.42l.71.71a1 1 0 001.42-1.42l-.71-.71zm11.56 0a1 1 0 011.42 1.42l-.71.71a1 1 0 01-1.42-1.42l.71-.71zM17 9a1 1 0 100 2h1a1 1 0 100-2h-1zM3 9a1 1 0 100 2H2a1 1 0 100-2h1zm12.78 6.78a1 1 0 10-1.42 1.42l.71.71a1 1 0 001.42-1.42l-.71-.71zM4.22 15.78a1 1 0 011.42 1.42l-.71.71a1 1 0 01-1.42-1.42l.71-.71zM11 16a1 1 0 10-2 0v1a1 1 0 002 0v-1z" />
            </svg>
        </div> -->

        <h1 class="title">Haloowww👋</h1>
        <p class="desc">Welcome! Here’s your classic dashboard to explore user data✨</p>

        <a href="{{ route('users.index') }}" class="btn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5V4H2v16h5m10 0l-4-4m0 0l-4 4m4-4v12" />
            </svg>
            Lihat Data Users
        </a>
    </div>

</body>
</html>
