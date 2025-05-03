<?php
require_once 'config.php';

// Check if user is logged in and is admin
if (!isLoggedIn() || !hasRole('admin')) {
    redirect('login.php');
}

// Admin-specific functionality here
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم - PPT DESIGNER</title>
                    </a>
                </div>
                
                <div class="mb-6">
                    <h3 class="text-xs uppercase text-gray-500 mb-2 font-bold">الطلبات</h3>
                    <a href="admin-orders.html" class="block py-2 px-3 text-gray-700 hover:text-orange-600 rounded-lg">
                        <i class="ri-list-check-2 mr-2"></i> جميع الطلبات
                    </a>
                    <a href="admin-new-orders.html" class="block py-2 px-3 text-gray-700 hover:text-orange-600 rounded-lg">
                        <i class="ri-add-circle-line mr-2"></i> طلبات جديدة
                    </a>
                    <a href="admin-writing-orders.html" class="block py-2 px-3 text-gray-700 hover:text-orange-600 rounded-lg">
                        <i class="ri-edit-line mr-2"></i> طلبات الكتابة
                    </a>
                    <a href="admin-formatting-orders.html" class="block py-2 px-3 text-gray-700 hover:text-orange-600 rounded-lg">
                        <i class="ri-format-clear mr-2"></i> طلبات التنسيق
                    </a>
                </div>
                
                <div class="mb-6">
                    <h3 class="text-xs uppercase text-gray-500 mb-2 font-bold">الكتّاب</h3>
                    <a href="admin-writers.html" class="block py-2 px-3 text-gray-700 hover:text-orange-600 rounded-lg">
                        <i class="ri-team-line mr-2"></i> إدارة الكتّاب
                    </a>
                    <a href="admin-assignments.html" class="block py-2 px-3 text-gray-700 hover:text-orange-600 rounded-lg">
                        <i class="ri-task-line mr-2"></i> توزيع المهام
                    </a>
                </div>
                
                <div class="mb-6">
                    <h3 class="text-xs uppercase text-gray-500 mb-2 font-bold">العملاء</h3>
                    <a href="admin-clients.html" class="block py-2 px-3 text-gray-700 hover:text-orange-600 rounded-lg">
                        <i class="ri-user-line mr-2"></i> إدارة العملاء
                    </a>
                </div>
                
                <div class="mb-6">
                    <h3 class="text-xs uppercase text-gray-500 mb-2 font-bold">المراسلات</h3>
                    <a href="admin-messages.html" class="block py-2 px-3 text-gray-700 hover:text-orange-600 rounded-lg">
                        <i class="ri-message-2-line mr-2"></i> المحادثات
                    </a>
                    <a href="admin-assigned-chats.html" class="block py-2 px-3 text-gray-700 hover:text-orange-600 rounded-lg">
                        <i class="ri-chat-check-line mr-2"></i> المحادثات المخصصة
                    </a>
                </div>
                
                <div class="mb-6">
                    <h3 class="text-xs uppercase text-gray-500 mb-2 font-bold">الإعدادات</h3>
                    <a href="admin-settings.html" class="block py-2 px-3 text-gray-700 hover:text-orange-600 rounded-lg">
                        <i class="ri-settings-3-line mr-2"></i> إعدادات النظام
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 mr-64">
            <!-- Topbar -->
            <header class="bg-white shadow-sm">
                <div class="max-w-full mx-auto px-4 py-3 flex justify-between items-center">
                    <h1 class="text-xl font-bold text-gray-800">لوحة التحكم</h1>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <i class="ri-notification-3-line text-xl text-gray-600"></i>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                        </div>
                        <div class="relative">
                            <div class="h-8 w-8 rounded-full bg-orange-100 flex items-center justify-center text-orange-600">
                                <i class="ri-user-line"></i>
                            </div>
                            <div class="admin-badge">أ</div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="p-6">
                <!-- Stats Cards -->
                <div class="grid md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-lg shadow">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-orange-100 text-orange-600 mr-4">
                                <i class="ri-file-text-line text-xl"></i>
                            </div>
                            <div>
                                <p class="text-gray-500">الطلبات الجديدة</p>
                                <h3 class="text-2xl font-bold">18</h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-6 rounded-lg shadow">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                                <i class="ri-edit-line text-xl"></i>
                            </div>
                            <div>
                                <p class="text-gray-500">الطلبات قيد التنفيذ</p>
                                <h3 class="text-2xl font-bold">12</h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-6 rounded-lg shadow">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                                <i class="ri-checkbox-circle-line text-xl"></i>
                            </div>
                            <div>
                                <p class="text-gray-500">الطلبات المكتملة</p>
                                <h3 class="text-2xl font-bold">24</h3>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Orders -->
                <div class="bg-white rounded-lg shadow overflow-hidden mb-8">
                    <div class="px-6 py-4 border-b">
                        <h2 class="text-lg font-bold">أحدث الطلبات</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-right">رقم الطلب</th>
                                    <th class="px-6 py-3 text-right">نوع الخدمة</th>
                                    <th class="px-6 py-3 text-right">العميل</th>
                                    <th class="px-6 py-3 text-right">الحالة</th>
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
                                </tr>
                                <tr>
                                    <td class="px-6 py-4">#1023</td>
                                    <td class="px-6 py-4">تنسيق بحث دكتوراه</td>
                                    <td class="px-6 py-4">د. ليلى عبدالله</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">مراجعة العميل</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4">#1022</td>
                                    <td class="px-6 py-4">كتابة بحث تخرج</td>
                                    <td class="px-6 py-4">خالد سمير</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">مكتمل</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Recent Writers Activity -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-4 border-b">
                        <h2 class="text-lg font-bold">نشاط الكتّاب</h2>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="p-4 hover:bg-gray-50">
                            <div class="flex items-center">
                                <div class="h-10 w-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 mr-3">
                                    <i class="ri-user-line"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-medium">محمد علي</h4>
                                    <p class="text-sm text-gray-500">قام بتسليم طلب #1021</p>
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
                                    <h4 class="font-medium">سارة أحمد</h4>
                                    <p class="text-sm text-gray-500">بدأت العمل على طلب #1024</p>
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