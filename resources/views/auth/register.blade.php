<x-layout>
    </header>
    <header>
        <section class="h-full gradient-form bg-[#DCEFFA] md:h-screen mt-20 mb-60 bg-[#DCEFFA]">
            <div class="container py-12 px-6 h-full">
                <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
                    <div class="xl:w-10/12">
                        <div class="block bg-white shadow-lg rounded-lg">
                            <div class="lg:flex lg:flex-wrap g-0">
                                <div class="lg:w-6/12 px-4 md:px-0">
                                    <div class="md:p-12 md:mx-6">

                                        <div class="text-center">
                                            <a href="/" class="flex items-center">
                                                <img src="{{ asset('images/logo.png') }}" class="h-6 mr-3 sm:h-9"
                                                    alt="Flowbite Logo">
                                                <span
                                                    class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Job
                                                    Apply</span>
                                            </a>
                                        </div>

                                        <h2 class="text-2xl font-bold uppercase mb-1 mt-6">
                                            Register
                                        </h2>

                                        <p class="mb-4">Create an account to post jobs</p>

                                        <script>
                                            function chnageAccountType() {
                                                var type = document.getElementById("account_type").value;
                                                if (type == 'user') {
                                                    document.getElementById("name").innerHTML = "Applicant Name";
                                                } else
                                                    document.getElementById("name").innerHTML = "Recruiter Name";
                                            }
                                        </script>

                                        <form method="POST" action="/users">
                                            @csrf


                                            <div class="mb-6">
                                                <label for="account_type" class="inline-block text-lg mb-2">Account
                                                    Type</label>
                                                <select onchange="chnageAccountType()" id="account_type"
                                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                    name="account_type" value="{{ old('account_type') }}">

                                                    <option value="user">Applicant</option>
                                                    <option value="company">Recruiter</option>


                                                </select>
                                                @error('account_type')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label id="name" for="name" class="inline-block text-lg mb-2">
                                                    Applicant Name
                                                </label>
                                                <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                                    name="name" value="{{ old('name') }}" />

                                                @error('name')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="email" class="inline-block text-lg mb-2">Email</label>
                                                <input type="email"
                                                    class="form-control block w-full px-3
            py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                    name="email" value="{{ old('email') }}" />
                                                @error('email')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>



                                            <div class="mb-4">
                                                <label for="password" class="inline-block text-lg mb-2">
                                                    Password
                                                </label>
                                                <input type="password"
                                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                    name="password" value="{{ old('password') }}" />

                                                @error('password')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="password_confirmation" class="inline-block text-lg mb-2">
                                                    Confirm Password
                                                </label>
                                                <input type="password"
                                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                    name="password_confirmation"
                                                    value="{{ old('password_confirmation') }}" />

                                                @error('password_confirmation')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="text-center pt-1 mb-12 pb-1">
                                                <button type="submit" data-mdb-ripple="true"
                                                    data-mdb-ripple-color="light"
                                                    class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
                                                    style="
                    background: linear-gradient(
                      to right,
                      #009FFD,
                      #2A2A72
                    );
                  ">
                                                    Sign Up
                                                </button>
                                            </div>


                                            <div class="flex items-center justify-between pb-6">
                                                <p class="mb-0 mr-2">
                                                    Already have an account?
                                                    <a href="/login" class="text-[#0080bf]">Login</a>
                                                </p>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <div class="bg-cover bg-center lg:w-6/12 flex items-center lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none "
                                    style="
          background-image: url({{ asset('images/login.png') }})
        ">
                                    <div class="text-[#1C658C] px-4 py-6 md:p-12 md:mx-6 mb-96">
                                        <h4 class="text-xl font-semibold mb-20 ml-20">We are more than just a company
                                        </h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</x-layout>
