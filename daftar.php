<?php
session_start();

// Jika sudah login, redirect ke dashboard
if(isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// Proses registrasi
if(isset($_POST['daftar'])) {
    // Koneksi database (sesuaikan dengan konfigurasi Anda)
    $host = 'localhost';
    $dbname = 'badminton_booking';
    $username = 'root';
    $password = '';
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        // Cek apakah email sudah terdaftar
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        if($stmt->rowCount() > 0) {
            $error = "Email sudah terdaftar!";
        } else {
            // Insert user baru
            $stmt = $conn->prepare("INSERT INTO users (nama, email, telepon, password, created_at) VALUES (:nama, :email, :telepon, :password, NOW())");
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telepon', $telepon);
            $stmt->bindParam(':password', $pass);
            
            if($stmt->execute()) {
                $success = "Registrasi berhasil! Silakan login.";
                header('refresh:2;url=login.php');
            } else {
                $error = "Registrasi gagal!";
            }
        }
    } catch(PDOException $e) {
        $error = "Koneksi database gagal: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Badminton Arena</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
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

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.8s ease-out;
        }

        .animate-slideInLeft {
            animation: slideInLeft 0.8s ease-out;
        }

        .animate-slideInRight {
            animation: slideInRight 0.8s ease-out;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
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

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .input-focus:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .password-strength {
            height: 4px;
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-4">
    
    <!-- Background Decoration -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-purple-300 rounded-full opacity-20 animate-float"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-blue-300 rounded-full opacity-20 animate-float" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 w-60 h-60 bg-pink-300 rounded-full opacity-20 animate-float" style="animation-delay: 2s;"></div>
    </div>

    <div class="w-full max-w-6xl mx-auto relative z-10">
        <div class="grid md:grid-cols-2 gap-8 items-center">
            
            <!-- Left Side - Registration Form -->
            <div class="animate-slideInLeft order-2 md:order-1">
                <div class="glass-effect rounded-2xl shadow-2xl p-8 md:p-12">
                    
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <div class="md:hidden mb-4">
                            <i class="fas fa-shuttle-space text-6xl gradient-text"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Daftar Akun Baru 🎉</h2>
                        <p class="text-gray-600">Bergabung dan mulai booking lapangan!</p>
                    </div>

                    <!-- Success Message -->
                    <?php if(isset($success)): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 animate-fadeIn">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-2"></i>
                            <span><?php echo $success; ?></span>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Error Message -->
                    <?php if(isset($error)): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 animate-fadeIn">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span><?php echo $error; ?></span>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Registration Form -->
                    <form method="POST" action="" class="space-y-5" id="registerForm">
                        
                        <!-- Nama Input -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-user mr-2 text-purple-600"></i>Nama Lengkap
                            </label>
                            <input 
                                type="text" 
                                name="nama" 
                                required
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none input-focus transition"
                                placeholder="Nama lengkap Anda"
                            >
                        </div>

                        <!-- Email Input -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-envelope mr-2 text-purple-600"></i>Email
                            </label>
                            <input 
                                type="email" 
                                name="email" 
                                required
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none input-focus transition"
                                placeholder="nama@email.com"
                            >
                        </div>

                        <!-- Telepon Input -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-phone mr-2 text-purple-600"></i>No. Telepon
                            </label>
                            <input 
                                type="tel" 
                                name="telepon" 
                                required
                                pattern="[0-9]{10,13}"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none input-focus transition"
                                placeholder="08123456789"
                            >
                            <p class="text-xs text-gray-500 mt-1">Contoh: 08123456789</p>
                        </div>

                        <!-- Password Input -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-lock mr-2 text-purple-600"></i>Password
                            </label>
                            <div class="relative">
                                <input 
                                    type="password" 
                                    name="password" 
                                    id="password"
                                    required
                                    minlength="6"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none input-focus transition"
                                    placeholder="Minimal 6 karakter"
                                    oninput="checkPasswordStrength()"
                                >
                                <button 
                                    type="button" 
                                    onclick="togglePassword('password')"
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-purple-600"
                                >
                                    <i class="fas fa-eye" id="toggleIcon1"></i>
                                </button>
                            </div>
                            <!-- Password Strength Indicator -->
                            <div class="mt-2">
                                <div class="password-strength bg-gray-200 rounded-full overflow-hidden">
                                    <div id="strengthBar" class="h-full bg-red-500 w-0"></div>
                                </div>
                                <p id="strengthText" class="text-xs text-gray-500 mt-1">Kekuatan password: Lemah</p>
                            </div>
                        </div>

                        <!-- Confirm Password Input -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-lock mr-2 text-purple-600"></i>Konfirmasi Password
                            </label>
                            <div class="relative">
                                <input 
                                    type="password" 
                                    name="confirm_password" 
                                    id="confirm_password"
                                    required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none input-focus transition"
                                    placeholder="Ulangi password"
                                    oninput="checkPasswordMatch()"
                                >
                                <button 
                                    type="button" 
                                    onclick="togglePassword('confirm_password')"
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-purple-600"
                                >
                                    <i class="fas fa-eye" id="toggleIcon2"></i>
                                </button>
                            </div>
                            <p id="matchText" class="text-xs mt-1 hidden"></p>
                        </div>

                        <!-- Terms & Conditions -->
                        <div class="flex items-start">
                            <input 
                                type="checkbox" 
                                name="terms" 
                                id="terms"
                                required
                                class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 mt-1"
                            >
                            <label for="terms" class="ml-2 text-sm text-gray-700">
                                Saya setuju dengan 
                                <a href="#" class="text-purple-600 hover:text-purple-700 font-semibold">Syarat & Ketentuan</a> 
                                dan 
                                <a href="#" class="text-purple-600 hover:text-purple-700 font-semibold">Kebijakan Privasi</a>
                            </label>
                        </div>

                        <!-- Register Button -->
                        <button 
                            type="submit" 
                            name="daftar"
                            class="w-full gradient-bg text-white py-3 rounded-lg font-semibold hover:opacity-90 transition transform hover:scale-105 shadow-lg"
                        >
                            <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                        </button>

                        <!-- Divider -->
                        <div class="relative my-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-gray-500">Atau daftar dengan</span>
                            </div>
                        </div>

                        <!-- Social Login -->
                        <div class="grid grid-cols-2 gap-4">
                            <button 
                                type="button"
                                class="flex items-center justify-center px-4 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition"
                            >
                                <i class="fab fa-google text-red-500 mr-2"></i>
                                <span class="text-sm font-semibold text-gray-700">Google</span>
                            </button>
                            <button 
                                type="button"
                                class="flex items-center justify-center px-4 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition"
                            >
                                <i class="fab fa-facebook text-blue-600 mr-2"></i>
                                <span class="text-sm font-semibold text-gray-700">Facebook</span>
                            </button>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center mt-6">
                            <p class="text-gray-600">
                                Sudah punya akun? 
                                <a href="login.php" class="text-purple-600 hover:text-purple-700 font-semibold">
                                    Masuk disini
                                </a>
                            </p>
                        </div>

                        <!-- Back to Home -->
                        <div class="text-center mt-4">
                            <a href="index.php" class="text-gray-500 hover:text-gray-700 text-sm">
                                <i class="fas fa-arrow-left mr-2"></i>Kembali ke beranda
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Side - Benefits -->
            <div class="hidden md:block animate-slideInRight order-1 md:order-2">
                <div class="text-white">
                    <div class="mb-8">
                        <i class="fas fa-shuttle-space text-9xl animate-float"></i>
                    </div>
                    <h1 class="text-5xl font-bold mb-4">Bergabung Dengan Kami!</h1>
                    <p class="text-xl text-gray-100 mb-8">Dapatkan berbagai keuntungan dengan menjadi member</p>
                    
                    <div class="space-y-4">
                        <div class="flex items-start bg-white bg-opacity-20 rounded-lg p-4 backdrop-blur">
                            <div class="bg-purple-500 rounded-full p-3 mr-4">
                                <i class="fas fa-check text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg mb-1">Booking Mudah & Cepat</h3>
                                <p class="text-sm text-gray-100">Pesan lapangan kapan saja, dimana saja hanya dengan beberapa klik</p>
                            </div>
                        </div>

                        <div class="flex items-start bg-white bg-opacity-20 rounded-lg p-4 backdrop-blur">
                            <div class="bg-purple-500 rounded-full p-3 mr-4">
                                <i class="fas fa-gift text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg mb-1">Promo Eksklusif Member</h3>
                                <p class="text-sm text-gray-100">Dapatkan diskon dan penawaran khusus untuk member setia</p>
                            </div>
                        </div>

                        <div class="flex items-start bg-white bg-opacity-20 rounded-lg p-4 backdrop-blur">
                            <div class="bg-purple-500 rounded-full p-3 mr-4">
                                <i class="fas fa-history text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg mb-1">Riwayat Booking</h3>
                                <p class="text-sm text-gray-100">Lihat dan kelola semua booking Anda dalam satu tempat</p>
                            </div>
                        </div>

                        <div class="flex items-start bg-white bg-opacity-20 rounded-lg p-4 backdrop-blur">
                            <div class="bg-purple-500 rounded-full p-3 mr-4">
                                <i class="fas fa-bell text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg mb-1">Notifikasi Booking</h3>
                                <p class="text-sm text-gray-100">Terima pengingat otomatis untuk jadwal booking Anda</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const iconId = fieldId === 'password' ? 'toggleIcon1' : 'toggleIcon2';
            const toggleIcon = document.getElementById(iconId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        function checkPasswordStrength() {
            const password = document.getElementById('password').value;
            const strengthBar = document.getElementById('strengthBar');
            const strengthText = document.getElementById('strengthText');
            
            let strength = 0;
            
            if (password.length >= 6) strength++;
            if (password.length >= 10) strength++;
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
            if (/\d/.test(password)) strength++;
            if (/[^a-zA-Z\d]/.test(password)) strength++;
            
            const strengthPercent = (strength / 5) * 100;
            strengthBar.style.width = strengthPercent + '%';
            
            if (strength <= 1) {
                strengthBar.classList.remove('bg-yellow-500', 'bg-green-500');
                strengthBar.classList.add('bg-red-500');
                strengthText.textContent = 'Kekuatan password: Lemah';
                strengthText.classList.remove('text-yellow-600', 'text-green-600');
                strengthText.classList.add('text-red-600');
            } else if (strength <= 3) {
                strengthBar.classList.remove('bg-red-500', 'bg-green-500');
                strengthBar.classList.add('bg-yellow-500');
                strengthText.textContent = 'Kekuatan password: Sedang';
                strengthText.classList.remove('text-red-600', 'text-green-600');
                strengthText.classList.add('text-yellow-600');
            } else {
                strengthBar.classList.remove('bg-red-500', 'bg-yellow-500');
                strengthBar.classList.add('bg-green-500');
                strengthText.textContent = 'Kekuatan password: Kuat';
                strengthText.classList.remove('text-red-600', 'text-yellow-600');
                strengthText.classList.add('text-green-600');
            }
        }

        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const matchText = document.getElementById('matchText');
            
            if (confirmPassword.length > 0) {
                matchText.classList.remove('hidden');
                if (password === confirmPassword) {
                    matchText.textContent = '✓ Password cocok';
                    matchText.classList.remove('text-red-600');
                    matchText.classList.add('text-green-600');
                } else {
                    matchText.textContent = '✗ Password tidak cocok';
                    matchText.classList.remove('text-green-600');
                    matchText.classList.add('text-red-600');
                }
            } else {
                matchText.classList.add('hidden');
            }
        }

        // Validate form before submit
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Password dan konfirmasi password tidak cocok!');
                return false;
            }
            
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...';
            submitBtn.disabled = true;
        });
    </script>
</body>
</html>