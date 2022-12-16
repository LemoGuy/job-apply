<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Requests
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <thead>
                <th>Name</th>
                <th>Applicant</th>
                <th>Company Name</th>
                <th>CV</th>
                <th>Status</th>
                <th></th>



            </thead>

            <tbody>

                @unless($requests->isEmpty())
                    @foreach ($requests as $request)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="{{ route('job.show', $request->job->id) }}">
                                    {{ $request->job->title }}
                                </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="{{ route('user.show', $request->user->id) }}">
                                    {{ $request->user->name }}
                                </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="{{ route('user.show', $request->company->id) }}">
                                    {{ $request->company->name }}
                                </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="{{ asset('storage/' . $request->cv_path) }}" target="_blank">
                                    CV
                                </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <p target="_blank">
                                    {{ $request->status }}
                                </p>
                            </td>
                            @if (auth()->user()->account_type == 'user')
                                @if ($request->status == 'Pending')
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                        <form method="POST" action="{{ route('my-request.destroy', $request->id) }}">

                                            @csrf
                                            @method('DELETE')

                                            <button class="text-sky-500"><i class="fa-solid fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                @endif
                            @else
                                @if ($request->status == 'Pending' || $request->status == 'Rejected')
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                        <form method="POST" action="{{ route('my-request.update', $request->id) }}">
                                            <input type="hidden" name="status" value="Confirmed">
                                            @csrf
                                            @method('PUT')

                                            <button class="text-sky-500"><i class="fa-solid fa-check"></i> Confirm</button>

                                        </form>
                                    </td>
                                @endif

                                @if ($request->status == 'Pending' || $request->status == 'Confirmed')
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                        <form method="POST" action="{{ route('my-request.update', $request->id) }}">
                                            <input type="hidden" name="status" value="Rejected">
                                            @csrf
                                            @method('PUT')

                                            <button class="text-red-500"><i class="fa-solid fa-times"></i>
                                                Reject</button>
                                        </form>
                                    </td>
                                @endif
                            @endif

                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b bordet-gray-300 text-lg">
                            <p class="text-center">No Jobs Found</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>
