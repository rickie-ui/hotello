<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- css --}}
    @vite('resources/css/app.css')
    {{-- icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/46942b53f2.js" crossorigin="anonymous"></script>


    <title>Crestwood</title>
</head>

<body>

    <section class="bg-white w-1/3 rounded-xl mt-52 mb-10 py-4 px-8 mx-auto">
        <h2 class="my-5 text-2xl font-semibold tracking-wider">Welcome back!</h2>

        @if (session('message'))
            <div
                class="border-l-4 border-red-500 py-1  px-4 -mb-4 rounded-full font-medium text-lg text-red-500 opacity-60">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('signin') }}" method="POST">
            @csrf
            <div class="my-10 relative">
                <input type="text" name="email"
                    class="peer block h-10 w-full border-b-2 text-gray-900 focus:outline-none focus:border-[#0769C3] placeholder-transparent @error('email') border-red-500 @enderror"
                    placeholder="Email address" value="{{ old('email') }}" />
                <label for="email"
                    class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all cursor-text pointer-events-none peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-600 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm peer-focus:font-semibold">Email
                    address</label>

                @error('email')
                    <div class="text-red-500 mt-2 -mb-4 font-medium  text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="my-10 relative">
                <input type="password" name="password"
                    class="peer block h-10 w-full border-b-2  text-gray-900 focus:outline-none focus:border-[#0769C3] placeholder-transparent @error('password') border-red-500 @enderror"
                    placeholder="Create password" />
                <label for="password"
                    class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all cursor-text pointer-events-none peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-600 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm peer-focus:font-semibold">Password</label>
                @error('password')
                    <div class="text-red-500 mt-2 -mb-4 font-medium  text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit"
                class="rounded-3xl bg-first text-white font-bold w-full py-3 hover:bg-[#002745] focus:bg-[#002745] text-xl">Continue</button>
        </form>

        <p class="text-center mb-4 mt-4 text-sm">
            New to Crestwood? <a href="/signup" class="text-sixth hover:underline">Create an account</a>
        </p>

        @if (session('logout'))
            <div class="py-2 absolute right-4 top-4 transition-all  px-6 rounded-md font-medium  text-white bg-red-400"
                id="logout">
                <i class="fa fa-check-circle"></i>
                {{ session('logout') }}
            </div>
        @endif

    </section>

</body>

</html>
