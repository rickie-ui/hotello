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

<body class="antialiased bg-[#F2F5F8] h-auto text-[#002745]">


    {{-- header --}}
    <header class="bg-first h-16 w-full fixed top-0 z-20 text-white px-24  flex  items-center justify-between">
        {{-- left --}}
        <div class="flex gap-8 items-center justify-center">
            <img src="{{ asset('images/crestwood.png') }}" alt="logo" class="h-16">
            <a href="#room" class="hover:text-sixth"><i class="fa fa-bed"></i>&emsp;Book a stay</a>
        </div>
        {{-- right --}}
        <div class="">
            <a href="/signup" class="px-4 py-3 hover:text-sixth text-xs font-medium bg-third"><i
                    class="fa fa-user-circle"></i>&nbsp;Log In / Sign
                Up</a>
        </div>

    </header>


    @yield('content')



    {{-- Footer --}}
    <footer class="flex justify-between items-center px-24 text-white   bg-first h-24 w-full">
        <img src="{{ asset('images/crestwood.png') }}" alt="logo" class="h-16">

        <p class="mt-4">Copyright 2024 &copy; Crestwood. All rights reserved.</p>

    </footer>
</body>

</html>
