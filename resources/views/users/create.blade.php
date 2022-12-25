<x-layout>
    <x-card class="p-10  max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create User
            </h2>

            <script>
                function chnageAccountType() {
                    var type = document.getElementById("account_type").value;
                    if (type == 'user') {
                        document.getElementById("name").innerHTML = "Applicant Name";
                    } else
                        document.getElementById("name").innerHTML = "Recruiter Name";
                }
            </script>
        </header>

        <form method="POST" action="{{ route('user.store') }}">
            @csrf

            <div class="mb-6">
                <label for="account_type" class="inline-block text-lg mb-2">Account Type</label>
                <select onchange="chnageAccountType()" id="account_type" class="border border-gray-200 rounded p-2 w-full"
                    name="account_type" value="{{ old('account_type') }}">

                    <option value="user">Applicant</option>
                    <option value="company">Recruiter</option>


                </select>
                @error('account_type')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label id="name" for="name" class="inline-block text-lg mb-2">
                    Applicant Name
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                    value="{{ old('name') }}" />

                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ old('email') }}" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
                    value="{{ old('password') }}" />

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="inline-block text-lg mb-2">
                    Confirm Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation"
                    value="{{ old('password_confirmation') }}" />

                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-sky-900 text-white rounded py-2 px-4 hover:bg-sky-600">
                    Submit
                </button>
            </div>
        </form>
    </x-card>
    </div>
</x-layout>
