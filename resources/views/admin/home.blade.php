@extends('layouts.user')

@section('content')
    <section class=" mt-16 h-screen border-300 border-1  flex relative">

        @include('includes.admin')
        <main class="w-4/5 ml-80 p-20">


            <h2 class="font-semibold text-lg mb-2">Dashboard Overview</h2>
            <p class="text-sm opacity-60 mb-10 font-medium">Check out rooms available and guests registered.</p>

            <section class="grid grid-cols-3 gap-3">
                <div class="w-auto h-44 p-8 bg-white border-2  rounded-md">
                    <h2 class="font-semibold text-lg opacity-70 mb-2 flex justify-between items-center"><span>Total
                            Bookings</span><i class="fa-solid fa-chart-line text-[#8CA546] opacity-100"></i>
                    </h2>
                    <p class="text-xl fot-medium mb-3">{{ $bookings }}</p>
                    <div class="flex gap-10">

                        <div class="flex flex-col gap-1">
                            <h3 class="opacity-60 text-xs  font-extralight uppercase tracking-widest">This Month</h3>
                            <p class=" tracking-widest opacity-80">{{ $bookingsCountThisMonth ?? 0 }}</p>
                        </div>

                        <div class="flex flex-col gap-1">
                            <h3 class="opacity-60 text-xs font-extralight uppercase tracking-widest">This Week</h3>
                            <p class=" tracking-widest opacity-80">{{ $bookingsCountThisWeek ?? 0 }}</p>
                        </div>
                    </div>
                </div>
                <div class="w-auto h-44 p-8 bg-white border-2  rounded-md">
                    <h2 class="font-semibold text-lg opacity-70 mb-2 flex justify-between items-center"><span>Rooms
                            Available</span><i class="fa-solid fa-building text-fifth opacity-100"></i>
                    </h2>
                    <p class="text-xl fot-medium mb-3">{{ $rooms }}</p>
                    <div class="flex gap-10">

                        <div class="flex flex-col gap-1">
                            <h3 class="opacity-60 text-xs  font-extralight uppercase tracking-widest">Booked(M)</h3>
                            <p class=" tracking-widest opacity-80">{{ $roomsBookedCountThisMonth ?? 0 }}</p>
                        </div>

                        <div class="flex flex-col gap-1">
                            <h3 class="opacity-60 text-xs font-extralight uppercase tracking-widest">Booked(W)</h3>
                            <p class=" tracking-widest opacity-80">{{ $roomsBookedCountThisWeek }}</p>
                        </div>
                    </div>
                </div>
                <div class="w-auto h-44 p-8 bg-white border-2  rounded-md">
                    <h2 class="font-semibold text-lg opacity-70 mb-2 flex justify-between items-center"><span>Total
                            Guests</span><i class="fa-solid fa-users text-[#49BBF1] opacity-100"></i>
                    </h2>
                    <p class="text-xl fot-medium mb-3">{{ $guests }}</p>
                    <div class="flex gap-10">

                        <div class="flex flex-col gap-1">
                            <h3 class="opacity-60 text-xs  font-extralight uppercase tracking-widest">This Month</h3>
                            <p class=" tracking-widest opacity-80">{{ $guestsCountThisMonth ?? 0 }}</p>
                        </div>

                        <div class="flex flex-col gap-1">
                            <h3 class="opacity-60 text-xs font-extralight uppercase tracking-widest">This Week</h3>
                            <p class=" tracking-widest opacity-80">{{ $guestsCountThisWeek ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-white p-8 my-4">

                <table id="dashboard" class="display">
                    <thead>
                        <tr class="text-xs uppercase text-left opacity-50">
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Check-In</th>
                            <th>Check-Out</th>
                            <th>Room-Type</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visitors as $visitor)
                            <tr class="text-sm capitalize">
                                <td>{{ $visitor->user->full_name }}</td>
                                <td>{{ $visitor->user->profile->phone }} </td>
                                <td class="lowercase"> {{ $visitor->user->email }} </td>
                                <td>{{ \Carbon\Carbon::parse($visitor->check_in)->format('d.m.Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($visitor->check_out)->format('d.m.Y') }}</td>
                                <td>{{ $visitor->room->room }}</td>
                                <td> {{ '$' . $visitor->total_amount }} </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </section>




        </main>
    </section>
@endsection
