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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css" />
    <script src="https://kit.fontawesome.com/46942b53f2.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <script src=" {{ asset('scripts/main.js') }}"></script>


    <title>Crestwood</title>
</head>

<body class="antialiased bg-[#F2F5F8] h-auto text-[#002745]">


    {{-- header --}}
    <header class="bg-first h-16 w-full fixed top-0 z-20 text-white px-3  flex  items-center justify-between">
        {{-- left --}}
        <div class="flex gap-8 items-center justify-center">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('images/crestwood.png') }}" alt="logo" class="h-16">
            </a>
        </div>
        {{-- right --}}

        <div
            class="px-8 font-semibold py-3 hover:text-opacity-80 cursor-pointer duration-200 text-sixth text-sm  bg-third">
            <i class="fa fa-user-circle"></i>&nbsp; {{ auth()->user()->full_name }}
        </div>

    </header>


    @yield('content')

</body>

</html>
