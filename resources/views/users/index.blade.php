<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage All Users
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>

                @unless($users->isEmpty())
                    @foreach ($users as $user)
                        <tr class="border-gray-300">


                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="{{ route('user.show', $user->id) }}">
                                    {{ $user->name }}
                                </a>
                            </td>




                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="{{ route('user.edit', $user->id) }}" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                    Edit</a>
                            </td>


                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <form method="POST" action="{{ route('user.destroy', $user->id) }}">

                                    @csrf
                                    @method('DELETE')

                                    @if ($user->is_enabled)
                                        <button class="text-red-500"><i class="fa-solid fa-times"></i> Disable</button>
                                    @else
                                        <button class="text-sky-500"><i class="fa-solid fa-check"></i> Enable</button>
                                    @endif


                                </form>
                            </td>


                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b bordet-gray-300 text-lg">
                            <p class="text-center">No Users Found</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>
