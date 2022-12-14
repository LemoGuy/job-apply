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
                @if (auth()->user()->is_admin)
                    <li>
                        <a href="{{ route('user.index') }}" class="hover:text-sky-600"><i class="fa-solid fa-gear"></i>
                            Manage Users</a>
                    </li>
                    <li>
                        <a href="{{ route('job.index') }}" class="hover:text-sky-600"><i class="fa-solid fa-gear"></i>
                            Manage Jobs</a>
                    </li>
                @endif
                <li>
                    <span class="font-bold uppercase">
                        Welcome {{ auth()->user()->name }}
                    </span>
                </li>
                <li>
                    <a href="{{ route('my-job.index') }}" class="hover:text-sky-600"><i class="fa-solid fa-gear"></i>
                        My Jobs</a>
                </li>

                <li>
                    <a href="{{ route('my-request.index') }}" class="hover:text-sky-600"><i class="fa-solid fa-gear"></i>
                        @if (auth()->user()->account_type == 'company')
                            My Applicants
                        @elseif (auth()->user()->account_type == 'user')
                            My Requests
                        @endif
                    </a>
                </li>

                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit">
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
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-sky-900 text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

        <a href="{{ route('my-job.create') }}" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Post
            Job</a>
    </footer>

    <x-flash-message />
</body>

</html>
