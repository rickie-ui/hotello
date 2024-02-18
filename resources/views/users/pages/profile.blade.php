@extends('layouts.user')

@section('content')
    <section class=" mt-16 h-screen border-300 border-1  flex relative overflow-auto ">
        {{-- profile --}}
        @include('includes.navbar')
        <main class="w-4/5 ml-80 p-20">

            <h2 class="font-semibold text-lg mb-2">General settings</h2>
            <p class="text-sm opacity-60 mb-10 font-medium">These settings helps you modify account details settings.</p>

            {{-- form --}}
            <form action="/user/profile/{{ $user->id }}" method="POST" class="w-1/2 mb-10">
                @csrf
                @method('PUT')
                @if (session('message'))
                    <div class="bg-[#34BAA5] py-2 px-4  rounded-lg text-center text-white" id="profile">
                        <i class="fa fa-check-circle"></i> {{ session('message') }}
                    </div>
                @endif

                <label for="full_name" class="block my-2 font-medium">Full Name</label>
                <input type="text" placeholder="Full Name" name="full_name"
                    class="px-6 w-full rounded-md mb-2 py-3 block" value="{{ $user->full_name }}">
                @error('full_name')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <label for="email" class="block my-2 font-medium">Email</label>
                <input type="text" placeholder="Email" name="email" class="px-6 w-full rounded-md mb-2 py-3 block"
                    value="{{ $user->email }}">
                @error('email')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <label for="phone" class="block my-2 font-medium">Phone</label>
                <input type="text" placeholder="Phone" name="phone" class="px-6 w-full rounded-md mb-2 py-3 block"
                    value="{{ old('phone', $profile->phone ?? '') }}">
                @error('email')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <label for="gender" class="block my-2 font-medium">Gender</label>
                <select name="gender" class="px-6 w-full rounded-md mb-2 py-3 block">
                    <option value="" {{ old('gender', optional($profile)->gender) === '' ? 'selected' : '' }}>
                        Choose...</option>
                    <option value="Male" {{ old('gender', optional($profile)->gender) === 'Male' ? 'selected' : '' }}>Male
                    </option>
                    <option value="Female" {{ old('gender', optional($profile)->gender) === 'Female' ? 'selected' : '' }}>
                        Female</option>
                    <option value="other" {{ old('gender', optional($profile)->gender) === 'Other' ? 'selected' : '' }}>
                        Other</option>
                </select>
                @error('gender')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit"
                    class="w-full rounded-md my-4 block px-10 py-3 bg-fifth text-white hover:opacity:0.7 ">Update
                    account</button>

            </form>

        </main>
    </section>
@endsection
