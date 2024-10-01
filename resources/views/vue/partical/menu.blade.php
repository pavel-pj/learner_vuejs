<nav class="bg-white border-gray-200  dark:bg-gray-900 dark:border-gray-700 ">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">


        <a href="{{route('easy-start')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{url('/storage/hexagon.png')}}" class="h-8" alt="Leaner" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                Le<span class="text-fuchsia-700">a</span>rner
            </span>
        </a>
{{--
        @auth("web") --}}
            <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">


                    <a
                            href="{{route('vue.easy-start')}}" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent " >

                        Easy start</a>


                    <li>
                        <a href="{{route('vue.words.index')}}" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent " >

                        Panel</a>
                    </li>


                    {{--
                    <!-- LEARN BOXES -->
                    <li>
                        <button id="dropdownNavbarForLearn" data-dropdown-toggle="dropdownNavbarLearn"

                                class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">

                            Learn
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbarLearn" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 xs:text-xl md:text-m text-gray-700  dark:text-white"  >


                                <li>
                                    <a href="{{route('vue.easy-start')}}" class="block w-full text-left mx-auto text-xl px-4 py-2 hover:bg-gray-100">
                                        Easy start</a>
                                </li>
                                <li>
                                    <a href="{{route('vue.word-options')}}" class="block w-full text-left mx-auto text-xl px-4 py-2 hover:bg-gray-100">
                                        Words Options</a>
                                </li>


                            </ul>

                        </div>
                    </li>




                    <!-- LEARN BOXES -->
                    <li>
                        <button id="dropdownNavbarPanel" data-dropdown-toggle="dropdownNavbar2"

                                class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">

                            Panel
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar2" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 xs:text-xl md:text-m text-gray-700  dark:text-white"  >


                                <li>
                                <a href="{{route('vue.words.index')}}" class="block w-full text-left mx-auto text-xl px-4 py-2 hover:bg-gray-100">Words Vue</a>
                                 </li>



                            </ul>

                        </div>
                    </li>







{{--
                    <li>
                        <a href="{{route('logout')}}" onClick="event.preventDefault();
        document.getElementById('logout-form').submit();" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                            Выйти</a>
                    </li>
--}}
                </ul>


            </div>


        {{--
            <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none">
                @csrf
            </form>

        @else
            <a href="{{route('login')}}"
               class="bg-purple-600 text-white py-2.5 px-5 me-2 text-m font-medium  focus:outline-none rounded-full border border-gray-200 hover:bg-gray-100 hover:text-grey-700 focus:z-10 focus:ring-4 focus:ring-gray-100  ">
                Вход</a>
        @endauth
--}}




    </div>
</nav>

