<x-layout>

    <a href="{{ url()->previous() }}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i>
        Back
    </a>
    <x-card class="p-10">

        <header>

            <h1 class="text-3xl text-center font-bold mb-16 uppercase ">
                User Profile
            </h1>
        </header>

        <table class="w-6/12 table-auto rounded-sm text-left ">
            <thead class="text-left text-xl "></thead>
            <tbody>

                <tr class="border-gray-300 text-left">
                    <td class="text-2xl mb-2 font-bold">Name</td>
                    <td class="text-2xl mb-2 font-bold">:</td>
                    <td class="text-2xl mb-2">{{ $user->name }}</td>
                </tr>

                <tr class="border-gray-300 text-left">
                    <td class="text-2xl mb-2 font-bold">Email</td>
                    <td class="text-2xl mb-2 font-bold">:</td>
                    <td class="text-2xl mb-2">{{ $user->email }}</td>
                </tr>

                @auth
                    @if (auth()->user()->is_admin)
                        <tr class="border-gray-300 text-left">
                            <td class="text-2xl mb-2 font-bold">ID</td>
                            <td class="text-2xl mb-2 font-bold">:</td>
                            <td class="text-2xl mb-2">{{ $user->id }}</td>
                        </tr>

                        <tr class="border-gray-300 text-left">
                            <td class="text-2xl mb-2 font-bold">Account Type</td>
                            <td class="text-2xl mb-2 font-bold">:</td>
                            <td class="text-2xl mb-2">{{ $user->account_type }}</td>
                        </tr>

                        <tr class="border-gray-300 text-left">
                            <td class="text-2xl mb-2 font-bold">Account Status</td>
                            <td class="text-2xl mb-2 font-bold">:</td>
                            @if ($user->is_enabled == 1)
                                <td class="text-2xl mb-2">Active</td>
                            @else
                                <td class="text-2xl mb-2">Disabled</td>
                            @endif
                        </tr>

                        <tr class="border-gray-300 text-left">
                            <td class="text-2xl mb-2 font-bold">Created At</td>
                            <td class="text-2xl mb-2 font-bold">:</td>
                            <td class="text-2xl mb-2">{{ $user->created_at }}</td>
                        </tr>
                    @endif
                @endauth


            </tbody>
        </table>

    </x-card>
</x-layout>
