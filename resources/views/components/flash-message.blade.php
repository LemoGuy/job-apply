@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-sky-600 text-white px-48 py-3">
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif

@foreach ($errors->all() as $error)
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-red-600 text-white px-48 py-3">
        <p>
            {{ $error }}
        </p>
    </div>
@endforeach
