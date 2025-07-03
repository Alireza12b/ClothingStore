@extends('layouts.master')

@section('MyContentArea')
    <div class="container mx-auto px-4 py-10">
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Image Slider -->
            <div>
                <div class="relative w-full overflow-hidden rounded-lg">
                    <img id="mainImage" src="{{ asset('assets/img/' . ($product->image ?? 'default.jpg')) }}"
                        class="w-full h-auto rounded-lg" alt="{{ $product->name }}">
                </div>
            </div>

            <!-- Product Details -->
            <div class="text-right">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $product->name }}</h2>
                <p class="text-gray-600 mb-4">{{ $product->description }}</p>

                @php
                    $minPrice = $product->variants->min('price');
                @endphp

                <p class="text-xl font-semibold text-blue-600 mb-4">
                    از {{ number_format($minPrice) }} تومان
                </p>

                <!-- Color Dropdown -->
                <div class="mb-4 relative">
                    <label class="block mb-2 font-medium text-gray-700">انتخاب رنگ:</label>
                    <button id="colorDropdownButton"
                        class="w-full border rounded-lg px-4 py-2 bg-white flex justify-between items-center">
                        <span id="selectedColorName" class="flex items-center gap-2">
                            <span id="selectedColorBox" class="w-4 h-4 inline-block rounded border hidden"></span>
                            <span>انتخاب رنگ</span>
                        </span>
                        <i class="fas fa-chevron-down text-gray-500"></i>
                    </button>

                    <!-- Dropdown list -->
                    <div id="colorDropdownMenu"
                        class="absolute z-10 w-full mt-2 bg-white border rounded-lg shadow-lg hidden max-h-64 overflow-y-auto">
                        @foreach ($product->variants->pluck('color')->unique('id') as $color)
                            <div class="px-4 py-2 hover:bg-gray-100 cursor-pointer flex items-center gap-2"
                                onclick="selectColor({{ $color->id }}, '{{ $color->name }}', '{{ $color->hex_code }}')">
                                <span class="w-4 h-4 rounded border"
                                    style="background-color: #{{ $color->hex_code }}"></span>
                                <span>{{ $color->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>


                <input type="hidden" name="color_id" id="selectedColorId">


                <!-- Size Dropdown -->
                <div class="mb-6">
                    <label for="size" class="block mb-2 font-medium text-gray-700">انتخاب سایز:</label>
                    <select id="sizeSelector"
                        class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">ابتدا رنگ را انتخاب کنید</option>
                    </select>
                </div>


                <!-- Add to Cart -->
                <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">
                    افزودن به سبد خرید
                </button>
            </div>
        </div>
    </div>
@endsection

@push('ShowProductScripts')
    <script>
        const variants = @json($product->variants);

        const colorDropdownButton = document.getElementById('colorDropdownButton');
        const colorDropdownMenu = document.getElementById('colorDropdownMenu');
        const selectedColorBox = document.getElementById('selectedColorBox');
        const selectedColorName = document.getElementById('selectedColorName').querySelector('span:last-child');
        const selectedColorIdInput = document.getElementById('selectedColorId');
        const sizeSelector = document.getElementById('sizeSelector');

        colorDropdownButton.addEventListener('click', () => {
            colorDropdownMenu.classList.toggle('hidden');
        });

        window.addEventListener('click', function(e) {
            if (!colorDropdownButton.contains(e.target)) {
                colorDropdownMenu.classList.add('hidden');
            }
        });

        function selectColor(id, name, hex) {
            selectedColorBox.style.backgroundColor = '#' + hex;
            selectedColorBox.classList.remove('hidden');
            selectedColorName.textContent = name;
            selectedColorIdInput.value = id;
            colorDropdownMenu.classList.add('hidden');
            updateSizesForColor(id);
        }

        function updateSizesForColor(colorId) {
            const sizes = variants
                .filter(v => v.color_id == colorId)
                .map(v => ({
                    id: v.size.id,
                    name: v.size.name
                }));

            const uniqueSizes = sizes.filter(
                (v, i, self) => i === self.findIndex(s => s.id === v.id)
            );

            sizeSelector.innerHTML = '';

            if (uniqueSizes.length === 0) {
                sizeSelector.innerHTML = '<option value="">موجود نیست</option>';
            } else {
                uniqueSizes.forEach(size => {
                    const opt = document.createElement('option');
                    opt.value = size.id;
                    opt.textContent = size.name;
                    sizeSelector.appendChild(opt);
                });
            }
        }
    </script>
@endpush
