<x-layout>
    @include('partials._hero')
    @include('partials._search')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        {{-- 
<h1>{{ $heading }}</h1> --}}

        {{-- useful for filtering and testings --}}
        {{-- @php
$test = 1;
@endphp
{{$test}} --}}

        {{-- conditionals --}}

        {{-- @if (count($jobs) == 0)
    <p>
        No jobs found
    </p>
@endif --}}

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

    {{-- <a href="/table">
    Table
 </a> --}}


    <div class="mt-6 p-4">
        {{ $jobs->links() }}
    </div>

</x-layout>
