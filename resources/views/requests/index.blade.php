<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold mb-16 uppercase">
                Manage Requests
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <thead class="text-left text-xl ">
                @if (auth()->user()->account_type == 'company')
                    <th>User Name</th>
                @elseif (auth()->user()->account_type == 'user')
                    <th>Company Name</th>
                @endif
                <th>Job Title</th>
                <th>Uploaded File</th>
                <th>Status</th>
                @if (auth()->user()->account_type == 'company')
                    <th>Action</th>
                @endif

            </thead>

            <tbody>

                @unless($requests->isEmpty())
                    @foreach ($requests as $request)
                        <tr class="border-gray-300 text-left">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-left">
                                @if (auth()->user()->account_type == 'company')
                                    <a href="{{ route('user.show', $request->user->id) }}">
                                        {{ $request->user->name }}
                                    </a>
                                @elseif (auth()->user()->account_type == 'user')
                                    <a href="{{ route('user.show', $request->company->id) }}">
                                        {{ $request->company->name }}
                                    </a>
                                @endif


                            </td>

                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-left">
                                <a href="{{ route('job.show', $request->job->id) }}">
                                    {{ $request->job->company }}
                                </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-left">
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
                            <p class="text-center">No Requests Found</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>
