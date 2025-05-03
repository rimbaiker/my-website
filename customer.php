<?php
require_once 'config.php';

// Check if user is logged in (no specific role required)
if (!isLoggedIn()) {
    redirect('login.php');
}

// Get customer orders
$stmt = $pdo->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC");
$stmt->execute([$_SESSION['user_id']]);
$orders = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة العميل - PPT DESIGNER</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        body { font-family: 'Tajawal', sans-serif; }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <i class="ri-book-line text-2xl text-orange-600 mr-2"></i>
                <span class="text-xl font-bold text-gray-800">PPT DESIGNER</span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="?logout=1" class="px-4 py-2 text-gray-700 hover:text-orange-600">تسجيل الخروج</a>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <section class="py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-bold mb-6">مرحباً بك، <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
            
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
                <div class="bg-orange-600 text-white px-6 py-4">
                    <h2 class="text-xl font-bold">طلباتك</h2>
                </div>
                <div class="p-6">
                    <?php if (empty($orders)): ?>
                        <p class="text-gray-600">ليس لديك أي طلبات بعد. <a href="order.php" class="text-orange-600 hover:underline">اطلب خدمة الآن</a></p>
                    <?php else: ?>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-right">رقم الطلب</th>
                                        <th class="px-6 py-3 text-right">نوع الخدمة</th>
                                        <th class="px-6 py-3 text-right">الحالة</th>
                                        <th class="px-6 py-3 text-right">التاريخ</th>
                                        <th class="px-6 py-3 text-right">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <?php foreach ($orders as $order): ?>
                                    <tr>
                                        <td class="px-6 py-4">#<?php echo $order['id']; ?></td>
                                        <td class="px-6 py-4"><?php echo htmlspecialchars($order['service_type']); ?></td>
                                        <td class="px-6 py-4">
                                            <?php 
                                            $statusClass = [
                                                'pending' => 'bg-yellow-100 text-yellow-800',
                                                'in_progress' => 'bg-blue-100 text-blue-800',
                                                'completed' => 'bg-green-100 text-green-800',
                                                'revision' => 'bg-purple-100 text-purple-800'
                                            ];
                                            $statusText = [
                                                'pending' => 'قيد المراجعة',
                                                'in_progress' => 'قيد التنفيذ',
                                                'completed' => 'مكتمل',
                                                'revision' => 'يحتاج مراجعة'
                                            ];
                                            ?>
                                            <span class="px-2 py-1 <?php echo $statusClass[$order['status']]; ?> rounded-full text-xs">
                                                <?php echo $statusText[$order['status']]; ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4"><?php echo date('Y-m-d', strtotime($order['created_at'])); ?></td>
                                        <td class="px-6 py-4">
                                            <a href="order-details.php?id=<?php echo $order['id']; ?>" class="text-orange-600 hover:underline">عرض</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="grid md:grid-cols-2 gap-6">
                <a href="order.php" class="bg-orange-600 text-white px-6 py-4 rounded-lg shadow hover:bg-orange-700 text-center">
                    <i class="ri-add-circle-line text-2xl mb-2"></i>
                    <h3 class="text-xl font-bold">طلب خدمة جديدة</h3>
                </a>
                
                <a href="customer-messages.php" class="bg-white border border-orange-600 text-orange-600 px-6 py-4 rounded-lg shadow hover:bg-orange-50 text-center">
                    <i class="ri-message-2-line text-2xl mb-2"></i>
                    <h3 class="text-xl font-bold">المراسلات</h3>
                </a>
            </div>
        </div>
    </section>
</body>
</html>