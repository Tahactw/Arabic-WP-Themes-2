<?php
/**
 * العناصر الأساسية لصفحة الأرشيف
 * 
 * @package ArabicThemes
 * @author Tahactw
 * @date 2025-05-29
 */

// منع الوصول المباشر
if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- Canvas للجسيمات المتحركة -->
<canvas id="particles-canvas" aria-hidden="true"></canvas>

<!-- Loading Screen للانتقالات -->
<div class="page-loader" id="page-loader">
    <div class="loader-content">
        <div class="loader-rings">
            <div class="ring ring-1"></div>
            <div class="ring ring-2"></div>
            <div class="ring ring-3"></div>
        </div>
        <div class="loader-text">
            <h3>جاري تحضير القوالب...</h3>
            <div class="loading-progress">
                <div class="progress-bar"></div>
            </div>
        </div>
    </div>
</div>

<!-- مؤشر الاتصال -->
<div class="connection-status" id="connection-status">
    <div class="status-indicator">
        <i class="fas fa-wifi" aria-hidden="true"></i>
        <span class="status-text">متصل</span>
    </div>
</div>

<!-- رسائل التنبيه -->
<div class="notifications-container" id="notifications-container" role="alert" aria-live="polite">
    <!-- سيتم إضافة الإشعارات هنا ديناميكياً -->
</div>