<x-layout>
    @include('partials._search')


    <a href="{{ url()->previous() }}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6"
                    src="{{ $job->logo ? asset('storage/' . $job->logo) : asset('/images/no-image.png') }}"
                    alt="" />

                <h3 class="text-2xl mb-2">{{ $job->title }}</h3>
                <div class="text-xl font-bold mb-4">{{ $job->company }}</div>

                <x-job-tags :tagsCsv="$job->tags" />

                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $job->location }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>

                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        {{ $job->description }}

                        <div>




                        </div>
                        <a href="mailto:{{ $job->email }}"
                            class="block bg-teal-800 text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                                class="fa-solid fa-envelope"></i>
                            Contact Employer</a>

                        <div hidden>
                            {{ $newvariable = "https://$job->website" }}
                        </div>
                        <a href="{{ $newvariable }}" target="_blank"
                            class="block bg-teal-900 text-white py-2 rounded-xl hover:opacity-80"><i
                                class="fa-solid fa-globe"></i> Visit
                            Website</a>


                        {{-- @if (!auth()->user()->is_admin) --}}
                        @if ($job->requests_count == 0)
                            <a class="block bg-sky-900 text-white mt-6 py-2 rounded-xl hover:opacity-80 cursor-pointer"
                                type="button" onclick="toggleModal('modal-id')"><i class="fa-solid fa-upload"></i>
                                Apply for job
                            </a>
                        @else
                            <a disabled
                                class="block bg-blue-900 text-white mt-6 py-2 rounded-xl hover:opacity-80 cursor-pointer"
                                type="button">
                                Already applied!
                            </a>
                        @endif
                        {{-- @endif --}}



                        <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
                            id="modal-id">
                            <div class="relative w-auto my-6 mx-auto max-w-3xl">

                                <form method="POST" action="{{ route('my-request.store', ['job' => $job->id]) }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <!--content-->
                                    <div
                                        class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                        <!--header-->
                                        <div
                                            class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                                            <h3 class="text-3xl font-semibold">
                                                {{ $job->title }}
                                            </h3>
                                            <button
                                                class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                                                onclick="toggleModal('modal-id')">
                                                <span
                                                    class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                                    ×
                                                </span>
                                            </button>
                                        </div>
                                        <!--body-->
                                        <div class="relative p-6 flex-auto">

                                            <div class="mb-6">
                                                <label for="cv" class="inline-block text-lg mb-2">
                                                    Please upload your CV.
                                                </label>
                                                <input type="file" class="border border-gray-200 rounded p-2 w-full"
                                                    name="cv" />

                                                @error('cv')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>
                                        </div>
                                        <!--footer-->
                                        <div
                                            class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                                            <button
                                                class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                type="button" onclick="toggleModal('modal-id')">
                                                Close
                                            </button>
                                            <button
                                                class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                type="submit" onclick="toggleModal('modal-id')">
                                                Send
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>


                    </div>
                </div>
            </div>
        </x-card>

        @auth
            @if ($job->user_id == auth()->id())
                <x-card class="mt-4 p-2 flex space-x-6">
                    <a href="{{ route('my-job.edit', $job->id) }}">
                        <i class="fa-solid fa-pencil"></i> Edit
                    </a>

                    <form method="POST" action="{{ route('my-job.destroy', $job->id) }}">

                        @csrf
                        @method('DELETE')

                        <button class="text-sky-500"><i class="fa-solid fa-trash"></i> Delete</button>


                    </form>
                </x-card>
            @endif
        @endauth

    </div>

    <script type="text/javascript">
        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }
    </script>
</x-layout>
