<?php
require_once 'config.php';

// Check if user is logged in and is worker
if (!isLoggedIn() || !hasRole('worker')) {
    redirect('login.php');
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة العاملين - PPT DESIGNER</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        body { font-family: 'Tajawal', sans-serif; }
        .sidebar { min-height: 100vh; }
        .sidebar a:hover { background-color: #FFEDD5; }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="sidebar bg-white w-64 shadow-md fixed">
            <div class="p-4 border-b">
                <h1 class="text-xl font-bold text-orange-600 flex items-center">
                    <i class="ri-book-line mr-2"></i>
                    PPT DESIGNER
                </h1>
                <p class="text-sm text-gray-500">الكاتب/ة</p>
            </div>
            <nav class="p-4">
                <div class="mb-6">
                    <h3 class="text-xs uppercase text-gray-500 mb-2 font-bold">الطلبات</h3>
                    <a href="worker.php" class="block py-2 px-3 text-orange-600 bg-orange-50 rounded-lg font-medium">
                        <i class="ri-task-line mr-2"></i> المهام المخصصة
                    </a>
                    <a href="worker-orders.php" class="block py-2 px-3 text-gray-700 hover:text-orange-600 rounded-lg">
                        <i class="ri-list-check-2 mr-2"></i> جميع الطلبات
                    </a>
                </div>
                
                <div class="mb-6">
                    <h3 class="text-xs uppercase text-gray-500 mb-2 font-bold">المراسلات</h3>
                    <a href="worker-messages.php" class="block py-2 px-3 text-gray-700 hover:text-orange-600 rounded-lg">
                        <i class="ri-message-2-line mr-2"></i> المحادثات
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 mr-64">
            <!-- Topbar -->
            <header class="bg-white shadow-sm">
                <div class="max-w-full mx-auto px-4 py-3 flex justify-between items-center">
                    <h1 class="text-xl font-bold text-gray-800">لوحة العاملين</h1>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <i class="ri-notification-3-line text-xl text-gray-600"></i>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                        </div>
                        <div class="relative">
                            <div class="h-8 w-8 rounded-full bg-orange-100 flex items-center justify-center text-orange-600">
                                <i class="ri-user-line"></i>
                            </div>
                        </div>
                        <a href="?logout=1" class="text-gray-700 hover:text-orange-600">تسجيل الخروج</a>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="p-6">
                <!-- Assigned Tasks -->
                <div class="bg-white rounded-lg shadow overflow-hidden mb-8">
                    <div class="px-6 py-4 border-b">
                        <h2 class="text-lg font-bold">المهام المخصصة لك</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-right">رقم الطلب</th>
                                    <th class="px-6 py-3 text-right">نوع الخدمة</th>
                                    <th class="px-6 py-3 text-right">العميل</th>
                                    <th class="px-6 py-3 text-right">الحالة</th>
                                    <th class="px-6 py-3 text-right">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4">#1024</td>
                                    <td class="px-6 py-4">كتابة مذكرة ماجستير</td>
                                    <td class="px-6 py-4">أحمد محمد</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 bg-orange-100 text-orange-800 rounded-full text-xs">قيد التنفيذ</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="text-orange-600 hover:underline">فتح</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4">#1023</td>
                                    <td class="px-6 py-4">تنسيق بحث دكتوراه</td>
                                    <td class="px-6 py-4">د. ليلى عبدالله</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">مراجعة العميل</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="text-orange-600 hover:underline">فتح</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Recent Messages -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-4 border-b">
                        <h2 class="text-lg font-bold">أحدث الرسائل</h2>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="p-4 hover:bg-gray-50">
                            <div class="flex items-center">
                                <div class="h-10 w-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 mr-3">
                                    <i class="ri-user-line"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-medium">أحمد محمد</h4>
                                    <p class="text-sm text-gray-500">طلب #1024: هل يمكنك إضافة فصل إضافي؟</p>
                                </div>
                                <div class="text-sm text-gray-500">منذ ساعتين</div>
                            </div>
                        </div>
                        <div class="p-4 hover:bg-gray-50">
                            <div class="flex items-center">
                                <div class="h-10 w-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 mr-3">
                                    <i class="ri-user-line"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-medium">د. ليلى عبدالله</h4>
                                    <p class="text-sm text-gray-500">طلب #1023: شكراً على العمل الرائع</p>
                                </div>
                                <div class="text-sm text-gray-500">منذ 5 ساعات</div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>