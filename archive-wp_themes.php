<?php
/**
 * أرشيف القوالب - النظام المعياري المقسم
 * 
 * @package ArabicThemes
 * @author Tahactw
 * @date 2025-05-29
 * @version 2.1.0
 */

// منع الوصول المباشر
if (!defined('ABSPATH')) {
    exit;
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>قوالب ووردبريس العربية - <?php bloginfo('name'); ?></title>
    <meta name="description" content="استكشف مجموعة رائعة من قوالب ووردبريس العربية المجانية والاحترافية">
    
    <?php
    // تضمين المتطلبات الأساسية
    get_template_part('template-parts/archive/core/head-meta');
    ?>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class('themes-archive dark-mode'); ?>>

<?php
// العناصر الأساسية
get_template_part('template-parts/archive/core/elements');
get_template_part('template-parts/archive/core/backgrounds');
get_template_part('template-parts/archive/core/navigation');
get_template_part('template-parts/archive/core/hero');
?>

<main class="themes-archive-main" id="main-content" role="main">
    <?php
    // نظام الفلترة
    get_template_part('template-parts/archive/filters/search');
    get_template_part('template-parts/archive/filters/categories');
    get_template_part('template-parts/archive/filters/sorting');
    get_template_part('template-parts/archive/filters/advanced');
    
    // عرض القوالب
    get_template_part('template-parts/archive/display/grid');
    get_template_part('template-parts/archive/display/showcase');
    
    // الإحصائيات
    get_template_part('template-parts/archive/stats/quick-stats');
    get_template_part('template-parts/archive/stats/counters');
    ?>
</main>

<?php
// الأنماط والسكريبت
get_template_part('template-parts/archive/styles/loader');
get_template_part('template-parts/archive/scripts/loader');

// إخفاء Footer
add_action('wp_footer', function() {
    echo '<style>footer { display: none !important; }</style>';
}, 999);

wp_footer();
?>
</body>
</html>