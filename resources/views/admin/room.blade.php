@extends('layouts.user')

@section('content')
    <section class=" mt-16 h-screen border-300 border-1  flex relative">

        @include('includes.admin')
        <main class="w-4/5 ml-80 p-20">

            <div class="flex items-center justify-between">
                <div>

                    <h2 class="font-semibold text-lg mb-2">Rooms List</h2>
                    <p class="text-sm opacity-60 mb-5 font-medium">You have a total of {{ count($rooms) }} rooms.</p>
                </div>
                <a href="{{ route('create') }}" class="px-6 py-3 rounded-md bg-fifth text-white">
                    <i class="fa-solid fa-circle-plus"></i>&ensp;
                    New Room
                </a>
            </div>

            @if (session('success'))
                <div class="bg-[#DBECF0] p-2 inline-block  rounded-lg text-center text-[#34BAA5] " id="success">
                    {{ session('success') }}
                </div>
            @endif


            <section class="bg-white p-8 my-4">

                <table id="dashboard" class="display">
                    <thead>
                        <tr class="text-xs text-left opacity-50 uppercase">
                            <th>RoomNo</th>
                            <th>Room-Type</th>
                            <th>Size</th>
                            <th>Beds</th>
                            <th>Ac/Non-ac</th>
                            <th>Rate</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                            <tr class="text-sm">
                                <td>{{ 'HO' . $room->id }}</td>
                                <td class="capitalize">{{ $room->room }}</td>
                                <td>{!! $room->size . 'M&sup2;' !!}</td>
                                <td>{{ $room->bed }}</td>
                                <td class="uppercase">{{ $room->conditioner }}</td>
                                <td>{{ '$' . $room->rate . '/night' }}</td>
                                <td>
                                    @if ($room->status === 'available')
                                        <p class="py-1.5 rounded-full px-4 bg-[#EBF6FC] text-[#49BBF1] text-center text-sm">
                                            <i class="fa fa-check-circle"></i>&ensp;
                                            Available
                                        </p>
                                    @elseif($room->status === 'booked')
                                        <p class="py-1.5 rounded-full px-4 bg-[#FFF5ED] text-fifth text-center text-sm">
                                            <i class="fa-solid fa-circle-info"></i>&ensp;
                                            Booked
                                        </p>
                                    @else
                                        <p class="py-1.5 rounded-full px-4 bg-[#F2F4EB] text-[#829E37] text-center text-sm">
                                            <i class="fa-solid fa-address-card"></i>&ensp;
                                            Occupied
                                        </p>
                                    @endif
                                </td>

                                <td>

                                    <a href="{{ route('update', $room->id) }}" class="text-[#5AD1B2] hover:opacity-60">
                                        edit
                                    </a>&ensp;
                                    <a href="{{ route('destroy', $room->id) }}" class="text-fifth hover:opacity-60">
                                        delete
                                    </a>

                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </section>




        </main>
    </section>
@endsection
