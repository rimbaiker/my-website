<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - PPT DESIGNER</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        body { 
            font-family: 'Tajawal', sans-serif;
            background: linear-gradient(135deg, #f97316 0%, #fb923c 100%);
        }
        .login-container {
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
            border-radius: 20px;
            overflow: hidden;
        }
        .input-field {
            transition: all 0.3s ease;
        }
        .input-field:focus {
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.3);
        }
        .btn-login {
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(234, 88, 12, 0.4);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="login-container bg-white">
            <!-- Header with logo -->
            <div class="bg-orange-600 text-white px-8 py-6 text-center relative overflow-hidden">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-orange-500 rounded-full opacity-20"></div>
                <div class="absolute -bottom-8 -left-8 w-24 h-24 bg-orange-400 rounded-full opacity-20"></div>
                
                <div class="relative z-10">
                    <i class="ri-book-line text-4xl mb-2"></i>
                    <h2 class="text-2xl font-bold">مرحباً بعودتك</h2>
                    <p class="text-orange-100">سجل الدخول للوصول إلى حسابك</p>
                </div>
            </div>
            
            <!-- Login Form -->
            <div class="p-8">
                <?php if (isset($error)): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 flex items-center">
                        <i class="ri-error-warning-line mr-2"></i>
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="auth.php">
                    <input type="hidden" name="login" value="1">
                    
                    <!-- Email Field -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2 flex items-center">
                            <i class="ri-mail-line ml-2 text-orange-600"></i>
                            البريد الإلكتروني
                        </label>
                        <div class="relative">
                            <input type="email" name="email" 
                                   class="w-full px-4 py-3 pr-10 border rounded-lg input-field focus:outline-none focus:border-orange-500" 
                                   placeholder="example@email.com" required>
                            <i class="ri-user-3-line absolute right-3 top-3.5 text-gray-400"></i>
                        </div>
                    </div>
                    
                    <!-- Password Field -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2 flex items-center">
                            <i class="ri-lock-line ml-2 text-orange-600"></i>
                            كلمة المرور
                        </label>
                        <div class="relative">
                            <input type="password" name="password" 
                                   class="w-full px-4 py-3 pr-10 border rounded-lg input-field focus:outline-none focus:border-orange-500" 
                                   placeholder="••••••••" required>
                            <i class="ri-key-2-line absolute right-3 top-3.5 text-gray-400"></i>
                        </div>
                    </div>
                    
                    <!-- Remember Me & Forgot Password -->
                    <div class="flex justify-between items-center mb-6">
                        <label class="flex items-center text-gray-700">
                            <input type="checkbox" class="form-checkbox text-orange-600 rounded border-gray-300">
                            <span class="mr-2">تذكرني</span>
                        </label>
                        <a href="forgot-password.php" class="text-orange-600 hover:underline text-sm">
                            نسيت كلمة المرور؟
                        </a>
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" class="w-full btn-login text-white py-3 rounded-lg font-bold mb-6 flex items-center justify-center">
                        <i class="ri-login-box-line ml-2"></i>
                        تسجيل الدخول
                    </button>
                    
                    <!-- Social Login -->
                    <div class="mb-6">
                        <div class="flex items-center justify-center mb-4">
                            <div class="border-t border-gray-300 flex-grow"></div>
                            <span class="px-4 text-gray-500">أو</span>
                            <div class="border-t border-gray-300 flex-grow"></div>
                        </div>
                        <div class="flex justify-center space-x-4">
                            <a href="#" class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 hover:bg-blue-200">
                                <i class="ri-facebook-fill"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center text-red-600 hover:bg-red-200">
                                <i class="ri-google-fill"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-blue-200 rounded-full flex items-center justify-center text-blue-700 hover:bg-blue-300">
                                <i class="ri-twitter-fill"></i>
                            </a>
                        </div>
                    </div>
                </form>
                
                <!-- Register Link -->
                <div class="text-center text-gray-600">
                    <p>ليس لديك حساب؟ 
                        <a href="register.php" class="text-orange-600 font-bold hover:underline">
                            سجل الآن
                        </a>
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Footer Note -->
        <div class="text-center text-white mt-6 text-sm">
            <p>© 2023 PPT DESIGNER. جميع الحقوق محفوظة</p>
        </div>
    </div>
</body>
</html>