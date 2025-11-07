<?php
session_start();

// Jika sudah login, redirect ke dashboard
if(isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// Proses login
if(isset($_POST['login'])) {
    // Koneksi database (sesuaikan dengan konfigurasi Anda)
    $host = 'localhost';
    $dbname = 'badminton_booking';
    $username = 'root';
    $password = '';
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $email = $_POST['email'];
        $pass = $_POST['password'];
        
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($user && password_verify($pass, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['email'] = $user['email'];
            header('Location: index.php');
            exit();
        } else {
            $error = "Email atau password salah!";
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
    <title>Login - Badminton Arena</title>
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
            
            <!-- Left Side - Illustration -->
            <div class="hidden md:block animate-slideInLeft">
                <div class="text-white text-center">
                    <div class="mb-8">
                        <i class="fas fa-shuttle-space text-9xl animate-float"></i>
                    </div>
                    <h1 class="text-5xl font-bold mb-4">Badminton Arena</h1>
                    <p class="text-xl text-gray-100 mb-8">Selamat datang kembali! Masuk untuk melakukan booking lapangan</p>
                    <div class="grid grid-cols-3 gap-4 text-sm">
                        <div class="bg-white bg-opacity-20 rounded-lg p-4 backdrop-blur">
                            <i class="fas fa-users text-3xl mb-2"></i>
                            <p class="font-semibold">1000+</p>
                            <p class="text-xs">Member Aktif</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg p-4 backdrop-blur">
                            <i class="fas fa-calendar-check text-3xl mb-2"></i>
                            <p class="font-semibold">5000+</p>
                            <p class="text-xs">Booking</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg p-4 backdrop-blur">
                            <i class="fas fa-star text-3xl mb-2"></i>
                            <p class="font-semibold">4.9/5</p>
                            <p class="text-xs">Rating</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="animate-slideInRight">
                <div class="glass-effect rounded-2xl shadow-2xl p-8 md:p-12">
                    
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <div class="md:hidden mb-4">
                            <i class="fas fa-shuttle-space text-6xl gradient-text"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang! 👋</h2>
                        <p class="text-gray-600">Masuk ke akun Anda untuk melanjutkan</p>
                    </div>

                    <!-- Error Message -->
                    <?php if(isset($error)): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 animate-fadeIn">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span><?php echo $error; ?></span>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Login Form -->
                    <form method="POST" action="" class="space-y-6">
                        
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
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none input-focus transition"
                                    placeholder="Masukkan password"
                                >
                                <button 
                                    type="button" 
                                    onclick="togglePassword()"
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-purple-600"
                                >
                                    <i class="fas fa-eye" id="toggleIcon"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="remember" class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                                <span class="ml-2 text-sm text-gray-700">Ingat saya</span>
                            </label>
                            <a href="#" class="text-sm text-purple-600 hover:text-purple-700 font-semibold">
                                Lupa password?
                            </a>
                        </div>

                        <!-- Login Button -->
                        <button 
                            type="submit" 
                            name="login"
                            class="w-full gradient-bg text-white py-3 rounded-lg font-semibold hover:opacity-90 transition transform hover:scale-105 shadow-lg"
                        >
                            <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                        </button>

                        <!-- Divider -->
                        <div class="relative my-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-gray-500">Atau masuk dengan</span>
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

                        <!-- Register Link -->
                        <div class="text-center mt-6">
                            <p class="text-gray-600">
                                Belum punya akun? 
                                <a href="daftar.php" class="text-purple-600 hover:text-purple-700 font-semibold">
                                    Daftar sekarang
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

        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
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

        // Add animation on form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...';
            submitBtn.disabled = true;
        });
    </script>
</body>
</html>