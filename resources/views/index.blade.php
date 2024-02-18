@extends('layouts.app')

@section('content')
    {{-- hero image --}}
    <section class="w-full text-white/90  min-h-screen  relative bg-cover bg-center bg-hero mt-16">
        <div class="absolute inset-0 bg-first bg-opacity-40"></div>
        <div class="pt-40 relative z-10 flex flex-col items-center justify-center">
            <h2 class=" font-hero text-6xl mb-10">Welcome to Crestwood</h2>
            <div class="flex items-center gap-10">
                <p class="flex flex-col items-center justify-center gap-4 text-5xl"><i class="fa fa-wifi"></i><span
                        class="text-xl">Wifi</span></p>
                <p class="flex flex-col items-center justify-center gap-4 text-5xl"><i
                        class="fa-solid fa-martini-glass-citrus"></i><span class="text-xl">Drinks</span></p>
                <p class="flex flex-col items-center justify-center gap-4 text-5xl"><i class="fa fa-dumbbell"></i><span
                        class="text-xl">Gym</span></p>
            </div>
            {{-- visit links --}}
            <div class="mt-10 flex items-center gap-5">
                <a href="#room" class="px-14 py-3 hover:opacity-80 text-sixth duration-200 text-2xl font-hero">Book
                    Now &emsp;<i class="fa-solid fa-arrow-down animate-bounce "></i></a>
            </div>
        </div>

    </section>


    <h2 class="text-3xl pl-24 font-semibold mt-6 font-hero mb-3" id="room">Room & suits</h2>
    <section class="grid grid-cols-3 mb-10 mx-24 gap-4">
        {{-- rooms --}}


        @forelse ($rooms as $room)
            <div
                class="relative w-96 h-[425px] bg-white drop-shadow-md hover:drop-shadow-lg transition-duration-300 hover:translate-y-[-10px] transition-transform cursor-pointer">
                <img src=" {{ $room->photo ? asset('storage/' . $room->photo) : '' }}" alt="room"
                    class=" h-52 w-full object-cover">

                <h3
                    class="h-12 absolute w-16 rounded-3xl flex items-center justify-center top-44 left-40 text-white font-semibold bg-sixth">
                    {{ '$' . $room->rate }}
                </h3>

                <h1 class="text-2xl capitalize mb-2 mt-10 text-center">{{ $room->room }}</h1>
                <p class="text-center mb-6 opacity-60">{{ $room->description }}
                </p>
                <hr class="mb-4">

                <div class="flex gap-6 items-center justify-center my-6">
                    <p class="uppercase"><i class="fa-solid fa-fan text-sixth"></i>&ensp;{{ $room->conditioner }}</p>
                    <p><i class="fa fa-bed text-sixth"></i>&ensp;{{ $room->bed }}</p>
                    <p><i class="fa-solid fa-ruler-combined rotate-90 text-sixth"></i>&ensp;{!! $room->size . 'M&sup2;' !!}
                    </p>
                </div>
            </div>
        @empty
            <p class="text-center text-red-400 ">No rooms available!</p>
        @endforelse

    </section>
@endsection
