<x-layout>
    <div class="m-20 p-10">

        <x-card class="p-10">
            <a href="{{ url()->previous() }}" class="inline-block text-black ml-4 mb-4"><i
                    class="fa-solid fa-arrow-left"></i>
                Back
            </a>
            <header>
                @auth
                    @if (auth()->user()->is_admin)
                        <h1 class="text-3xl text-center font-bold mb-16 uppercase ">
                            User Profile
                        </h1>
                    @elseif (auth()->user()->account_type == 'company')
                        <h1 class="text-3xl text-center font-bold mb-16 uppercase ">
                            Applicant Profile
                        </h1>
                    @else
                        <h1 class="text-3xl text-center font-bold mb-16 uppercase ">
                            Recruiter Profile
                        </h1>
                    @endif
                @endauth
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
                                <td class="text-2xl mb-2">
                                    @if ($user->account_type == 'company')
                                        Recruiter
                                    @elseif ($user->account_type == 'user')
                                        Applicant
                                    @endif
                                </td>
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
    </div>
</x-layout>
