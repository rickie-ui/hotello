    {{-- sidebar and main --}}
    <aside class="w-1/5 h-screen border-r flex text-left flex-col fixed pt-24 text-second bg-first ">
        <a href="{{ route('home') }}"
            class="border-second hover:text-sixth pl-4 border-t py-3 flex items-center gap-2 {{ request()->is('admin/dashboard*') ? 'text-sixth border-r-4 border-sixth' : '' }}">
            <i class="fa-solid fa-chart-line"></i>
            <p>Dashboard</p>
        </a>
        <a href="{{ route('book') }}"
            class="border-second hover:text-sixth pl-4 border-t py-3 flex items-center gap-2 {{ request()->is('admin/bookings*') ? 'text-sixth border-r-4 border-sixth' : '' }}">
            <i class="fa-solid fa-calendar-days"></i>
            <p>Bookings</p>
        </a>
        <a href="{{ route('room') }}"
            class="border-second hover:text-sixth pl-4 border-t py-3 flex gap-2 items-center {{ request()->is('admin/rooms*') ? 'text-sixth border-r-4 border-sixth' : '' }}">
            <i class="fa-solid fa-users"></i>
            <p>Rooms</p>
        </a>
        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button type="submit" class="px-4 py-3 text-left text-sm border-second border-y  w-full hover:text-sixth ">
                <i class="fa fa-lock"></i>&ensp; Log Out
            </button>
        </form>
    </aside>
