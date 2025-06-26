<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOGIN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #fff7f5;
        }

        .custom-checkbox {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            width: 1rem;
            height: 1rem;
            border-radius: 0.25rem;
            border: 1px solid #d1d5db;
            position: relative;
            cursor: pointer;
            outline: none;
            transition: border-color 0.2s ease-in-out;
        }

        .custom-checkbox:checked {
            border-color: #FF637B;
        }

        .custom-checkbox:checked::before {
            content: "";
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 70%;
            height: 70%;
            transform: translate(-50%, -50%);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='%23FF637B'%3e%3cpath fill-rule='evenodd' d='M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z' clip-rule='evenodd' /%3e%3c/svg%3e");
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .input-field {
            background-color: #f3f4f6;
            border-radius: 0.75rem;
            border: 1px solid transparent;
            padding: 0.75rem 1rem;
            width: 100%;
            transition: all 0.3s ease-in-out;
        }

        .input-field:focus {
            background-color: white;
            outline: none;
            box-shadow: 0 0 0 2px #ff4b8d;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl flex flex-col lg:flex-row overflow-hidden max-w-5xl w-full my-8">
        <div
            class="lg:w-1/2 bg-gradient-to-br from-[#FF8C42] via-[#FF6B6B] to-[#FF4B8D] px-8 pt-8 pb-0 sm:px-10 sm:pt-10 sm:pb-0 md:px-12 md:pt-12 md:pb-0 flex flex-col justify-end items-center relative min-h-[300px] lg:min-h-0">
            <img src="{{asset('asset/auth/Girl.png')}}" alt="Ilustrasi wanita memegang kalender"
                class="max-w-[320px] sm:max-w-[380px] md:max-w-sm lg:max-w-md z-10" />
        </div>

        <div class="lg:w-1/2 p-8 sm:p-10 md:p-12 lg:p-16">
            <div class="flex justify-end w-full mb-6">
                <div class="flex items-center">
                    <img src="{{ asset('asset/auth/Vector.png') }}" alt="Logo AntiNganggur" class="h-8 w-auto mr-2" />
                    <div>
                        <span class="text-xl font-bold text-gray-800">Anti</span><span
                            class="text-xl font-bold text-[#FF7144]">Nganggur</span>
                    </div>
                </div>
            </div>
            <h1 class="text-3xl font-semibold text-gray-800 mb-8">
                Sign In
            </h1>

            {{-- Pesan Sukses dari Redirect --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            {{-- Pesan Error Validasi Email atau Login Umum --}}
            @error('email')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ $message }}</span>
                </div>
            @enderror
            {{-- Pesan Error Validasi Password --}}
            @error('password')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ $message }}</span>
                </div>
            @enderror


            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <input type="email" name="email" id="email" placeholder="Enter your email"
                        class="input-field @error('email') border-red-500 @enderror" value="{{ old('email') }}" required />
                </div>
                <div class="mb-6">
                    <input type="password" name="password" id="password" placeholder="Enter your password"
                        class="input-field @error('password') border-red-500 @enderror" required />
                </div>

                <div class="flex items-center justify-between mb-8 text-sm">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember"
                            class="custom-checkbox focus:ring-0 focus:ring-offset-0" />
                        <label for="remember" class="ml-2 text-gray-600 cursor-pointer">Remember me</label>
                    </div>
                    <a href="#"
                        class="font-medium text-gray-600 hover:text-[#FF4B8D] transition-colors duration-200">Forgot
                        Password</a>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-[#FF8C42] via-[#FF637B] to-[#FF4B8D] text-white font-semibold py-3 rounded-xl shadow-md hover:shadow-lg hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FF637B] transition-all duration-300">
                    Sign In
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}"
                    class="font-semibold text-[#FF7144] hover:text-[#FF4B8D] transition-colors duration-200">Sign Up</a>
            </p>
        </div>
    </div>
</body>

</html>
