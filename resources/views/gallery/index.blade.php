<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gallery - Food and Beverage</title>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/gallery.css">

</head>

<body>

    <nav class="navbar">
        <div class="navbar-left">
            <a href="home.html" class="back-btn">
                <img src="assets/image/back.svg" alt="Back" class="back-icon">
            </a>
        </div>
        <div class="navbar-right">
            <img src="assets/image/logo.png" alt="Cheche Catering Logo" class="navbar-logo">
        </div>
    </nav>

    <!-- Galeri -->
    <section class="gallery" id="gallery">
        <div class="gallery-header">
            <h2><span>Gallery</span> - {{ $categories->firstWhere('id', $selectedCategory)?->name ?? 'All Categories' }}</h2>
            <form method="GET" action="{{ route('gallery') }}">
                <select name="category" class="gallery-filter" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </form>
        </div>

        <div class="gallery-grid">
            @forelse($galleries as $gallery)
            <div class="gallery-item">
                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->name }}" />
            </div>
            @empty
            <p style="text-align: center;">Belum ada gambar pada kategori ini.</p>
            @endforelse
        </div>

        <footer class="gallery-footer">
            &copy; 2025, Che-Che Catering. All rights reserved
        </footer>
    </section>


    <!-- Lightbox -->
    <div class="lightbox" id="lightbox">
        <span class="close-lightbox" onclick="closeLightbox()">&times;</span>
        <img src="" alt="Preview" class="lightbox-img" id="lightbox-img">
        <div class="lightbox-nav">
            <span class="prev" onclick="prevImage()">&#10094;</span>
            <span class="next" onclick="nextImage()">&#10095;</span>
        </div>
    </div>

    <script src="gallery.js"></script>

</body>

<script>
    document.getElementById("gallerySelect").addEventListener("change", function() {
        const page = this.value;
        if (page) {
            window.location.href = page;
        }
    });
</script>

</html>