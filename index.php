<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Lapangan Badminton - Semarang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out;
        }

        .animate-slideInLeft {
            animation: slideInLeft 0.8s ease-out;
        }

        .animate-slideInRight {
            animation: slideInRight 0.8s ease-out;
        }

        .animate-bounce-slow {
            animation: bounce 2s infinite;
        }

        .animate-pulse-slow {
            animation: pulse 2s infinite;
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-300 {
            animation-delay: 0.3s;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-gray-50">
    
    <!-- Header -->
    <header class="gradient-bg text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3 animate-slideInLeft">
                    <i class="fas fa-shuttle-space text-4xl animate-bounce-slow"></i>
                    <div>
                        <h1 class="text-2xl font-bold">Badminton Arena</h1>
                        <p class="text-sm text-gray-200">Semarang Premier Courts</p>
                    </div>
                </div>
                <nav class="hidden md:flex space-x-6 animate-slideInRight">
                    <a href="#home" class="hover:text-gray-200 transition">Home</a>
                    <a href="#lapangan" class="hover:text-gray-200 transition">Lapangan</a>
                    <a href="#lokasi" class="hover:text-gray-200 transition">Lokasi</a>
                    <a href="#kontak" class="hover:text-gray-200 transition">Kontak</a>
                </nav>
                <button class="md:hidden">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="gradient-bg text-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-5xl md:text-6xl font-bold mb-6 animate-fadeInUp">
                    Selamat Datang! 🏸
                </h2>
                <p class="text-xl md:text-2xl mb-8 animate-fadeInUp delay-100 text-gray-100">
                    Nikmati pengalaman bermain badminton terbaik di lapangan standar internasional
                </p>
                <div class="flex flex-wrap justify-center gap-4 animate-fadeInUp delay-200">
                    <a href="#lapangan" class="bg-white text-purple-700 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition shadow-lg">
                        Booking Sekarang
                    </a>
                    <a href="#lokasi" class="bg-transparent border-2 border-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-purple-700 transition">
                        Lihat Lokasi
                    </a>
                </div>
            </div>
        </div>
        <div class="text-center mt-10 animate-bounce-slow">
            <i class="fas fa-chevron-down text-3xl"></i>
        </div>
    </section>

    <!-- Lapangan Section -->
    <section id="lapangan" class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 animate-fadeInUp">
                <h2 class="text-4xl font-bold mb-4 gradient-text">Pilihan Lapangan Kami</h2>
                <p class="text-gray-600 text-lg">Tersedia lapangan standar dan VIP dengan fasilitas terbaik</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Lapangan Standar 1 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover animate-fadeInUp">
                    <div class="relative h-64 bg-gradient-to-br from-blue-400 to-blue-600">
                        <img src="https://images.unsplash.com/photo-1626224583764-f87db24ac4ea?w=500&h=300&fit=crop" 
                             alt="Lapangan Standar" 
                             class="w-full h-full object-cover opacity-80">
                        <div class="absolute top-4 right-4 bg-blue-500 text-white px-4 py-2 rounded-full font-semibold">
                            Standar
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2 text-gray-800">Lapangan A</h3>
                        <p class="text-gray-600 mb-4">Lapangan standar dengan lantai vinyl berkualitas dan pencahayaan optimal</p>
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <p class="text-3xl font-bold text-blue-600">Rp 30.000</p>
                                <p class="text-sm text-gray-500">per jam</p>
                            </div>
                            <div class="text-right">
                                <div class="flex items-center text-yellow-500 mb-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <p class="text-xs text-gray-500">4.0/5.0</p>
                            </div>
                        </div>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center text-gray-600">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                Lantai Vinyl Premium
                            </li>
                            <li class="flex items-center text-gray-600">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                Pencahayaan LED
                            </li>
                            <li class="flex items-center text-gray-600">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                AC Tersedia
                            </li>
                        </ul>
                        <button class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-lg font-semibold transition">
                            Booking Sekarang
                        </button>
                    </div>
                </div>

                <!-- Lapangan VIP -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover animate-fadeInUp delay-100 border-4 border-purple-500 relative">
                    <div class="absolute top-0 left-0 right-0 bg-purple-500 text-white text-center py-2 font-bold text-sm z-10">
                        ⭐ REKOMENDASI ⭐
                    </div>
                    <div class="relative h-64 bg-gradient-to-br from-purple-400 to-purple-600 mt-8">
                        <img src="https://images.unsplash.com/photo-1553778263-73a83bab9b0c?w=500&h=300&fit=crop" 
                             alt="Lapangan VIP" 
                             class="w-full h-full object-cover opacity-80">
                        <div class="absolute top-4 right-4 bg-yellow-500 text-white px-4 py-2 rounded-full font-semibold flex items-center">
                            <i class="fas fa-crown mr-2"></i> VIP
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2 text-gray-800">Lapangan VIP</h3>
                        <p class="text-gray-600 mb-4">Lapangan premium dengan fasilitas eksklusif dan kualitas terbaik</p>
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <p class="text-3xl font-bold text-purple-600">Rp 50.000</p>
                                <p class="text-sm text-gray-500">per jam</p>
                            </div>
                            <div class="text-right">
                                <div class="flex items-center text-yellow-500 mb-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="text-xs text-gray-500">5.0/5.0</p>
                            </div>
                        </div>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center text-gray-600">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                Lantai Kayu Import
                            </li>
                            <li class="flex items-center text-gray-600">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                Pencahayaan Premium
                            </li>
                            <li class="flex items-center text-gray-600">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                AC & Sound System
                            </li>
                            <li class="flex items-center text-gray-600">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                Ruang Tunggu Private
                            </li>
                        </ul>
                        <button class="w-full bg-purple-500 hover:bg-purple-600 text-white py-3 rounded-lg font-semibold transition shadow-lg">
                            Booking Sekarang
                        </button>
                    </div>
                </div>

                <!-- Lapangan Standar 2 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover animate-fadeInUp delay-200">
                    <div class="relative h-64 bg-gradient-to-br from-green-400 to-green-600">
                        <img src="https://images.unsplash.com/photo-1612872087720-bb876e2e67d1?w=500&h=300&fit=crop" 
                             alt="Lapangan Standar" 
                             class="w-full h-full object-cover opacity-80">
                        <div class="absolute top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-full font-semibold">
                            Standar
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2 text-gray-800">Lapangan B</h3>
                        <p class="text-gray-600 mb-4">Lapangan standar dengan fasilitas lengkap untuk permainan yang nyaman</p>
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <p class="text-3xl font-bold text-green-600">Rp 30.000</p>
                                <p class="text-sm text-gray-500">per jam</p>
                            </div>
                            <div class="text-right">
                                <div class="flex items-center text-yellow-500 mb-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <p class="text-xs text-gray-500">4.0/5.0</p>
                            </div>
                        </div>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center text-gray-600">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                Lantai Vinyl Premium
                            </li>
                            <li class="flex items-center text-gray-600">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                Pencahayaan LED
                            </li>
                            <li class="flex items-center text-gray-600">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                AC Tersedia
                            </li>
                        </ul>
                        <button class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg font-semibold transition">
                            Booking Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4 gradient-text">Fasilitas Unggulan</h2>
            </div>
            <div class="grid md:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-lg text-center card-hover">
                    <i class="fas fa-parking text-4xl text-purple-600 mb-4"></i>
                    <h3 class="font-bold text-lg mb-2">Parkir Luas</h3>
                    <p class="text-gray-600 text-sm">Area parkir yang aman dan nyaman</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg text-center card-hover">
                    <i class="fas fa-shower text-4xl text-blue-600 mb-4"></i>
                    <h3 class="font-bold text-lg mb-2">Kamar Mandi</h3>
                    <p class="text-gray-600 text-sm">Kamar mandi bersih dan terawat</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg text-center card-hover">
                    <i class="fas fa-coffee text-4xl text-green-600 mb-4"></i>
                    <h3 class="font-bold text-lg mb-2">Kantin</h3>
                    <p class="text-gray-600 text-sm">Tersedia makanan dan minuman</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg text-center card-hover">
                    <i class="fas fa-wifi text-4xl text-red-600 mb-4"></i>
                    <h3 class="font-bold text-lg mb-2">WiFi Gratis</h3>
                    <p class="text-gray-600 text-sm">Internet cepat untuk semua</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Lokasi Section -->
    <section id="lokasi" class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 animate-fadeInUp">
                <h2 class="text-4xl font-bold mb-4 gradient-text">Lokasi Kami</h2>
                <p class="text-gray-600 text-lg">Temukan kami di pusat kota Semarang</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="animate-slideInLeft">
                    <div class="bg-white p-8 rounded-2xl shadow-lg">
                        <h3 class="text-2xl font-bold mb-6 text-gray-800">Alamat Lengkap</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt text-purple-600 text-2xl mr-4 mt-1"></i>
                                <div>
                                    <p class="font-semibold text-gray-800">Alamat:</p>
                                    <p class="text-gray-600">Jl. Ulin Utara 2 No. 320</p>
                                    <p class="text-gray-600">Semarang, Jawa Tengah</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-clock text-purple-600 text-2xl mr-4 mt-1"></i>
                                <div>
                                    <p class="font-semibold text-gray-800">Jam Operasional:</p>
                                    <p class="text-gray-600">Senin - Jumat: 06.00 - 23.00</p>
                                    <p class="text-gray-600">Sabtu - Minggu: 05.00 - 24.00</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-phone text-purple-600 text-2xl mr-4 mt-1"></i>
                                <div>
                                    <p class="font-semibold text-gray-800">Kontak:</p>
                                    <p class="text-gray-600">+62 812-3456-7890</p>
                                    <p class="text-gray-600">badmintonarena@email.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Ulin+Utara+2+No.+320+Semarang" 
                               target="_blank"
                               class="block w-full bg-purple-600 hover:bg-purple-700 text-white text-center py-3 rounded-lg font-semibold transition">
                                <i class="fas fa-directions mr-2"></i>
                                Dapatkan Petunjuk Arah
                            </a>
                        </div>
                    </div>
                </div>

                <div class="animate-slideInRight">
                    <div class="rounded-2xl overflow-hidden shadow-lg h-96">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2!2d110.4!3d-6.99!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNTknMjQuMCJTIDExMMKwMjQnMDAuMCJF!5e0!3m2!1sen!2sid!4v1234567890"
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="gradient-bg text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-4 animate-fadeInUp">Siap Bermain?</h2>
            <p class="text-xl mb-8 animate-fadeInUp delay-100">Booking lapangan sekarang dan nikmati pengalaman bermain terbaik!</p>
            <a href="#lapangan" class="inline-block bg-white text-purple-700 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition shadow-lg animate-fadeInUp delay-200">
                Booking Sekarang <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <i class="fas fa-shuttle-space text-3xl text-purple-500"></i>
                        <h3 class="text-xl font-bold">Badminton Arena</h3>
                    </div>
                    <p class="text-gray-400">Lapangan badminton terbaik di Semarang dengan fasilitas modern dan harga terjangkau.</p>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Menu</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#home" class="hover:text-white transition">Home</a></li>
                        <li><a href="#lapangan" class="hover:text-white transition">Lapangan</a></li>
                        <li><a href="#lokasi" class="hover:text-white transition">Lokasi</a></li>
                        <li><a href="#kontak" class="hover:text-white transition">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Kontak</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><i class="fas fa-phone mr-2"></i>+62 812-3456-7890</li>
                        <li><i class="fas fa-envelope mr-2"></i>badmintonarena@email.com</li>
                        <li><i class="fas fa-map-marker-alt mr-2"></i>Semarang, Jawa Tengah</li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Ikuti Kami</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-purple-600 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-purple-600 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-purple-600 transition">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 Badminton Arena Semarang. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scroll to top button -->
    <button id="scrollTop" class="fixed bottom-8 right-8 bg-purple-600 text-white w-12 h-12 rounded-full shadow-lg hover:bg-purple-700 transition opacity-0 pointer-events-none">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Scroll to top button
        const scrollTopBtn = document.getElementById('scrollTop');
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollTopBtn.style.opacity = '1';
                scrollTopBtn.style.pointerEvents = 'all';
            } else {
                scrollTopBtn.style.opacity = '0';
                scrollTopBtn.style.pointerEvents = 'none';
            }
        });

        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.card-hover').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'all 0.6s ease-out';
            observer.observe(el);
        });
    </script>
</body>
</html>