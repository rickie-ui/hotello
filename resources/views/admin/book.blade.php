@extends('layouts.user')

@section('content')
    <section class=" mt-16 h-screen border-300 border-1  flex relative">

        @include('includes.admin')
        <main class="w-4/5 ml-80 p-20">


            <h2 class="font-semibold text-lg mb-2">Booking List</h2>
            <p class="text-sm opacity-60 mb-5 font-medium">You have a total of {{ count($bookings) }} bookings.</p>

            <section class="bg-white p-8 my-4">

                <table id="dashboard" class="display">
                    <thead>
                        <tr class="text-xs text-left opacity-50 uppercase">
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>RoomNo</th>
                            <th>Room-Type</th>
                            <th>Check-In</th>
                            <th>Check-Out</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($bookings as $booking)
                            <tr class="text-sm">
                                <td>{{ $booking->user->full_name }}</td>
                                <td>{{ $booking->user->profile->phone }} </td>
                                <td>{{ 'HO' . $booking->room->id }}</td>
                                <td>{{ $booking->room->room }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d.m.Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d.m.Y') }}</td>
                                <td> {{ '$' . $booking->total_amount }} </td>
                                <td>
                                    @if ($booking->status === 'booked')
                                        <p class="py-1.5 rounded-full px-4 bg-[#E9F5F1] text-[#7BDAC2] text-center text-sm">
                                            <i class="fa fa-check-circle"></i>&ensp;
                                            Booked
                                        </p>
                                    @elseif($booking->status === 'checked-in')
                                        <p class="py-1.5 rounded-full px-4 bg-[#F1F3E8] text-[#8CA546] text-center text-sm">
                                            <i class="fa-solid fa-spinner"></i>&ensp;
                                            Checked In
                                        </p>
                                    @elseif($booking->status === 'checked-out')
                                        <p class="py-1.5 rounded-full px-4 bg-[#EBF6FC] text-[#49BBF1] text-center text-sm">
                                            <i class="fa fa-info-circle"></i>&ensp;
                                            Checked Out
                                        </p>
                                    @elseif($booking->status === 'canceled')
                                        <p class="py-1.5 rounded-full px-4 bg-[#FFF5ED] text-fifth text-center text-sm">
                                            <i class="fa fa-times-circle"></i>&ensp;
                                            Cancelled
                                        </p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </section>




        </main>
    </section>
@endsection
