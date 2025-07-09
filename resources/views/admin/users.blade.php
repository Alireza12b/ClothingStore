@extends('layouts.adminmaster')
@section('title', 'مدیریت کاربران')
@section('MyContentArea')

    <style>
        #editModal:not(.hidden),
        #deleteModal:not(.hidden) {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <main class="flex-1 p-6">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg font-bold">لیست کاربران</h2>
                <form method="GET" action="{{ route('manage.users') }}">
                    <div class="relative">
                        <input name="search" value="{{ request('search') }}" type="text" placeholder="جستجوی کاربر..."
                            class="border border-gray-300 rounded-lg pr-10 pl-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                        <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200" id="usersTable">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">شناسه</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">نام</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">ایمیل</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">نقش</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">عملیات</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $index => $user)
                            <tr class="user-row">
                                <td class="px-6 py-4 text-sm">{{ $user->id }}</td>
                                <td class="px-6 py-4 text-sm name">{{ $user->name }}</td>
                                <td class="px-6 py-4 text-sm email">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-sm">{{ $user->role === 'admin' ? 'مدیر' : 'کاربر' }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <button
                                        onclick="openEditModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}')"
                                        class="text-indigo-600 hover:text-indigo-900">ویرایش</button>
                                    <button onclick="openDeleteModal({{ $user->id }})"
                                        class="text-red-600 hover:text-red-900 mr-4">حذف</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-between items-center mt-6">
                <div class="text-sm text-gray-500">
                    نمایش {{ $users->firstItem() }} تا {{ $users->lastItem() }} از {{ $users->total() }} مورد
                </div>
                <div>
                    {{ $users->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </main>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
            <h3 class="text-lg font-bold mb-4">ویرایش کاربر</h3>
            <form method="POST" id="editForm" action="">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="editId">
                <div class="mb-4">
                    <label for="editName" class="block text-sm font-medium">نام</label>
                    <input type="text" name="name" id="editName" value="{{ old('name') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="editEmail" class="block text-sm font-medium">ایمیل</label>
                    <input type="email" name="email" id="editEmail" value="{{ old('email') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="editRole" class="block text-sm font-medium">نقش</label>
                    <select name="role" id="editRole" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>مدیر</option>
                        <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }}>کاربر</option>
                    </select>
                    @error('role')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end space-x-2 space-x-reverse">
                    <button type="button" onclick="closeEditModal()"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">انصراف</button>
                    <button type="submit"
                        class="px-4 py-2 bg-primary-500 text-white rounded-lg hover:bg-primary-600">ذخیره</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 text-center">
            <h3 class="text-lg font-bold mb-2">حذف کاربر</h3>
            <p class="text-sm text-gray-600 mb-4">آیا از حذف این کاربر اطمینان دارید؟</p>
            <form method="POST" id="deleteForm" action="">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" id="deleteId">
                <div class="flex justify-center space-x-2 space-x-reverse">
                    <button type="button" onclick="closeDeleteModal()"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">انصراف</button>
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">حذف</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Search filter
        document.querySelector('input[name="search"]').addEventListener('keyup', function() {
            const search = this.value.toLowerCase();
            document.querySelectorAll('.user-row').forEach(row => {
                const name = row.querySelector('.name').textContent.toLowerCase();
                const email = row.querySelector('.email').textContent.toLowerCase();
                row.style.display = (name.includes(search) || email.includes(search)) ? '' : 'none';
            });
        });

        // Edit modal
        function openEditModal(userId, name, email, role) {
            document.getElementById('editForm').action = `/manage/users/${userId}`;
            document.getElementById('editId').value = userId;
            document.getElementById('editName').value = name;
            document.getElementById('editEmail').value = email;
            document.getElementById('editRole').value = role;
            document.getElementById('editModal').classList.remove('hidden');
        }

        // Delete modal
        function openDeleteModal(userId) {
            document.getElementById('deleteForm').action = `/manage/users/${userId}`;
            document.getElementById('deleteId').value = userId;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        // Close modals
        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        // Close modals when clicking outside
        window.addEventListener('click', (e) => {
            if (e.target.id === 'editModal' || e.target.id === 'deleteModal') {
                closeEditModal();
                closeDeleteModal();
            }
        });
    </script>

@endsection
