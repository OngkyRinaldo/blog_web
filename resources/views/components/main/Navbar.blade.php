<nav class="w-full border-b-2 md:border-b-4 border-red-500 ">
    <div class=" container mx-auto px-4 ">
        <ul class="font-bold cursor-pointer text-end pt-3">
            @guest
            <li>
                <a href="{{ route('login') }} "
                    class="py-1 px-2 md:py-2 md:px-4 bg-black text-white rounded-md  hover:text-sky-300 ">Log
                    In</a>
            </li>

            @else
            <div class="flex  justify-end items-center gap-x-4">
                <li>
                    <a href="{{ route('dashboard') }} ">Dashboard</a>
                </li>
                <li class="py-1 px-2 md:py-2 md:px-4 bg-red-500 text-white rounded-md">
                    <a href=" {{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            </div>

            @endguest

        </ul>
        <div class="flex justify-between items-center pt-4 pb-2 md:pt-0   md:px-0">
            <a href="{{ route('guest.index') }}" class="font-bold text-4xl md:text-7xl text-black">B<span
                    class="text-red-500">Log</span> </a>

            <input type="search" class="py-2 px-4 rounded-lg" placeholder="search...">
        </div>



        <p id="date-paragraph" class=" text-end text-slate-500 font-semibold" />



    </div>

</nav>