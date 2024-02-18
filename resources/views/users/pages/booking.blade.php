@extends('layouts.user')

@section('content')
    <section class=" mt-16 h-screen border-300 border-1  flex relative overflow-auto ">
        {{-- profile --}}
        @include('includes.navbar')
        <main class="w-4/5 ml-80 p-20">

            <h2 class="font-semibold text-lg mb-2">All Bookings</h2>
            <p class="text-sm opacity-60 mb-10 font-medium">You have a total of {{ count($bookings) }} bookings.</p>

            <section class="bg-white p-8">
                @if (session('status'))
                    <div class="bg-[#34BAA5] py-2 px-4 absolute top-6 right-16 rounded-lg text-center text-white"
                        id="duration">
                        <i class="fa fa-check-circle"></i> {{ session('status') }}
                    </div>
                @endif


                <table id="booking" class="display">
                    <thead>
                        <tr class="text-sm text-left opacity-50">
                            <th>RoomID</th>
                            <th>Rate(/night)</th>
                            <th>Check-In</th>
                            <th>Check-Out</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($bookings as $booking)
                            <tr class="text-sm">
                                <td>{{ 'HO' . $booking->room->id }}</td>
                                <td>{{ '$' . $booking->room->rate }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d.m.Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d.m.Y') }}</td>
                                <td>{{ '$' . $booking->total_amount }}</td>
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
                                <td class="space-x-2">
                                    @if ($booking->status == 'checked-out' || $booking->status == 'canceled')
                                        <i class="fa-solid fa-check-double text-[#8CA546]"></i>
                                    @else
                                        <div class="relative inline-block text-left" x-data="{ isOpen: false }">
                                            <button @click="isOpen = !isOpen" type="button"
                                                class="inline-flex items-center justify-center w-full rounded-md shadow-sm px-4 py-2 text-sm font-medium text-gray-700 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200  active:text-gray-800">
                                                <i class="fa fa-ellipsis-v mr-2 self-center"></i>
                                            </button>

                                            <div x-show="isOpen" @click.away="isOpen = false"
                                                class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
                                                <div class="py-2 font-medium" role="menu" aria-orientation="vertical"
                                                    aria-labelledby="options-menu">

                                                    @if ($booking->status == 'booked')
                                                        <form action="/user/checkin/{{ $booking->id }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="block text-left w-full px-4 py-2 text-sm text-green-700 hover:bg-green-100 hover:text-green-900"
                                                                role="menuitem"><i class="fa fa-check-circle mr-2"></i>Check
                                                                In</button>
                                                        </form>

                                                        <form action="/user/cancel/{{ $booking->id }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="block text-left w-full px-4 py-2 text-sm text-red-700 hover:bg-red-100 hover:text-red-900"
                                                                role="menuitem"><i
                                                                    class="fa fa-times-circle mr-2"></i>Cancel</button>
                                                        </form>
                                                    @elseif($booking->status == 'checked-in')
                                                        <form action="/user/checkout/{{ $booking->id }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="block text-left w-full px-4 py-2 text-sm text-red-700 hover:bg-red-100 hover:text-red-900"
                                                                role="menuitem"><i class="fa fa-times-circle mr-2"></i>Check
                                                                Out</button>
                                                        </form>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
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
