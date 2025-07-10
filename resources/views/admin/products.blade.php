@extends('layouts.adminmaster')
@section('title', 'مدیریت محصولات')
@section('MyContentArea')

    <style>
        #editProductModal:not(.hidden),
        #deleteProductModal:not(.hidden) {
            display: flex;
            align-items: center;
            justify-content: center
        }
    </style>

    <main class="flex-1 p-6">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg font-bold">لیست محصولات</h2>
                <form method="GET" action="{{ route('manage.products.index') }}">
                    <div class="relative">
                        <input name="search" value="{{ request('search') }}" type="text" placeholder="جستجوی محصول..."
                            class="border border-gray-300 rounded-lg pr-10 pl-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                        <i class="fas fa-search absolute right-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3">کد</th>
                            <th class="px-4 py-3">نام</th>
                            <th class="px-4 py-3">دسته</th>
                            <th class="px-4 py-3">تعداد واریانت</th>
                            <th class="px-4 py-3">عملیات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y text-center divide-gray-200">
                        @foreach ($products as $product)
                            <tr>
                                <td class="px-4 py-3">{{ $product->id }}</td>
                                <td class="px-4 py-3">{{ $product->name }}</td>
                                <td class="px-4 py-3">{{ $product->category->name ?? '---' }}</td>
                                <td class="px-4 py-3">{{ $product->variants->count() }}</td>
                                <td class="px-4 py-3 space-x-2 space-x-reverse">
                                    <button class="text-indigo-600 hover:text-indigo-800"
                                        onclick="openEdit({{ $product->id }})">ویرایش</button>
                                    <button class="text-red-600 hover:text-red-800"
                                        onclick="openDelete({{ $product->id }})">حذف</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-between items-center mt-6 text-sm text-gray-500">
                نمایش {{ $products->firstItem() }}‑{{ $products->lastItem() }} از {{ $products->total() }}
                <div>{{ $products->appends(request()->query())->links('pagination::tailwind') }}</div>
            </div>
        </div>
    </main>

    <div id="editProductModal" class="fixed inset-0 z-50 hidden bg-black/40">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl p-6 overflow-y-auto max-h-[90vh]">
            <h3 class="text-lg font-bold mb-4">ویرایش محصول</h3>
            <form id="editProductForm" method="POST">
                @csrf @method('PUT')
                <input type="hidden" name="product_id" id="editProductId">
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-1 text-sm">نام</label>
                        <input name="name" id="editName" class="w-full border rounded-lg px-3 py-2">
                    </div>
                    <div>
                        <label class="block mb-1 text-sm">دسته</label>
                        <select name="category_id" id="editCategory" class="w-full border rounded-lg px-3 py-2">
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block mb-1 text-sm">توضیحات</label>
                        <textarea name="description" id="editDesc" rows="3" class="w-full border rounded-lg px-3 py-2"></textarea>
                    </div>
                </div>

                <h4 class="font-bold mt-6 mb-2">واریانت‌ها</h4>
                <div id="variantWrapper" class="space-y-3">
                </div>
                <button type="button" onclick="addVariantRow()"
                    class="mt-2 px-3 py-1 bg-primary-100 text-primary-700 rounded">+ واریانت جدید</button>

                <div class="flex justify-end mt-6 space-x-2 space-x-reverse">
                    <button type="button" onclick="closeEdit()" class="px-4 py-2 bg-gray-100 rounded-lg">انصراف</button>
                    <button type="submit" class="px-4 py-2 bg-primary-500 text-white rounded-lg">ذخیره</button>
                </div>
            </form>
        </div>
    </div>

    <div id="deleteProductModal" class="fixed inset-0 z-50 hidden bg-black/40">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 text-center">
            <h3 class="text-lg font-bold mb-2">حذف محصول</h3>
            <p class="text-sm mb-4">آیا مطمئنید؟</p>
            <form id="deleteProductForm" method="POST">
                @csrf @method('DELETE')
                <div class="flex justify-center space-x-2 space-x-reverse">
                    <button type="button" onclick="closeDelete()" class="px-4 py-2 bg-gray-100 rounded-lg">انصراف</button>
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg">حذف</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const csrf = '{{ csrf_token() }}';

        function openEdit(id) {
            fetch(`/manage/products/${id}/json`).then(r => r.json()).then(p => {
                document.getElementById('editProductId').value = id;
                document.getElementById('editProductForm').action = `/manage/products/${id}`;
                document.getElementById('editName').value = p.name;
                document.getElementById('editDesc').value = p.description || '';
                document.getElementById('editCategory').value = p.category_id || '';
                const wrap = document.getElementById('variantWrapper');
                wrap.innerHTML = '';
                p.variants.forEach(v => wrap.appendChild(variantRow(v)));
                document.getElementById('editProductModal').classList.remove('hidden');
            });
        }

        function closeEdit() {
            document.getElementById('editProductModal').classList.add('hidden');
        }

        function openDelete(id) {
            document.getElementById('deleteProductForm').action = `/manage/products/${id}`;
            document.getElementById('deleteProductModal').classList.remove('hidden');
        }

        function closeDelete() {
            document.getElementById('deleteProductModal').classList.add('hidden');
        }

        function variantRow(v = {}) {
            const div = document.createElement('div');
            div.className = 'grid grid-cols-6 gap-2';
            div.innerHTML = `
                <input type="hidden" name="variants[id][]" value="${v.id||''}">
                <select name="variants[color_id][]" class="border rounded px-2 py-1">
                    @foreach ($colors as $c)<option value="{{ $c->id }}">{{ $c->name }}</option>@endforeach
                </select>
                <select name="variants[size_id][]" class="border rounded px-2 py-1">
                    @foreach ($sizes as $s)<option value="{{ $s->id }}">{{ $s->name }}</option>@endforeach
                </select>
                <input name="variants[price][]" type="number" class="border rounded px-2 py-1" placeholder="قیمت" value="${v.price||''}">
                <input name="variants[quantity][]" type="number" class="border rounded px-2 py-1" placeholder="موجودی" value="${v.quantity||''}">
                <button type="button" onclick="this.parentElement.remove()" class="text-red-600">حذف</button>`;

            if (v.color_id) div.querySelector('select[name=\"variants[color_id][]\"]').value = v.color_id;
            if (v.size_id) div.querySelector('select[name=\"variants[size_id][]\"]').value = v.size_id;
            return div;
        }

        function addVariantRow() {
            document.getElementById('variantWrapper').appendChild(variantRow());
        }
    </script>
@endsection
