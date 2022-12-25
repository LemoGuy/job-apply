<x-layout>
    <a href="{{ url()->previous() }}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <x-card class=" p-10 rounded max-w-lg mx-auto mt-24 mb-10">


        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit Job
            </h2>
            <p class="mb-4">Edit: {{ $job->title }}</p>
        </header>

        {{-- check if the current user is admin or company --}}
        <div hidden>
            @if (auth()->user()->account_type == 'company')
                {{ $route = route('my-job.update', $job->id) }}
            @elseif (auth()->user()->is_admin)
                {{ $route = route('job.update', $job->id) }}
            @endif
        </div>


        <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Job Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                    value="{{ $job->title }}" />

                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Job Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                    value="{{ $job->location }}" />

                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label for="duration" class="inline-block text-lg mb-2 ">Job Duration
                </label>
                <input type="number" min="0" max="365" class="border border-gray-200 rounded w-25 p-2"
                    name="duration" value="{{ $job->duration }}" /> days

                @error('duration')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>



            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ $job->email }}" />

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">
                    Website/Application URL
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
                    value="{{ $job->website }}" />

                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                    value="{{ $job->tags }}" />

                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo"
                    value="{{ $job->logo }}" />

                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Job Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10">
                
                    {{ $job->description }}
                
                </textarea>

                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-[#1C658C] text-white rounded py-2 px-4 hover:bg-[#5FA5CE]">
                    Update Job
                </button>

                <a href="/" class="text-[#1C658C] pl-60 ml-4"> Back </a>
            </div>
        </form>
    </x-card>
    </x-laout>
