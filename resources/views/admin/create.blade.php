@extends('layouts.user')

@section('content')
    <section class=" mt-16 h-screen border-300 border-1  flex relative">

        @include('includes.admin')
        <main class="w-4/5 ml-80 p-20">


            <h2 class="font-semibold text-lg mb-2">Add Room</h2>
            <p class="text-sm opacity-60 mb-5 font-medium">Specify all the room properties below.</p>


            {{-- form --}}
            <form action="{{ route('create') }}" method="POST" class="w-1/2 pb-10" enctype="multipart/form-data">

                @if (session('message'))
                    <div class="bg-[#DBECF0] p-2 rounded-lg text-center text-[#34BAA5] " id="duration">
                        {{ session('message') }}
                    </div>
                @endif

                @csrf

                <label for="room" class="block my-2 font-medium">Room Type</label>
                <select name="room"
                    class="px-6 w-full rounded-md mb-2 py-3 block @error('conditioner') ring-1 ring-red-500 @enderror">
                    <option value="" {{ old('room') === '' ? 'selected' : '' }}>Choose...</option>
                    <option value="studio" {{ old('room') === 'studio' ? 'selected' : '' }}>Studio</option>
                    <option value="deluxe" {{ old('room') === '' ? 'deluxe' : '' }}>Deluxe</option>
                    <option value="standard" {{ old('room') === 'standard' ? 'selected' : '' }}>Standard</option>
                </select>
                @error('room')
                    <div class="text-red-500 mt-2  font-medium  text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <label for="rate" class="block my-2 font-medium">Rate</label>
                <input type="text" placeholder="Rate" name="rate"
                    class="px-6 w-full rounded-md mb-2 py-3 block @error('rate') border-1 border-red-500 @enderror"
                    value="{{ old('rate') }}">
                @error('rate')
                    <div class="text-red-500 mt-2  font-medium  text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <label for="bed" class="block my-2 font-medium">Bed</label>
                <input type="text" placeholder="Bed" name="bed"
                    class="px-6 w-full rounded-md mb-2 py-3 block @error('bed') border-1 border-red-500 @enderror"
                    value="{{ old('bed') }}">
                @error('bed')
                    <div class="text-red-500 mt-2  font-medium  text-sm">
                        {{ $message }}
                    </div>
                @enderror



                <label for="size" class="block my-2 font-medium">Size</label>
                <input type="text" placeholder="Size" name="size"
                    class="px-6 w-full rounded-md mb-2 py-3 block @error('size') border-1 border-red-500 @enderror"
                    value="{{ old('size') }}" />
                @error('size')
                    <div class="text-red-500 mt-2  font-medium  text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <label for="photo" class="block my-2 font-medium">Photo</label>
                <input type="file" placeholder="Photo" name="photo"
                    class="px-6 w-full rounded-md mb-2 py-3 block  bg-white @error('photo') border-1 border-red-500 @enderror"
                    value="{{ old('photo') }}" />
                @error('photo')
                    <div class="text-red-500 mt-2  font-medium  text-sm">
                        {{ $message }}
                    </div>
                @enderror


                <label for="conditioner" class="block my-2 font-medium">Air Conditioner</label>
                <select name="conditioner"
                    class="px-6 w-full rounded-md mb-2 py-3 block @error('conditioner') border-1 border-red-500 @enderror">
                    <option value="" {{ old('conditioner') === '' ? 'selected' : '' }}>Choose...</option>
                    <option value="ac" {{ old('conditioner') === 'ac' ? 'selected' : '' }}>AC</option>
                    <option value="none" {{ old('conditioner') === 'none' ? 'selected' : '' }}>None AC</option>
                </select>
                @error('conditioner')
                    <div class="text-red-500 mt-2  font-medium  text-sm ">
                        {{ $message }}
                    </div>
                @enderror

                <label for="description" class="block my-2 font-medium">Description</label>
                <textarea name="description" cols="30" rows="4"
                    class="px-6 w-full rounded-md mb-2 py-3 @error('description') border-1 border-red-500 @enderror"
                    placeholder="Description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-red-500 mt-2  font-medium  text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit"
                    class="w-full rounded-md my-4 block px-10 py-3 bg-fifth text-white hover:opacity:0.7 ">Add room</button>

            </form>

        </main>
    </section>
@endsection
