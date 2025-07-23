<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paket Nasi Box</title>
    <link rel="stylesheet" href="assets/css/paketnasibox.css">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <!-- Gallery Filter -->
    <section class="gallery">
        <div class="gallery-header">
            <h2 class="gallery-title">
                <span>Our Menu</span>
                @if($selectedCategory || $selectedSubcategory)
                –
                @if($selectedCategory)
                {{ $categories->firstWhere('id', $selectedCategory)?->name }}
                @endif
                @if($selectedSubcategory)
                – {{ $subcategories->firstWhere('id', $selectedSubcategory)?->name }}
                @endif
                @endif
            </h2>
            <!-- Dropdown Kategori -->
            <select id="categorySelect" class="form-select">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>


            <!-- Dropdown Subkategori -->
            <select id="subcategorySelect" class="form-select">
                <option value="">All Subcategories</option>
                @foreach ($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}" {{ $selectedSubcategory == $subcategory->id ? 'selected' : '' }}>
                    {{ $subcategory->name }}
                </option>
                @endforeach
            </select>

        </div>
    </section>

    <!-- Content -->
    <main class="container">
        {{-- PDF Embed jika tersedia --}}
        @if ($pdfPath)
        <div class="pdf-preview my-5">
            <iframe
                src="{{ asset('storage/' . $pdfPath) }}"
                width="100%"
                height="600px"
                style="border: none;"></iframe>
        </div>
        @endif
        <div class="menu-columns">
            <!-- Menu Utama -->
            <div class="menu-left">
                @foreach ($menus as $menu)
                <div class="menu-box cursor-pointer" data-bs-toggle="modal" data-bs-target="#menuModal{{ $menu->id }}">
                    @if ($menu->image)
                    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="menu-image">
                    @endif
                    <div class="menu-content">
                        <h3 class="menu-header">{{ $menu->name }}</h3>
                        <p class="price">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>

                        @if ($menu->variants->isNotEmpty())
                        <ul>
                            @foreach ($menu->variants->take(3) as $variant)
                            <li>{{ $variant->name }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="menuModal{{ $menu->id }}" tabindex="-1" aria-labelledby="menuModalLabel{{ $menu->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content rounded-xl">
                            <div class="modal-header bg-gray-100 px-4 py-3 rounded-t-xl">
                                <h5 class="modal-title text-xl font-semibold" id="menuModalLabel{{ $menu->id }}">{{ $menu->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body space-y-4 px-4 py-3">
                                @if ($menu->image)
                                <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="w-full rounded-lg shadow">
                                @endif

                                <p class="text-gray-700">{{ $menu->description ?? 'Tidak ada deskripsi.' }}</p>

                                <div>
                                    <h6 class="text-sm font-bold text-gray-600 mb-1">Menu Subcategory ID:</h6>
                                    <p class="text-sm text-gray-800">{{ $menu->menu_subcategory_id }}</p>
                                </div>

                                <div>
                                    <h6 class="text-sm font-bold text-gray-600 mb-1">Harga:</h6>
                                    <p class="text-sm text-gray-800">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                                </div>

                                @if ($menu->variants->isNotEmpty())
                                <div>
                                    <h6 class="text-sm font-bold text-gray-600 mb-1">Variants:</h6>
                                    <ul class="list-disc pl-5 text-sm text-gray-800 space-y-1">
                                        @foreach ($menu->variants as $variant)
                                        <li>{{ $variant->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Menu Tambahan -->
            <div class="menu-right">
                @if($addon)
                <div class="menu-additional">
                    <h3 class="menu-header">{{ $addon->title }}</h3>
                    {!! $addon->description !!}
                </div>
                @endif
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('categorySelect').addEventListener('change', function() {
            const category = this.value;
            window.location.href = `{{ route('menu') }}?category=${category}`;
        });

        document.getElementById('subcategorySelect').addEventListener('change', function() {
            const category = document.getElementById('categorySelect').value;
            const subcategory = this.value;
            window.location.href = `{{ route('menu') }}?category=${category}&subcategory=${subcategory}`;
        });
    </script>


</body>

</html>