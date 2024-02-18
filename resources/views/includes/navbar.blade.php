    {{-- sidebar and main --}}
    <aside class="w-1/5 h-screen border-r flex text-left flex-col fixed pt-24 text-second bg-first ">
        <a href="{{ route('dashboard') }}"
            class="border-second hover:text-sixth pl-4 border-t py-3 flex items-center gap-2 {{ request()->is('user/dashboard*') ? 'text-sixth border-r-4 border-sixth' : '' }}">
            <i class="fa-solid fa-house"></i>
            <p>Dashboard</p>
        </a>
        <a href="{{ route('booking') }}"
            class="border-second hover:text-sixth pl-4 border-t py-3 flex items-center gap-2 {{ request()->is('user/bookings*') ? 'text-sixth border-r-4 border-sixth' : '' }}">
            <i class="fa-solid fa-address-book"></i>
            <p>Bookings</p>
        </a>
        <a href="/user/profile/{{ auth()->user()->id }}"
            class="border-second hover:text-sixth pl-4 border-t py-3 flex gap-2 items-center {{ request()->is('user/profile*') ? 'text-sixth border-r-4 border-sixth' : '' }}">
            <i class="fa-solid fa-user"></i>
            <p>Profile</p>
        </a>

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button type="submit" class="px-4 py-3 text-left border-second border-y  w-full hover:text-sixth ">
                <i class="fa fa-lock"></i>&ensp; Log Out
            </button>
        </form>

    </aside>
