<x-layout>

    <section class="h-full gradient-form bg-[#DCEFFA] md:h-screen mt-10">
        <div class="container py-12 px-6 h-full">
            <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
                <div class="xl:w-10/12">
                    <div class="block bg-white shadow-lg rounded-lg">
                        <div class="lg:flex lg:flex-wrap g-0">
                            <div class="lg:w-6/12 px-4 md:px-0">
                                <div class="md:p-12 md:mx-6">

                                    <div class="text-center">
                                        <a href="/" class="flex items-center">
                                            <img src="{{ asset('imgs/logo.png') }}" class="h-6 mr-3 sm:h-9"
                                                alt="Flowbite Logo">
                                            <span
                                                class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Job
                                                Apply</span>
                                        </a>
                                    </div>

                                    <h2 class="text-2xl font-bold uppercase mb-1 mt-6">
                                        Login
                                    </h2>

                                    <p class="mb-4">Please login to your account</p>


                                    <form method="POST" action="/users/authenticate">
                                        @csrf

                                        <div class="mb-4">
                                            <label for="email" class="inline-block text-lg mb-2">Email</label>
                                            <input type="email"
                                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                name="email" value="{{ old('email') }}" id="exampleFormControlInput1"
                                                placeholder="Email" />
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
                                                name="password" value="{{ old('password') }}"
                                                id="exampleFormControlInput1" placeholder="Password" />

                                            @error('password')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="text-center pt-1 mb-12 pb-1">
                                            <button type="submit" data-mdb-ripple="true" data-mdb-ripple-color="light"
                                                class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
                                                style="
                        background: linear-gradient(
                          to right,
                          #009FFD,
                          #2A2A72
                        );
                      ">
                                                Log in
                                            </button>
                                        </div>


                                        <div class="flex items-center justify-between pb-6">
                                            <p class="mb-0 mr-2">
                                                Don't have an account?

                                                <a href="/register" class="text-[#0080bf]">Register</a>


                                            </p>
                                        </div>

                                    </form>
                                </div>
                            </div>

                            <div class=" bg-cover bg-center lg:w-6/12 flex items-center lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none "
                                style="
                background-image: url({{ asset('imgs/reg.jpg') }})
              ">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
