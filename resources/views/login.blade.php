<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>InnoVixus - Login</title>
</head>

<body class="font-inter bg-blue-50 text-gray-900">
    <main class="min-h-screen flex flex-col bg-blue-50 justify-center">
        <section class=" flex items-center justify-center px-4 py-12">
            <div class="w-full max-w-md bg-white rounded-xl shadow-lg overflow-hidden p-0">
                <div class="py-4 px-6 mt-3">
                    <h1 class="text-2xl text-center font-bold text-[#1E376A]">Welcome Back!</h1>
                    <p class="text-[#1E376A] text-center text-sm mt-1">Silahkan Isi Form Ini untuk Masuk</p>
                </div>
                <div class="p-6 md:p-8">
                    <form method="POST" action="{{ route('login.request') }}" class="space-y-6">
                        @csrf
                        <div class="space-y-2">
                            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                            <input id="username" name="username" type="text" class="w-full px-4 py-2 rounded-lg border border-gray-300
                                @error('username') border-red-500 @enderror" value="{{ old('username') }}" placeholder="Masukkan Username"/>
                            @error('username')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
        
                        <div class="space-y-2">
                            <div class="flex justify-between items-center">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            </div>
                            <input id="password" name="password" type="password"  class="w-full px-4 py-2 rounded-lg border border-[#1E376A]
                                @error('password') border-red-500 @enderror" value="{{ old('password') }}" placeholder="••••••••"/>
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
        
                        <button type="submit" class="w-full border border-[#1E376A] bg-[#1E376A] hover:bg-white text-white hover:text-[#1E376A] font-medium py-2 px-4 rounded-lg transition duration-200">
                            Log In
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
