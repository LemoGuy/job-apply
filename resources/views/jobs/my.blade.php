<x-layout>
    <div class="bg-[#DCEFFA] block p-5 rounded-lg shadow-lg bg-white  max-w-full resize-none mt-20 mb-10 mx-16">

        <a href="{{ url('/my-job') }}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i>
            Back
        </a>

        <header>
            <h1 class="text-3xl text-center font-bold mb-16 uppercase">
                Manage Jobs
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">



            <thead class="text-left text-xl text-left">
                <th>Job Title</th>
                <th>Applicants</th>
                <th>Update</th>
                <th>Action</th>

            </thead>
            <tbody>

                @unless($jobs->isEmpty())
                    @foreach ($jobs as $job)
                        <tr class="border-gray-300 text-left">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-left">
                                <a href="{{ route('my-job.show', $job->id) }}">
                                    {{ $job->title }}
                                </a>
                            </td>

                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-left">

                                {{ $job->requests_count }}
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-left">
                                <a href="{{ route('my-job.edit', $job->id) }}" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                    Edit</a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-left">
                                <form method="POST" action="{{ route('my-job.destroy', $job->id) }}">

                                    @csrf
                                    @method('DELETE')

                                    <button class="text-sky-500"><i class="fa-solid fa-trash"></i> Delete</button>


                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300 text-center">
                        <td class="px-4 py-8 border-t border-b bordet-gray-300 text-lg text-center">
                        </td>
                        <td class="px-4 py-8 border-t border-b bordet-gray-300 text-lg text-left">
                            <p class="text-left">No Jobs Found</p>
                        </td>
                        <td class="px-4 py-8 border-t border-b bordet-gray-300 text-lg text-center">
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </div>
</x-layout>
