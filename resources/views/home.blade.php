<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cheche Catering</title>
    <!-- AOS Animation Library -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/home.css" />
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet" />
</head>

<body>

    <!-- Navbar -->
    <header class="navbar">
        <img src="assets/image/logo.png" alt="Logo Cheche" class="logo-navbar" />
        <nav>
            <ul>
                <li><a href="#home" class="nav-link">Home</a></li>
                <li><a href="#menu" class="nav-link">Menu</a></li>
                <li><a href="{{ route('gallery') }}" class="nav-link">Gallery</a></li>
                <li><a href="#order" class="nav-link">Order</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero -->
    <section class="hero" id="home">
        <img src="assets/image/baground1.png" alt="Enjoy the Food" class="hero-img" />
        <h1 class="hero-text" data-aos="fade-down">Enjoy The Food</h1>
    </section>

    <!-- Menu -->
    <section class="menu" id="menu">
        <h2 class="section-title" data-aos="fade-up">Menu</h2>
        <div class="menu-items">
            <a href="box.html" class="card-link">
                <div class="menu-card">
                    <img src="assets/image/box nasi.jpg" alt="Box" />
                    <p>Box</p>
                </div>
            </a>

            <a href="wp.html" class="card-link">
                <div class="menu-card">
                    <img src="assets/image/TC_09003.jpg" alt="Hampers" />
                    <p>Wedding Package</p>
                </div>
            </a>

            <a href="buffet.html" class="card-link">
                <div class="menu-card">
                    <img src="assets/image/bafet.jpg" alt="Buffet" />
                    <p>Buffet</p>
                </div>
            </a>

            <a href="tumpeng.html" class="card-link">
                <div class="menu-card">
                    <img src="assets/image/tumpngg.jpg" alt="Tumpeng" />
                    <p>Tumpeng</p>
                </div>
            </a>
        </div>
    </section>

    <!-- Gallery -->
    <section class="gallery" id="gallery">
        <h2 class="section-title" data-aos="fade-up">Gallery</h2>
        <div class="gallery-items">
            <a href="fnb.html" class="card-link">
                <div class="gallery-card">
                    <img src="assets/image/fnb.png" alt="Food and Beverage" />
                    <p>Food and Beverage</p>
                </div>
            </a>
            <a href="wd.html" class="card-link">
                <div class="gallery-card">
                    <img src="assets/image/wd.png" alt="Wedding" />
                    <p>Wedding Decoration</p>
                </div>
            </a>
            <a href="stall.html" class="card-link">
                <div class="gallery-card">
                    <img src="assets/image/stall.png" alt="Stall" />
                    <p>Stall</p>
                </div>
            </a>
        </div>
    </section>

    <!-- Order Section -->
    <section class="order" id="order">
        <h2 class="section-title" data-aos="fade-up">Order</h2>
        <div class="order-content">

            <!-- Kiri: Map + About -->
            <div class="order-left">
                <div class="map-frame">
                    <iframe
                        src="https://www.google.com/maps?q=cheche+catering&output=embed"
                        width="100%" height="100%" loading="lazy" allowfullscreen></iframe>
                </div>
                <div class="info-box about-us">
                    <h3 class="info-title">About Us</h3>
                    <p>Berdiri sejak 2006, Cheche Catering siap untuk memberikan pelayanan catering yang bermutu dengan standar cita rasa yang tinggi. Mengedepankan rasa yang berkualitas, makanan higienis, dan estetika makanan. Kami melayani acara pernikahan, khitan, ulang tahun, meeting, acara seminar, workshop dan lain lain. Kami juga melayani catering untuk anak sekolahan dan karyawan perkantoran melewati nasibox dan snackbox. Pemesanan lebih lanjut dapat menghubungi kontak yang tertera, dan media sosial kami.</p>
                </div>
            </div>

            <!-- Kanan: Info Kontak -->
            <div class="order-right">
                <div class="info-box">
                    <strong>Office:</strong><br />
                    CHECHE CATERING, Perum griya satria indah blok e 1, Karangmiri, Sumampir, Kec. Purwokerto Utara, Kabupaten Banyumas, Jawa Tengah
                </div>

                <div class="info-box">
                    <strong>Open Hours:</strong><br />
                    Setiap hari, Pukul 08.00 - 18.00 WIB
                </div>

                <div class="info-box">
                    <strong>Telephon:</strong><br />
                    +62 859 - 5677 - 7138
                </div>

                <div class="info-box">
                    <strong>Contact Us:</strong><br />
                    chechecatering@gmail.com
                </div>

                <!-- Sosial Media -->
                <div class="info-box sosmed">
                    <div class="sosmed-text">&copy; 2024 Cheche Catering. All rights reserved.</div>
                    <div class="sosmed-icons">
                        <a href="https://lynk.id/cheche_catering" target="_blank">
                            <img src="assets/image/link.svg" alt="Website" />
                        </a>
                    </div>
                </div>

            </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <img src="assets/image/logo.png" alt="Logo Footer" class="logo-footer" />
        <p>&copy; 2024 Cheche Catering. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>

    <script>
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-link');

        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                const top = window.scrollY;
                const offset = section.offsetTop - 150;
                const height = section.offsetHeight;
                const id = section.getAttribute('id');
                if (top >= offset && top < offset + height) {
                    current = id;
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active');
                }
            });
        });
    </script>

    <script>
        document.getElementById("gallerySelect").addEventListener("change", function() {
            const page = this.value;
            if (page) {
                window.location.href = page;
            }
        });
    </script>

</body>

</html>