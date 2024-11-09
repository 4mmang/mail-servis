<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>
        Mail Serv!s | Login
    </title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto h-screen flex justify-center items-center px-4">
        <div class="bg-white shadow-md rounded-lg max-w-sm w-full p-6">
            <h1 class="text-3xl font-bold mb-5 text-center">Selamat Datang di <span class="text-primary"><a
                        href="{{ url('/') }}">Mail Servis</a></span></h1>
            @if (session('message'))
                <p class="border p-2 px-3 bg-red-400 text-white mb-4 text-center">{{ session('message') }}</p>
            @endif
            <form action="{{ route('login.validation') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email"
                        class="shadow valid:border-green-500 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <button type="submit"
                    class="bg-blue-500 rounded-full text-white px-4 py-2 mt-2 hover:bg-blue-600 w-full">Masuk</button>
                {{-- <div class="flex items-center mt-4">
                    <hr class="flex-grow border-t border-gray-300">
                    <span class="mx-4 text-gray-500">Atau masuk dengan</span>
                    <hr class="flex-grow border-t border-gray-300">
                </div>
                <a href="https://accounts.google.com"
                    class="h-9 mt-4 rounded-full mr-3 w-full text-center flex justify-center items-center border border-slate-300 text-slate-300 hover:border-slate-400 hover:text-slate-400">
                    <svg width="20" role="img" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>Google</title>
                        <path
                            d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z" />
                    </svg>oogle
                </a> --}}
            </form>
        </div>
    </div>
</body>

</html>
