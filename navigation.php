<?php
/**
 * أزرار التنقل والتحكم
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

<!-- أيقونة تغيير المظهر - نسخ مطابق من index.php -->
<div class="theme-toggle-sidebar">
    <button id="theme-toggle" class="theme-toggle-btn" title="تغيير المظهر" aria-label="تبديل بين المظهر الداكن والفاتح">
        <div class="toggle-icon">
            <i class="fas fa-sun sun-icon" aria-hidden="true"></i>
            <i class="fas fa-moon moon-icon" aria-hidden="true"></i>
        </div>
        <div class="toggle-ripple"></div>
    </button>
</div>

<!-- تبديل نوع العرض -->
<div class="view-toggle-sidebar">
    <div class="view-toggle-container">
        <button id="grid-view-btn" class="view-btn active" data-view="grid" title="عرض الشبكة" aria-label="تبديل إلى عرض الشبكة">
            <i class="fas fa-th" aria-hidden="true"></i>
        </button>
        <button id="showcase-view-btn" class="view-btn" data-view="showcase" title="العرض الشامل" aria-label="تبديل إلى العرض الشامل">
            <i class="fas fa-expand" aria-hidden="true"></i>
        </button>
    </div>
</div>

<!-- أزرار التنقل السريع -->
<div class="quick-navigation">
    <nav class="nav-menu" role="navigation" aria-label="التنقل السريع">
        <button type="button" class="nav-item" data-target="top" title="أعلى الصفحة">
            <i class="fas fa-arrow-up" aria-hidden="true"></i>
            <span class="nav-label">أعلى</span>
        </button>
        <button type="button" class="nav-item" data-target="filters" title="الفلاتر">
            <i class="fas fa-filter" aria-hidden="true"></i>
            <span class="nav-label">فلترة</span>
        </button>
        <button type="button" class="nav-item" data-target="themes" title="القوالب">
            <i class="fas fa-th" aria-hidden="true"></i>
            <span class="nav-label">القوالب</span>
        </button>
        <button type="button" class="nav-item" data-target="stats" title="الإحصائيات">
            <i class="fas fa-chart-bar" aria-hidden="true"></i>
            <span class="nav-label">إحصائيات</span>
        </button>
    </nav>
</div>

<!-- زر العودة للخلف -->
<div class="back-navigation">
    <button type="button" class="back-btn" onclick="history.back()" title="العودة للخلف">
        <i class="fas fa-arrow-right" aria-hidden="true"></i>
        <span>رجوع</span>
    </button>
</div>