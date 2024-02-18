@extends('layouts.user')

@section('content')
    <section class=" mt-16 h-screen border-300 border-1  flex relative">

        @include('includes.admin')
        <main class="w-4/5 ml-80 p-20">


            <h2 class="font-semibold text-lg mb-2">Edit Room</h2>
            <p class="text-sm opacity-60 mb-5 font-medium">Update room properties below.</p>


            {{-- form --}}
            <form action="{{ route('update', $room->id) }}" method="POST" class="w-1/2 pb-10" enctype="multipart/form-data">

                @if (session('message'))
                    <div class="bg-[#DBECF0] p-2 rounded-lg text-center text-[#34BAA5] " id="duration">
                        {{ session('message') }}
                    </div>
                @endif


                @csrf
                @method('PUT')

                <label for="room" class="block my-2 font-medium">Room Type</label>
                <select name="room" class="px-6 w-full rounded-md mb-2 py-3 block">
                    <option value="" {{ $room->room === '' ? 'selected' : '' }}>Choose...</option>
                    <option value="studio" {{ $room->room === 'studio' ? 'selected' : '' }}>Studio</option>
                    <option value="deluxe" {{ $room->room === '' ? 'deluxe' : '' }}>Deluxe</option>
                    <option value="standard" {{ $room->room === 'standard' ? 'selected' : '' }}>Standard</option>
                </select>
                @error('room')
                    <div class="text-red-500 mt-2  font-medium  text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <label for="rate" class="block my-2 font-medium">Rate($)</label>
                <input type="text" placeholder="Rate" name="rate" class="px-6 w-full rounded-md mb-2 py-3 block"
                    value="{{ $room->rate }}">
                @error('rate')
                    <div class="text-red-500 mt-2  font-medium  text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <label for="bed" class="block my-2 font-medium">Bed</label>
                <input type="text" placeholder="Bed" name="bed" class="px-6 w-full rounded-md mb-2 py-3 block "
                    value="{{ $room->bed }}">
                @error('bed')
                    <div class="text-red-500 mt-2  font-medium  text-sm">
                        {{ $message }}
                    </div>
                @enderror



                <label for="size" class="block my-2 font-medium">Size</label>
                <input type="text" placeholder="Size" name="size" class="px-6 w-full rounded-md mb-2 py-3 block"
                    value="{{ $room->size }}" />
                @error('size')
                    <div class="text-red-500 mt-2  font-medium  text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <label for="photo" class="block my-2 font-medium">Photo</label>
                <input type="file" placeholder="Photo" name="photo"
                    class="px-6 w-full rounded-md mb-2 py-3 block  bg-white" value="{{ $room->photo }}" />
                @error('photo')
                    <div class="text-red-500 mt-2  font-medium  text-sm">
                        {{ $message }}
                    </div>
                @enderror


                <label for="conditioner" class="block my-2 font-medium">Air Conditioner</label>
                <select name="conditioner" class="px-6 w-full rounded-md mb-2 py-3 block">
                    <option value="" {{ $room->conditioner === '' ? 'selected' : '' }}>Choose...</option>
                    <option value="ac" {{ $room->conditioner === 'ac' ? 'selected' : '' }}>AC</option>
                    <option value="none" {{ $room->conditioner === 'none' ? 'selected' : '' }}>None AC</option>
                </select>
                @error('conditioner')
                    <div class="text-red-500 mt-2  font-medium  text-sm ">
                        {{ $message }}
                    </div>
                @enderror

                <label for="description" class="block my-2 font-medium">Description</label>
                <textarea name="description" cols="30" rows="4" class="px-6 w-full rounded-md mb-2 py-3"
                    placeholder="Description">{{ $room->description }}</textarea>
                @error('description')
                    <div class="text-red-500 mt-2  font-medium  text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit"
                    class="w-full rounded-md my-4 block px-10 py-3 bg-fifth text-white hover:opacity:0.7 ">Update
                    Information</button>

            </form>

        </main>
    </section>
@endsection
