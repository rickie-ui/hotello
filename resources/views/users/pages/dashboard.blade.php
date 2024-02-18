@extends('layouts.user')

@section('content')
    <section class=" mt-16 h-screen border-300 border-1  flex relative">

        @include('includes.navbar')
        <main class="w-4/5 ml-80 p-20">


            <h2 class="font-semibold text-lg mb-2">Hi, Welcome back!</h2>
            <p class="text-sm opacity-60 mb-10 font-medium">Check out rooms available to you for booking.</p>

            <section class="flex flex-wrap items-center  pb-4 gap-3 ">
                {{-- rooms --}}
                @if (count($rooms) > 0)
                    @foreach ($rooms as $room)
                        <div class="relative w-80 h-[450px] pb-4 bg-white drop-shadow-md  cursor-pointer">
                            <img src="{{ $room->photo ? asset('storage/' . $room->photo) : asset('images/hero.jpg') }}"
                                alt="room" class=" h-44 w-full object-cover">

                            <h3
                                class="h-12 absolute w-16 rounded-3xl flex items-center justify-center top-36 left-32 text-white font-semibold bg-sixth">
                                {{ '$' . $room->rate }}
                            </h3>

                            <h1 class="text-2xl mb-2 mt-6 capitalize text-center">{{ $room->room }}</h1>
                            <p class="text-center mb-4 opacity-60">{{ $room->description }}</p>
                            <hr class="mb-2">

                            <div class="flex gap-6 items-center justify-center my-6">
                                <p class="uppercase"><i
                                        class="fa-regular fa-user text-sixth"></i>&ensp;{{ $room->conditioner }}
                                </p>
                                <p><i class="fa fa-bed text-sixth"></i>&ensp;{{ $room->bed }}</p>
                                <p><i
                                        class="fa-solid fa-ruler-combined rotate-90 text-sixth"></i>&ensp;{!! $room->size . 'M&sup2;' !!}
                                </p>
                            </div>

                            <a href="/user/bookings/create/{{ $room->id }}"
                                class="w-40 h-10 whitespace-nowrap flex items-center justify-center  mx-auto hover:bg-opacity-50 text-white duration-200 text-sm rounded-md bg-fifth ">Book
                                Now &emsp;<i class="fa-solid fa-arrow-down animate-bounce "></i></a>

                        </div>
                    @endforeach
                @else
                    <p class="text-fifth absolute left-1/2 top-80">No rooms available at the moment!</p>
                @endif


            </section>




        </main>
    </section>
@endsection
