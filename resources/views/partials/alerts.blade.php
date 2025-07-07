@if (session('success') || session('error') || $errors->any())
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        x-transition
        class="fixed top-5 left-1/2 transform -translate-x-1/2 z-50 max-w-xl w-full"
    >
        <div class="rounded-lg px-6 py-4 shadow-lg text-center
            @if(session('success')) bg-green-500 text-white
            @elseif(session('error') || $errors->any()) bg-red-500 text-white
            @endif
        ">
            @if (session('success'))
                <p>{{ session('success') }}</p>
            @elseif (session('error'))
                <p>{{ session('error') }}</p>
            @elseif ($errors->any())
                <ul class="text-sm text-white list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endif