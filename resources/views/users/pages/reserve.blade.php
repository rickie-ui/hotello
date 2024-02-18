@extends('layouts.user')

@section('content')
    <section class=" mt-16 h-screen border-300 border-1  flex relative overflow-auto ">
        {{-- profile --}}
        @include('includes.navbar')
        <main class="w-4/5 ml-80 p-20">

            <h2 class="font-semibold text-lg mb-2">Your Reservation</h2>
            <p class="text-sm opacity-60 mb-10 font-medium">Fill the details for your reservation correctly.</p>


            {{-- form --}}
            <form action="/user/bookings/create/{{ $room->id }}" method="POST" class="w-1/2 mb-10">
                @csrf

                @if (session('message'))
                    <div class="bg-[#34BAA5] py-2 px-4  rounded-lg text-center text-white" id="profile">
                        <i class="fa fa-check-circle"></i> {{ session('message') }}
                    </div>
                @endif

                <label for="check_in" class="block my-2 font-medium">Check In</label>
                <input type="text" placeholder="Select date..." name="check_in" id="check-in"
                    class="px-6 w-full rounded-md mb-2 py-3 block" value="{{ old('check_in') }}">
                @error('check_in')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <label for="check_out" class="block my-2 font-medium">Check Out</label>
                <input type="text" placeholder="Select date..." name="check_out"
                    class="px-6 w-full rounded-md mb-2 py-3 block" id="check-out" value="{{ old('check_out') }}">
                @error('check_out')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <label for="total_person" class="block my-2 font-medium">Total Person</label>
                <input type="text" placeholder="Total person" name="total_person"
                    class="px-6 w-full rounded-md mb-2 py-3 block" value="{{ old('total_person') }}">
                @error('total_person')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror


                <label for="note" class="block my-2 font-medium">Note</label>
                <textarea name="note" cols="30" rows="4" class="px-6 w-full rounded-md mb-2 py-3" placeholder="Add note">{{ old('note') }}</textarea>
                @error('note')
                    <div class="text-red-500 mt-2  font-medium  text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit"
                    class="w-full rounded-md my-4 block px-10 py-3 bg-fifth text-white hover:opacity:0.7 ">Book Now</button>

            </form>

        </main>
    </section>
@endsection
