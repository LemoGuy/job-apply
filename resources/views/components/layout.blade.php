<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>Job Apply</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="mb-48 bg-[#DCEFFA] mb-0">
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

    <nav
        class="flex justify-between items-center mb-0 bg-slate-50 bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600 ">

        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Job Apply</span>
            </a>

            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                    <li>
                        <span class="font-bold uppercase">
                            Welcome {{ auth()->user()->name }}
                        </span>
                    </li>

                    <!-- ADMIN menu -->

                    @if (auth()->user()->is_admin)
                        <li>
                            <div id="dropdownDefault" data-dropdown-toggle="dropdown"
                                class="cursor-pointer hover:text-sky-600">
                                <i class="fa-solid fa-chevron-down"></i>
                                Manage Users
                            </div>
                        </li>
                        <!-- Dropdown menu -->
                        <div id="dropdown"
                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                <li>
                                    <a href="{{ route('user.create') }}"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i
                                            class="fa-solid fa-user"></i> Create
                                        a User</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.index') }}"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i
                                            class="fa-solid fa-user-group"></i> List
                                        of users</a>
                                </li>

                            </ul>
                        </div>
                        <li>
                            <div id="dropdownDefault" data-dropdown-toggle="dropdown2"
                                class="cursor-pointer hover:text-sky-600">
                                <i class="fa-solid fa-chevron-down"></i>
                                Manage Jobs
                            </div>
                        </li>
                        <!-- Dropdown menu -->
                        <div id="dropdown2"
                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                {{-- <li>
                                <a href="{{ route('my-job.create') }}"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i
                                        class="fa-solid fa-briefcase"></i> Create
                                    a job</a>
                            </li> --}}
                                <li>
                                    <a href="{{ route('job.index') }}"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i
                                            class="fa-solid fa-list"></i> List
                                        of jobs</a>
                                </li>

                            </ul>
                        </div>
                    @endif


                    <!-- COMPANY menu -->


                    @if (auth()->user()->account_type == 'company')
                        <li>
                            <a href="{{ route('my-job.create') }}" class="hover:text-sky-600"><i
                                    class="fa-solid fa-briefcase"></i>
                                Post Job</a>
                        </li>

                        <li>
                            <a href="{{ route('my-job.index') }}" class="hover:text-sky-600"><i class="fa-solid fa-cog"></i>
                                My Jobs</a>
                        </li>

                        <li>

                            <a href="{{ route('my-request.index') }}" class="hover:text-sky-600"><i
                                    class="fa-solid fa-arrow-right"></i> My Applicants </a>
                        </li>
                        <li>
                            @include('partials._search')

                        </li>
                    @endif

                    <!-- USER menu -->


                    @if (auth()->user()->account_type == 'user')
                        <li>
                            <a href="{{ route('my-request.index') }}" class="hover:text-sky-600"><i
                                    class="fa-solid fa-arrow-up"></i> My Requests </a>
                        </li>
                        <li>
                            @include('partials._search')

                        </li>
                    @endif

                    <li>
                        <form class="inline" method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="hover:text-sky-600">
                                <i class="fa-solid fa-door-closed"></i> Logout
                            </button>
                        </form>
                    </li>
                @else
                    <ul
                        class="flex flex-col p-4 pr-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 ">


                        <li>
                            <a href="/"
                                class="text-base block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-[#1C658C] md:p-0 dark:text-white"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="/about"
                                class="text-base block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#1C658C] md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                        </li>
                        <li>
                            <a href="/services"
                                class="text-base block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#1C658C] md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                        </li>
                        <li>
                            <a href="/contact"
                                class="text-base block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#1C658C] md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                        </li>

                        <li>
                            @include('partials._search')
                        </li>


                    </ul>


                    <li>
                        <a href="/login"
                            class=" inline-block hover:border-2 text-white py-1.5 px-3 rounded-xl uppercase mt-3.5  hover:border-white bg-[#1C658C] mb-2 hover:bg-[#5FA5CE] ">
                            <i></i>
                            Login</a>
                    </li>


                @endauth


            </ul>
    </nav>

    <main class="bg-[#DCEFFA]">
        {{ $slot }}
    </main>

    <footer class="p-4 bg-white sm:p-6 dark:bg-gray-900 mt-4">




        <div class="md:flex md:justify-around">
            <div class="mb-6 md:mb-0">
                <a href="http://127.0.0.1:8000/" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" class="mr-3 h-8" alt="JobApply Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Job Apply</span>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                <div>
                    <ul class="text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="/" class="hover:underline">Home</a>
                        </li>
                        <li class="mb-4">
                            <a href="/about" class="hover:underline">About Us</a>
                        </li>
                        <li class="mb-4">
                            <a href="/services" class="hover:underline">Service</a>
                        </li>
                        <li>
                            <a href="/contact" class="hover:underline">Contact</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
                    <ul class="text-gray-600 dark:text-gray-400">
                        <li class="mb-4">

                            <a href="https://www.facebook.com/" class="hover:underline ">Facebook</a>
                        </li>
                        <li class="mb-4">

                            <a href="https://www.instagram.com/" class="hover:underline">Instagram</a>
                        </li>
                        <li>
                            <a href="https://twitter.com/" class="hover:underline">Twitter</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Contact Us</h2>
                    <ul class="text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <p href="#" class="hover:underline">call(00964)7500000000</p>
                        </li>
                        <li>
                            <p href="#" class="hover:underline">OurTeam@gmail.com</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-center">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
                © 2022 copyright. All Rights Reserved.
            </span>

        </div>

    </footer>

    <x-flash-message />
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
</body>

</html>
