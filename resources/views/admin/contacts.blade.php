@extends('layouts.adminmaster')
@section('title', 'فرم های تماس با ما')

@section('MyContentArea')
<style>
    #messageModal:not(.hidden) {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<main class="flex-1 p-6">
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-bold">پیام‌های فرم تماس</h2>
            <form method="GET" action="{{ route('manage.contacts.index') }}">
                <div class="relative">
                    <input name="search" value="{{ request('search') }}" type="text" placeholder="جستجو..."
                        class="border border-gray-300 rounded-lg pr-10 pl-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                    <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-center">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">نام</th>
                        <th class="px-6 py-3">ایمیل</th>
                        <th class="px-6 py-3">موضوع</th>
                        <th class="px-6 py-3">پیام</th>
                        <th class="px-6 py-3">تاریخ ارسال</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($contacts as $contact)
                        <tr>
                            <td class="px-6 py-4">{{ $contact->id }}</td>
                            <td class="px-6 py-4">{{ $contact->name }}</td>
                            <td class="px-6 py-4">{{ $contact->email }}</td>
                            <td class="px-6 py-4">{{ $contact->subject ?? '---' }}</td>
                            <td class="px-6 py-4 text-left">
                                @if(strlen($contact->message) > 50)
                                    {{ substr($contact->message,0,50) }}...
                                    <button class="text-blue-600 hover:underline" onclick="openMessageModal(`{{ addslashes($contact->message) }}`)">
                                        مشاهده کامل
                                    </button>
                                @else
                                    {{ $contact->message }}
                                @endif
                            </td>
                            <td class="px-6 py-4">{{ $contact->created_at->format('Y/m/d H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex justify-center">
            {{ $contacts->appends(request()->query())->links('pagination::tailwind') }}
        </div>
    </div>
</main>

{{-- Message Modal --}}
<div id="messageModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 max-h-[80vh] overflow-y-auto">
        <h3 class="text-lg font-bold mb-4">پیام کامل</h3>
        <p id="fullMessage" class="text-sm text-gray-700 mb-4 whitespace-pre-wrap break-words"></p>
        <div class="flex justify-end">
            <button onclick="closeMessageModal()" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">بستن</button>
        </div>
    </div>
</div>


<script>
    function openMessageModal(message) {
        document.getElementById('fullMessage').textContent = message;
        document.getElementById('messageModal').classList.remove('hidden');
    }

    function closeMessageModal() {
        document.getElementById('messageModal').classList.add('hidden');
    }

    window.addEventListener('click', (e) => {
        if(e.target.id === 'messageModal') {
            closeMessageModal();
        }
    });
</script>
@endsection
