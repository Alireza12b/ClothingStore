@extends('layouts.master')
@section('title', $product->name)
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
                <h3 class="text-l font-bold text-gray-700 mb-4">{{ $product->category->name }}</h3>
                <p class="text-gray-600 mb-4">{{ $product->description }}</p>

                @php
                    $minPrice = $product->variants->min('price');
                @endphp

                <p id="variantPrice" class="text-xl font-semibold text-blue-600 mb-4 hidden">
                    قیمت: <span id="priceValue"></span> تومان
                </p>
                <p id="variantQuantity" class="text-l font-semibold text-blue-600 mb-4 hidden">
                    تعداد: <span id="quantityValue"></span>
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
                <div class="mb-6 relative">
                    <label class="block mb-2 font-medium text-gray-700">انتخاب سایز:</label>
                    <button id="sizeDropdownButton"
                        class="w-full border rounded-lg px-4 py-2 bg-white flex justify-between items-center">
                        <span id="selectedSizeName">سایز را انتخاب کنید</span>
                        <i class="fas fa-chevron-down text-gray-500"></i>
                    </button>

                    <div id="sizeDropdownMenu"
                        class="absolute z-10 w-full mt-2 bg-white border rounded-lg shadow-lg hidden max-h-64 overflow-y-auto text-right">
                        <!-- Filled by JS -->
                    </div>
                </div>
                <input type="hidden" name="size_id" id="selectedSizeId">



                <!-- Add to Cart -->
                <div class="mb-6">
                    <label for="quantity" class="block mb-2 font-medium text-gray-700">تعداد:</label>
                    <input id="quantityInput" name="quantity" type="number"
                        class="readonly w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        min="1" value="1" onkeydown="return false" disabled>
                </div>
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

        const sizeDropdownButton = document.getElementById('sizeDropdownButton');
        const sizeDropdownMenu = document.getElementById('sizeDropdownMenu');
        const selectedSizeName = document.getElementById('selectedSizeName');
        const selectedSizeIdInput = document.getElementById('selectedSizeId');

        const quantityInput = document.getElementById('quantityInput');
        const variantPrice = document.getElementById('variantPrice');
        const variantQuantity = document.getElementById('variantQuantity');
        const priceValue = document.getElementById('priceValue');
        const quantityValue = document.getElementById('quantityValue');

        let selectedColorId = null;

        colorDropdownButton.addEventListener('click', () => {
            colorDropdownMenu.classList.toggle('hidden');
        });

        sizeDropdownButton.addEventListener('click', () => {
            sizeDropdownMenu.classList.toggle('hidden');
        });

        window.addEventListener('click', function(e) {
            if (!colorDropdownButton.contains(e.target)) {
                colorDropdownMenu.classList.add('hidden');
            }
            if (!sizeDropdownButton.contains(e.target)) {
                sizeDropdownMenu.classList.add('hidden');
            }
        });

        function selectColor(id, name, hex) {
            selectedColorId = id;
            selectedColorBox.style.backgroundColor = '#' + hex;
            selectedColorBox.classList.remove('hidden');
            selectedColorName.textContent = name;
            selectedColorIdInput.value = id;
            colorDropdownMenu.classList.add('hidden');

            const sizes = updateSizesForColor(id);

            if (sizes.length > 0) {
                setTimeout(() => {
                    selectSize(sizes[0].id, sizes[0].name);
                }, 0);
            }

            quantityInput.value = 1;
            quantityInput.disabled = true;
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

            sizeDropdownMenu.innerHTML = '';

            if (uniqueSizes.length === 0) {
                selectedSizeName.textContent = 'موجود نیست';
                selectedSizeIdInput.value = '';
                return [];
            }

            uniqueSizes.forEach(size => {
                const div = document.createElement('div');
                div.className = 'px-4 py-2 hover:bg-gray-100 cursor-pointer';
                div.textContent = size.name;
                div.onclick = () => selectSize(size.id, size.name);
                sizeDropdownMenu.appendChild(div);
            });

            return uniqueSizes;
        }


        function selectSize(sizeId, sizeName) {
            selectedSizeName.textContent = sizeName;
            selectedSizeIdInput.value = sizeId;
            sizeDropdownMenu.classList.add('hidden');

            const selectedVariant = variants.find(v =>
                v.color_id == selectedColorId && v.size.id == sizeId
            );

            if (selectedVariant) {
                priceValue.textContent = selectedVariant.price.toLocaleString();
                variantPrice.classList.remove('hidden');
                quantityValue.textContent = selectedVariant.quantity.toLocaleString();
                variantQuantity.classList.remove('hidden');

                quantityInput.max = selectedVariant.quantity;
                quantityInput.disabled = false;
                if (parseInt(quantityInput.value) > selectedVariant.quantity) {
                    quantityInput.value = selectedVariant.quantity;
                }
            } else {
                variantPrice.classList.add('hidden');
                variantQuantity.classList.add('hidden')
                quantityInput.disabled = true;
            }
        }
    </script>
@endpush
