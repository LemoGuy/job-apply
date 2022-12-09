<x-layout>
    @include('partials._search')


    <a href="{{ url()->previous() }}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">


                <h3 class="text-2xl mb-2">{{ $user->name }}</h3>
                <h3 class="text-2xl mb-2">{{ $user->email }}</h3>
                <h3 class="text-2xl mb-2">{{ $user->is_admin }}</h3>
                <h3 class="text-2xl mb-2">{{ $user->is_enabled }}</h3>
                <h3 class="text-2xl mb-2">{{ $user->created_at }}</h3>







            </div>
        </x-card>



    </div>
</x-layout>
