<x-layout>
    <x-card class=" p-10 rounded-2xl max-w-lg mx-auto mt-24 mb-16 ">
        <header class="text-center">


            @if (auth()->user()->is_admin)
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Create a Job
                </h2>
            @else
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Create a Job
                </h2>
                <p class="mb-4">Post a job to find an employee</p>
            @endif

        </header>

        <form method="POST" action="{{ route('my-job.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Job Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                    placeholder="Example: Web Developer" value="{{ old('title') }}" />

                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Job Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                    placeholder="Example: Remote, Erbil 32 park, etc" value="{{ old('location') }}" />

                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label for="duration" class="inline-block text-lg mb-2 ">Job Duration
                </label>
                <input type="number" min="0" max="365" class="border border-gray-200 rounded w-25 p-2"
                    name="duration" value="{{ old('duration') }}" /> days

                @error('duration')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>



            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ old('email') }}" />

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">
                    Website/Application URL
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
                    value="{{ old('website') }}" />

                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                    placeholder="Example: Full-time or Part-time,Doctor, Developer, etc" value="{{ old('tags') }}" />

                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />

                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Job Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="Include tasks, requirements, salary, etc">
                
                    {{ old('description') }}
                
                </textarea>

                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-[#1C658C] text-white rounded py-2 px-4 hover:bg-[#5FA5CE]">
                    Create Job
                </button>

                <a href="/" class="text-[#1C658C] font-semibold pl-60 ml-4"> Back </a>
            </div>
        </form>
    </x-card>
    </x-laout>
