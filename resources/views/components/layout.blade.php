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
</head>

<body class="mb-48">
    <nav class="flex justify-between items-center mb-4">
        <a href="/"><img class="w-24" src="{{ asset('images/logo.png') }}" alt="" class="logo" /></a>
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
                        <div id="dropdownDefault" data-dropdown-toggle="dropdown" class="cursor-pointer hover:text-sky-600">
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
                @endif

                <!-- USER menu -->


                @if (auth()->user()->account_type == 'user')
                    <li>
                        <a href="{{ route('my-request.index') }}" class="hover:text-sky-600"><i
                                class="fa-solid fa-arrow-up"></i> My Requests </a>
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
                <li>

                    <a href="/register" class="hover:text-sky-600"><i class="fa-solid fa-user-plus"></i> Register</a>
                </li>
                <li>
                    <a href="/login" class="hover:text-sky-600"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a>
                </li>


            @endauth


        </ul>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer
        class=" bottom-0 left-0 w-full flex items-center justify-start font-bold bg-sky-900 text-white h-24 mt-24 opacity-75 md:justify-center">
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

    </footer>

    <x-flash-message />
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
</body>

</html>
