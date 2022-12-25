<x-layout class="">
    <section>
        <!-- home background -->
        <div id="carouselExampleSlidesOnly" class="carousel slide relative " data-bs-ride="carousel">
            <div class="carousel-inner relative w-full overflow-hidden ">



                <div
                    class=" brightness-50 carousel-item active relative float-left w-full absolute top-0 left-0 w-full h-full  bg-no-repeat bg-center">
                    <img src="{{ asset('images/home.jpg') }}" class="block w-full" alt="home" />
                </div>

                <div class="brightness-50 carousel-item relative float-left w-full">
                    <img src="{{ asset('images/home2.jpg') }}" class="block w-full" alt="home2" />
                </div>

                <div class="brightness-50 carousel-item relative float-left w-full">
                    <img src="{{ asset('images/home3.jpg') }}" class="block w-full" alt="home3" />
                </div>


                <div class="carousel-caption hidden md:block absolute text-center pb-40  ">
                    <div class="z-10 relative  flex flex-col justify-center align-center text-center space-y-4">
                        <div class=" ">
                            <h1 class="text-6xl font-bold uppercase text-white">
                                Job<span class="text-[#1C658C] ">Apply</span>
                            </h1>
                            <p class="text-2xl text-gray-200 font-bold my-4">
                                Find or post any jobs & projects
                            </p>

                            @auth
                            @else
                                <div>
                                    <a href="/register"
                                        class="inline-block hover:border-2 text-white py-2 px-4 rounded-xl uppercase mt-2  hover:border-white bg-[#1C658C] mb-2 hover:bg-[#5FA5CE] hover:text-white">
                                        Join Us</a>
                                </div>
                                <div>
                                    <a href="" class="text-xl underline">Newest Jobs</a>
                                </div>
                            @endauth
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="flex justify-center mb-8 mt-6">
            <div class="flex flex-col  md:flex-row md:max-w-4xl  bg-white shadow-lg">

                <img class=" w-full h-96 md:h-auto object-cover md:w-96 rounded-t-lg md:rounded-none "
                    src="{{ asset('images/aboutus1.jpg') }}" alt="about us 1" />

                <div class="p-6 flex flex-col justify-start">
                    <h5 class="text-gray-900 text-xl font-medium mb-2">Card title</h5>
                    <p class="text-gray-700 text-base mb-4">
                        This is a wider card with supporting text below as a natural lead-in to additional content. This
                        content is a little bit longer.
                    </p>
                    <p class="text-gray-600 text-xs">Last updated 3 mins ago</p>
                </div>

            </div>
        </div>

        <div class="flex justify-center mb-8 mt-6">
            <div class="flex flex-col  md:flex-row md:max-w-4xl  bg-white shadow-lg">

                <div class="p-6 flex flex-col justify-start">
                    <h5 class="text-gray-900 text-xl font-medium mb-2">Card title</h5>
                    <p class="text-gray-700 text-base mb-4">
                        This is a wider card with supporting text below as a natural lead-in to additional content. This
                        content is a little bit longer.
                    </p>
                    <p class="text-gray-600 text-xs">Last updated 3 mins ago</p>
                </div>

                <img class=" w-full h-96 md:h-auto object-cover md:w-96 rounded-t-lg md:rounded-none "
                    src="{{ asset('images/aboutus2.jpg') }}" alt="about us 2" />

            </div>
        </div>

        <!-- service  -->


        <div class="my-16">
            <h1 class="flex justify-center text-2xl text-[#1C658C] font-bold my-8">Our Services</h1>
            <div class="flex  justify-center justify-around mb-6">

                <div class="p-6 block  max-w-sm text-center">
                    <img class="w-10 h-10 rounded ml-40 mb-4" src="{{ asset('images/company.png') }}"
                        alt="Default avatar">
                    <p class="text-gray-700 text-base mb-4">
                        With supporting text below as a natural lead-in to additional content.
                    </p>
                </div>

                <div class="p-6 block  max-w-sm text-center">
                    <img class="w-10 h-10 rounded ml-40 mb-4" src="{{ asset('images/location.png') }}"
                        alt="Default avatar">
                    <p class="text-gray-700 text-base mb-4">
                        With supporting text below as a natural lead-in to additional content.
                    </p>
                </div>

                <div class="p-6 block  max-w-sm text-center">
                    <img class="w-10 h-10 rounded ml-40 mb-4" src="{{ asset('images/job.png') }}" alt="Default avatar">
                    <p class="text-gray-700 text-base mb-4">
                        With supporting text below as a natural lead-in to additional content.
                    </p>
                </div>

            </div>



            <!-- reklam -->

            <div class=" mb-8 mt-10 ">
                <div class="flex flex-col  md:flex-row md:max-w-full  bg-white shadow-lg">


                    <div class="p-6 flex flex-col justify-start">
                        <h5 class="text-gray-900 text-xl font-medium mb-2">Card title</h5>
                        <p class="text-gray-700 text-base mb-4">
                            This is a wider card with supporting text below as a natural lead-in to additional content.
                            This content is a little bit longer.
                        </p>
                        <p class="text-gray-600 text-xs">Last updated 3 mins ago</p>
                    </div>
                    <!-- slide show -->
                    <img class=" w-full h-96 md:h-auto object-cover md:w-1/2 rounded-t-lg md:rounded-none "
                        src="{{ asset('images/rek.png') }}" alt="about us 2" />



                </div>
            </div>


        </div>

        <!-- new job -->


        <h1 class="flex justify-center text-2xl text-[#1C658C] font-bold my-4">Newest Job</h1>

        <div class="lg:grid lg:grid-cols gap-4 space-y-4 md:space-y-0 mx-4 flex flex-col justify-center items-center">

            @unless(count($jobs) == 0)
                @foreach ($jobs as $job)
                    <x-job-card :job="$job" />
                @endforeach
            @else
                <p>
                    No jobs found
                </p>
            @endunless

        </div>

        {{-- Paginate Links --}}
        <div class="mt-6 p-4">
            {{ $jobs->links() }}
        </div>

    </section>

</x-layout>
