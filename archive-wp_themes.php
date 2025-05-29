<?php
/**
 * أرشيف القوالب - تجربة بصرية متقدمة مع نوعين عرض
 * صفحة عرض القوالب مع تأثيرات سينمائية وعرض شامل
 * 
 * @package ArabicThemes
 * @author Tahactw
 * @date 2025-05-29
 */

// منع الوصول المباشر
if (!defined('ABSPATH')) {
    exit;
}

// Don't include header - we're removing it completely
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>قوالب ووردبريس العربية - <?php bloginfo('name'); ?></title>
    <meta name="description" content="استكشف مجموعة رائعة من قوالب ووردبريس العربية المجانية والاحترافية">
    
    <!-- تحسين SEO -->
    <meta property="og:title" content="قوالب ووردبريس العربية">
    <meta property="og:description" content="استكشف مجموعة رائعة من قوالب ووردبريس العربية">
    <meta property="og:type" content="website">
    
    <!-- Preload للخطوط المهمة -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800;900&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class('themes-archive dark-mode'); ?>>

<!-- 🌓 أيقونة تغيير المظهر - نفس التصميم من index.php -->
<div class="theme-toggle-sidebar">
    <button id="theme-toggle" class="theme-toggle-btn" title="تغيير المظهر">
        <div class="toggle-icon">
            <i class="fas fa-sun sun-icon"></i>
            <i class="fas fa-moon moon-icon"></i>
        </div>
        <div class="toggle-ripple"></div>
    </button>
</div>

<!-- Canvas للجسيمات المتحركة -->
<canvas id="particles-canvas"></canvas>

<!-- خلفية الـ Parallax -->
<div class="parallax-background">
    <div class="parallax-layer" data-speed="0.1"></div>
    <div class="parallax-layer" data-speed="0.3"></div>
    <div class="parallax-layer" data-speed="0.5"></div>
</div>

<!-- 🌌 نفس الخلفية المتحركة من الصفحة الرئيسية -->
<div class="cosmic-background">
    <!-- طبقة النجوم المتحركة -->
    <div class="stars-field">
        <div class="stars-layer stars-layer-1"></div>
        <div class="stars-layer stars-layer-2"></div>
        <div class="stars-layer stars-layer-3"></div>
    </div>
    
    <!-- السديم المتحرك -->
    <div class="nebula-effects">
        <div class="nebula nebula-1"></div>
        <div class="nebula nebula-2"></div>
        <div class="nebula nebula-3"></div>
    </div>
    
    <!-- الموجات الكونية -->
    <div class="cosmic-waves">
        <div class="wave wave-1"></div>
        <div class="wave wave-2"></div>
        <div class="wave wave-3"></div>
    </div>
    
    <!-- الجسيمات العائمة -->
    <div class="floating-particles">
        <div class="particle particle-1"></div>
        <div class="particle particle-2"></div>
        <div class="particle particle-3"></div>
        <div class="particle particle-4"></div>
        <div class="particle particle-5"></div>
    </div>
</div>

<!-- العناصر العائمة والأشكال المتحركة -->
<div class="floating-shapes-enhanced">
    <div class="shape-1"></div>
    <div class="shape-2"></div>
    <div class="shape-3"></div>
    <div class="shape-4"></div>
</div>

<!-- تبديل نوع العرض -->
<div class="view-toggle-sidebar">
    <div class="view-toggle-container">
        <button id="grid-view-btn" class="view-btn active" data-view="grid" title="عرض الشبكة">
            <i class="fas fa-th"></i>
        </button>
        <button id="showcase-view-btn" class="view-btn" data-view="showcase" title="العرض الشامل">
            <i class="fas fa-expand"></i>
        </button>
    </div>
</div>

<!-- الصفحة الرئيسية -->
<main class="themes-archive-main" id="main-content">
    
    <!-- Hero Section مصغر -->
    <section class="archive-hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="archive-title">
                    <span class="title-icon"><i class="fas fa-palette"></i></span>
                    <span class="title-text">مكتبة القوالب العربية</span>
                    <span class="title-count"><?php
                        $count = wp_count_posts('wp_themes');
                        echo $count ? $count->publish : '0';
                    ?> قالب</span>
                </h1>
                <p class="archive-subtitle">
                    اختر القالب المثالي لموقعك من مجموعتنا المتميزة
                </p>
            </div>
        </div>
    </section>

    <!-- نظام الفلترة المتقدم -->
    <section class="filters-section">
        <div class="container">
            <div class="filters-container">
                
                <!-- شريط البحث -->
                <div class="search-container">
                    <div class="search-wrapper">
                        <input type="text" id="theme-search" placeholder="ابحث عن القالب المثالي..." class="search-input">
                        <div class="search-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="search-clear" style="display: none;">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                </div>

                <!-- فلاتر الفئات - قائمة منسدلة -->
                <div class="category-filter-container">
                    <div class="select-wrapper">
                        <select id="category-filter" class="category-select">
                            <option value="all">الجميع</option>
                            <?php
                            // جلب الفئات من الداتابيس تلقائياً
                            $categories = get_terms(array(
                                'taxonomy' => 'theme_category',
                                'hide_empty' => true,
                                'orderby' => 'count',
                                'order' => 'DESC'
                            ));
                            
                            if (!is_wp_error($categories) && !empty($categories)) :
                                foreach ($categories as $category) :
                            ?>
                            <option value="<?php echo esc_attr($category->slug); ?>">
                                <?php echo esc_html($category->name); ?> (<?php echo $category->count; ?>)
                            </option>
                            <?php 
                                endforeach;
                            endif; 
                            ?>
                        </select>
                        <div class="select-icon">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                </div>

                <!-- ترتيب النتائج -->
                <div class="sort-container">
                    <div class="select-wrapper">
                        <select id="theme-sort" class="sort-select">
                            <option value="date">الأحدث</option>
                            <option value="popularity">الأكثر شعبية</option>
                            <option value="name">ترتيب أبجدي</option>
                            <option value="downloads">الأكثر تحميلاً</option>
                        </select>
                        <div class="select-icon">
                            <i class="fas fa-sort"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Grid View - العرض الشبكي -->
    <section class="themes-grid-section" id="grid-view">
        <div class="container">
            
            <!-- مؤشر التحميل -->
            <div class="loading-indicator" id="loading-indicator">
                <div class="loading-spinner">
                    <div class="spinner-ring"></div>
                    <div class="spinner-ring"></div>
                    <div class="spinner-ring"></div>
                </div>
                <span>جاري تحضير القوالب...</span>
            </div>

            <!-- شبكة القوالب -->
            <div class="themes-grid" id="themes-grid">
                <?php
                // Query للقوالب
                $themes_query = new WP_Query(array(
                    'post_type' => 'wp_themes',
                    'posts_per_page' => -1,
                    'post_status' => 'publish'
                ));

                if ($themes_query->have_posts()) :
                    while ($themes_query->have_posts()) : $themes_query->the_post();
                        
                        // بيانات القالب
                        $theme_id = get_the_ID();
                        $theme_preview = get_post_meta($theme_id, '_theme_preview_url', true);
                        $theme_version = get_post_meta($theme_id, '_theme_version', true);
                        $theme_downloads = get_post_meta($theme_id, '_download_count', true) ?: 0;
                        $theme_rating = get_post_meta($theme_id, '_theme_rating', true) ?: 5;
                        
                        // الحصول على الأوسمة تلقائياً من theme_tags
                        $theme_tags_terms = wp_get_post_terms($theme_id, 'theme_tags');
                        $theme_tags = array();
                        if (!is_wp_error($theme_tags_terms) && !empty($theme_tags_terms)) {
                            foreach ($theme_tags_terms as $tag) {
                                $theme_tags[] = $tag->name;
                            }
                        }
                        
                        $theme_categories = wp_get_post_terms($theme_id, 'theme_category', array('fields' => 'slugs'));
                        
                        // صورة القالب
                        $theme_image = get_the_post_thumbnail_url($theme_id, 'large');
                        if (!$theme_image) {
                            $theme_image = get_template_directory_uri() . '/assets/images/theme-placeholder.jpg';
                        }
                ?>
                
                <article class="theme-card" 
                         data-categories="<?php echo esc_attr(implode(' ', $theme_categories)); ?>"
                         data-name="<?php echo esc_attr(get_the_title()); ?>"
                         data-downloads="<?php echo esc_attr($theme_downloads); ?>"
                         data-date="<?php echo esc_attr(get_the_date('Y-m-d')); ?>">
                    
                    <div class="card-inner">
                        <!-- صورة القالب -->
                        <div class="card-image-container">
                            <div class="card-image" style="background-image: url('<?php echo esc_url($theme_image); ?>');">
                                <div class="image-overlay"></div>
                                <div class="card-badges">
                                    <?php if ($theme_version) : ?>
                                    <span class="badge version-badge">
                                        <i class="fas fa-code-branch"></i>
                                        v<?php echo esc_html($theme_version); ?>
                                    </span>
                                    <?php endif; ?>
                                    
                                    <span class="badge downloads-badge">
                                        <i class="fas fa-download"></i>
                                        <?php echo number_format_i18n($theme_downloads); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- محتوى البطاقة -->
                        <div class="card-content">
                            <div class="card-header">
                                <h3 class="theme-title"><?php the_title(); ?></h3>
                                
                                <!-- تقييم القالب -->
                                <div class="theme-rating">
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                    <i class="<?php echo $i <= $theme_rating ? 'fas' : 'far'; ?> fa-star"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            
                            <!-- الكلمات المفتاحية العائمة -->
                            <?php if (!empty($theme_tags)) : ?>
                            <div class="floating-tags">
                                <?php 
                                $max_tags = 3;
                                for ($i = 0; $i < min(count($theme_tags), $max_tags); $i++) : 
                                ?>
                                <span class="floating-tag">
                                    <?php echo esc_html($theme_tags[$i]); ?>
                                </span>
                                <?php endfor; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- رابط مخفي للقالب - مباشر بدون نصوص إضافية -->
                    <a href="<?php the_permalink(); ?>" class="card-link" aria-label="عرض تفاصيل <?php the_title(); ?>"></a>
                </article>
                
                <?php 
                    endwhile;
                    $total_themes = $themes_query->found_posts;
                    wp_reset_postdata();
                else : 
                ?>
                
                <!-- رسالة عدم وجود قوالب -->
                <div class="no-themes-message">
                    <div class="no-themes-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>لم يتم العثور على قوالب</h3>
                    <p>تأكد من إضافة قوالب من لوحة الإدارة</p>
                </div>
                
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Showcase View - العرض الشامل المُحسن -->
    <section class="themes-showcase-section" id="showcase-view" style="display: none;">
        <div class="showcase-container">
            <!-- مؤشر الموضع -->
            <div class="showcase-indicators">
                <div class="current-theme">
                    <span class="current-number">1</span>
                    <span>/</span>
                    <span class="total-number"><?php echo isset($total_themes) ? $total_themes : 0; ?></span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill"></div>
                </div>
            </div>

            <!-- أزرار التنقل -->
            <div class="showcase-navigation">
                <button class="nav-btn prev-btn" id="prevTheme">
                    <i class="fas fa-chevron-up"></i>
                </button>
                <button class="nav-btn next-btn" id="nextTheme">
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>

            <!-- حاوي القوالب الشاملة -->
            <div class="showcase-themes" id="showcase-themes">
                <?php
                // إعادة تشغيل Query للعرض الشامل
                $showcase_query = new WP_Query(array(
                    'post_type' => 'wp_themes',
                    'posts_per_page' => -1,
                    'post_status' => 'publish'
                ));

                if ($showcase_query->have_posts()) :
                    $theme_index = 0;
                    while ($showcase_query->have_posts()) : $showcase_query->the_post();
                        $theme_index++;
                        
                        // بيانات القالب
                        $theme_id = get_the_ID();
                        $theme_preview = get_post_meta($theme_id, '_theme_preview_url', true);
                        $theme_version = get_post_meta($theme_id, '_theme_version', true);
                        $theme_downloads = get_post_meta($theme_id, '_download_count', true) ?: 0;
                        $theme_rating = get_post_meta($theme_id, '_theme_rating', true) ?: 5;
                        $theme_description = get_the_excerpt() ?: 'قالب ووردبريس متطور وسهل الاستخدام';
                        
                        // الأوسمة من theme_tags
                        $theme_tags_terms = wp_get_post_terms($theme_id, 'theme_tags');
                        $theme_tags = array();
                        if (!is_wp_error($theme_tags_terms) && !empty($theme_tags_terms)) {
                            foreach ($theme_tags_terms as $tag) {
                                $theme_tags[] = $tag->name;
                            }
                        }
                        
                        // التصنيفات
                        $theme_categories_terms = wp_get_post_terms($theme_id, 'theme_category');
                        
                        // صورة القالب
                        $theme_image = get_the_post_thumbnail_url($theme_id, 'full');
                        if (!$theme_image) {
                            $theme_image = get_template_directory_uri() . '/assets/images/theme-placeholder.jpg';
                        }
                ?>
                
                <div class="showcase-theme" 
                     data-theme-index="<?php echo $theme_index; ?>"
                     data-categories="<?php echo esc_attr(implode(' ', wp_get_post_terms($theme_id, 'theme_category', array('fields' => 'slugs')))); ?>"
                     data-name="<?php echo esc_attr(get_the_title()); ?>"
                     data-downloads="<?php echo esc_attr($theme_downloads); ?>"
                     data-date="<?php echo esc_attr(get_the_date('Y-m-d')); ?>">
                    
                    <!-- الخلفية المتحركة -->
                    <div class="showcase-bg" style="background-image: url('<?php echo esc_url($theme_image); ?>');">
                        <div class="showcase-overlay"></div>
                    </div>
                    
                    <!-- المحتوى الرئيسي -->
                    <div class="showcase-content">
                        <div class="showcase-left">
                            <!-- معاينة القالب -->
                            <div class="showcase-preview">
                                <div class="preview-frame">
                                    <div class="preview-header">
                                        <div class="preview-controls">
                                            <span class="control red"></span>
                                            <span class="control yellow"></span>
                                            <span class="control green"></span>
                                        </div>
                                        <div class="preview-url">
                                            <i class="fas fa-globe"></i>
                                            <span>معاينة القالب</span>
                                        </div>
                                    </div>
                                    <div class="preview-screen">
                                        <img src="<?php echo esc_url($theme_image); ?>" 
                                             alt="<?php echo esc_attr(get_the_title()); ?>"
                                             loading="lazy">
                                        <div class="preview-overlay">
                                            <div class="preview-play">
                                                <i class="fas fa-play"></i>
                                                <span>معاينة تفاعلية</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="showcase-right">
                            <!-- معلومات القالب -->
                            <div class="showcase-info">
                                <!-- رقم القالب -->
                                <div class="theme-number">
                                    <span class="number-bg"><?php echo str_pad($theme_index, 2, '0', STR_PAD_LEFT); ?></span>
                                </div>
                                
                                <!-- عنوان القالب -->
                                <h2 class="showcase-title"><?php the_title(); ?></h2>
                                
                                <!-- وصف القالب -->
                                <p class="showcase-description"><?php echo esc_html($theme_description); ?></p>
                                
                                <!-- إحصائيات القالب -->
                                <div class="showcase-stats">
                                    <div class="stat-item">
                                        <div class="stat-icon">
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="stat-content">
                                            <span class="stat-value"><?php echo $theme_rating; ?></span>
                                            <span class="stat-label">تقييم</span>
                                        </div>
                                    </div>
                                    
                                    <div class="stat-item">
                                        <div class="stat-icon">
                                            <i class="fas fa-download"></i>
                                        </div>
                                        <div class="stat-content">
                                            <span class="stat-value"><?php echo number_format_i18n($theme_downloads); ?></span>
                                            <span class="stat-label">تحميل</span>
                                        </div>
                                    </div>
                                    
                                    <?php if ($theme_version) : ?>
                                    <div class="stat-item">
                                        <div class="stat-icon">
                                            <i class="fas fa-code-branch"></i>
                                        </div>
                                        <div class="stat-content">
                                            <span class="stat-value">v<?php echo esc_html($theme_version); ?></span>
                                            <span class="stat-label">إصدار</span>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                
                                <!-- التصنيفات -->
                                <?php if (!empty($theme_categories_terms)) : ?>
                                <div class="showcase-categories">
                                    <h4>التصنيفات:</h4>
                                    <div class="categories-list">
                                        <?php foreach ($theme_categories_terms as $category) : ?>
                                        <span class="category-tag">
                                            <i class="fas fa-tag"></i>
                                            <?php echo esc_html($category->name); ?>
                                        </span>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                
                                <!-- الأوسمة -->
                                <?php if (!empty($theme_tags)) : ?>
                                <div class="showcase-tags">
                                    <h4>الأوسمة:</h4>
                                    <div class="tags-list">
                                        <?php foreach ($theme_tags as $tag) : ?>
                                        <span class="theme-tag"><?php echo esc_html($tag); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                
                                <!-- أزرار العمل -->
                                <div class="showcase-actions">
                                    <a href="<?php the_permalink(); ?>" class="btn-primary">
                                        <i class="fas fa-eye"></i>
                                        <span>عرض التفاصيل</span>
                                    </a>
                                    
                                    <?php if ($theme_preview) : ?>
                                    <a href="<?php echo esc_url($theme_preview); ?>" target="_blank" class="btn-secondary">
                                        <i class="fas fa-external-link-alt"></i>
                                        <span>معاينة مباشرة</span>
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php 
                    endwhile;
                    wp_reset_postdata();
                endif; 
                ?>
            </div>
        </div>
    </section>
    
    <!-- قسم الإحصائيات السريعة -->
    <section class="quick-stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-number"><?php
                            $count = wp_count_posts('wp_themes');
                            echo $count ? $count->publish : '0';
                        ?></span>
                        <span class="stat-label">قالب متاح</span>
                    </div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-download"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-number"><?php
                            global $wpdb;
                            $total_downloads = $wpdb->get_var("
                                SELECT SUM(meta_value) 
                                FROM {$wpdb->postmeta} 
                                WHERE meta_key = '_download_count'
                            ");
                            echo $total_downloads ? number_format_i18n($total_downloads) : '0';
                        ?></span>
                        <span class="stat-label">تحميل</span>
                    </div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">مستخدم راضٍ</span>
                    </div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-number">4.9</span>
                        <span class="stat-label">تقييم عام</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
/* ═══════════════════════════════════════════════════
   🎨 جميع تأثيرات الصفحة الرئيسية + تحسينات جديدة
   ═══════════════════════════════════════════════════ */

/* إعدادات أساسية */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Cairo', sans-serif;
    line-height: 1.6;
    overflow-x: hidden;
    position: relative;
    min-height: 100vh;
}

/* ═══════════════════════════════════════════════════
   🌓 أيقونة تغيير المظهر - نفس التصميم من index.php
   ═══════════════════════════════════════════════════ */

.theme-toggle-sidebar {
    position: fixed;
    right: 30px;
    top: 50%;
    transform: translateY(-50%);
    z-index: 9999;
}

.theme-toggle-btn {
    width: 60px;
    height: 60px;
    border: none;
    border-radius: 50%;
    background: rgba(26, 26, 46, 0.9);
    border: 2px solid rgba(59, 130, 246, 0.3);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
    backdrop-filter: blur(20px);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
}

.theme-toggle-btn:hover {
    transform: scale(1.1);
    border-color: #3b82f6;
    box-shadow: 0 12px 40px rgba(59, 130, 246, 0.4);
}

.theme-toggle-btn:active {
    transform: scale(0.95);
}

.toggle-icon {
    position: relative;
    width: 24px;
    height: 24px;
    transition: all 0.3s ease;
}

.sun-icon,
.moon-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 18px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.sun-icon {
    color: #fbbf24;
    opacity: 1;
    transform: translate(-50%, -50%) rotate(0deg) scale(1);
}

.moon-icon {
    color: #60a5fa;
    opacity: 0;
    transform: translate(-50%, -50%) rotate(180deg) scale(0);
}

/* Dark mode */
body.dark-mode .sun-icon {
    opacity: 0;
    transform: translate(-50%, -50%) rotate(-180deg) scale(0);
}

body.dark-mode .moon-icon {
    opacity: 1;
    transform: translate(-50%, -50%) rotate(0deg) scale(1);
}

.toggle-ripple {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: radial-gradient(circle, rgba(59, 130, 246, 0.3) 0%, transparent 70%);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: all 0.6s ease;
    pointer-events: none;
}

.theme-toggle-btn:active .toggle-ripple {
    width: 120px;
    height: 120px;
}

/* تأثير الهالة */
.theme-toggle-btn::before {
    content: '';
    position: absolute;
    top: -5px;
    left: -5px;
    right: -5px;
    bottom: -5px;
    background: conic-gradient(from 0deg, transparent, rgba(59, 130, 246, 0.4), transparent);
    border-radius: 50%;
    opacity: 0;
    animation: toggleAura 3s ease-in-out infinite;
}

@keyframes toggleAura {
    0%, 100% { opacity: 0; transform: rotate(0deg); }
    50% { opacity: 1; transform: rotate(180deg); }
}

/* ═══════════════════════════════════════════════════
   🌌 نفس الخلفية المتحركة من الصفحة الرئيسية
   ═══════════════════════════════════════════════════ */

/* Canvas الجسيمات */
#particles-canvas {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    pointer-events: none;
}

/* خلفية Parallax */
.parallax-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 2;
    pointer-events: none;
}

.parallax-layer {
    position: absolute;
    width: 120%;
    height: 120%;
    background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 1px, transparent 1px);
    background-size: 50px 50px;
    opacity: 0.3;
    animation: parallaxFloat 20s ease-in-out infinite;
}

.parallax-layer:nth-child(1) { animation-delay: 0s; }
.parallax-layer:nth-child(2) { animation-delay: -7s; }
.parallax-layer:nth-child(3) { animation-delay: -14s; }

@keyframes parallaxFloat {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    25% { transform: translate(-10px, -10px) rotate(1deg); }
    50% { transform: translate(10px, -5px) rotate(-1deg); }
    75% { transform: translate(-5px, 10px) rotate(0.5deg); }
}

.cosmic-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    overflow: hidden;
    background: linear-gradient(135deg, #0a0a0f 0%, #1a1a2e 50%, #16213e 100%);
}

/* طبقة النجوم المتحركة */
.stars-field {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.stars-layer {
    position: absolute;
    top: 0;
    left: 0;
    width: 200%;
    height: 200%;
    background-repeat: repeat;
    animation: starFloat 50s linear infinite;
}

.stars-layer-1 {
    background-image: radial-gradient(2px 2px at 20px 30px, #ffffff, transparent),
                      radial-gradient(2px 2px at 40px 70px, #60a5fa, transparent),
                      radial-gradient(1px 1px at 90px 40px, #a78bfa, transparent);
    background-size: 200px 200px;
    animation-duration: 50s;
    opacity: 0.8;
}

.stars-layer-2 {
    background-image: radial-gradient(1px 1px at 130px 80px, #ffffff, transparent),
                      radial-gradient(2px 2px at 160px 30px, #34d399, transparent);
    background-size: 300px 300px;
    animation-duration: 70s;
    opacity: 0.6;
    animation-direction: reverse;
}

.stars-layer-3 {
    background-image: radial-gradient(1px 1px at 50px 100px, #fbbf24, transparent),
                      radial-gradient(1px 1px at 180px 50px, #ec4899, transparent);
    background-size: 250px 250px;
    animation-duration: 90s;
    opacity: 0.4;
}

/* السديم المتحرك */
.nebula-effects {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.nebula {
    position: absolute;
    border-radius: 50%;
    filter: blur(100px);
    opacity: 0.1;
    animation: nebulaFloat 20s ease-in-out infinite;
}

.nebula-1 {
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, #60a5fa 0%, transparent 70%);
    top: 10%;
    left: 20%;
    animation-delay: 0s;
}

.nebula-2 {
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, #a78bfa 0%, transparent 70%);
    top: 60%;
    right: 10%;
    animation-delay: -10s;
}

.nebula-3 {
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, #34d399 0%, transparent 70%);
    bottom: 20%;
    left: 60%;
    animation-delay: -5s;
}

/* الموجات الكونية */
.cosmic-waves {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.wave {
    position: absolute;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, transparent, rgba(96, 165, 250, 0.05), transparent);
    animation: waveMove 15s ease-in-out infinite;
}

.wave-1 { animation-delay: 0s; }
.wave-2 { animation-delay: -5s; }
.wave-3 { animation-delay: -10s; }

/* الجسيمات العائمة */
.floating-particles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: #60a5fa;
    border-radius: 50%;
    animation: particleFloat 20s ease-in-out infinite;
    opacity: 0.6;
}

.particle-1 { top: 20%; left: 10%; animation-delay: 0s; background: #60a5fa; }
.particle-2 { top: 50%; left: 80%; animation-delay: -4s; background: #a78bfa; }
.particle-3 { top: 80%; left: 30%; animation-delay: -8s; background: #34d399; }
.particle-4 { top: 30%; left: 70%; animation-delay: -12s; background: #fbbf24; }
.particle-5 { top: 70%; left: 50%; animation-delay: -16s; background: #ec4899; }

/* 🎨 أشكال خلفية إضافية */
.floating-shapes-enhanced {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 3;
}

.shape-1,
.shape-2,
.shape-3,
.shape-4 {
    position: absolute;
    border-radius: 50%;
    background: linear-gradient(45deg, rgba(59, 130, 246, 0.1), rgba(139, 92, 246, 0.1));
    animation: shapeFloat 15s ease-in-out infinite;
}

.shape-1 {
    width: 200px;
    height: 200px;
    top: 10%;
    left: 5%;
    animation-delay: 0s;
}

.shape-2 {
    width: 150px;
    height: 150px;
    top: 20%;
    right: 10%;
    animation-delay: -5s;
}

.shape-3 {
    width: 180px;
    height: 180px;
    bottom: 15%;
    left: 8%;
    animation-delay: -10s;
}

.shape-4 {
    width: 120px;
    height: 120px;
    bottom: 10%;
    right: 15%;
    animation-delay: -15s;
}

/* Dark Mode */
body.dark-mode {
    color: #ffffff;
}

/* Light Mode */
body.light-mode {
    color: #1f2937;
}

body.light-mode .cosmic-background {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 50%, #cbd5e1 100%);
}

body.light-mode .stars-layer-1 {
    background-image: radial-gradient(2px 2px at 20px 30px, #64748b, transparent),
                      radial-gradient(2px 2px at 40px 70px, #3b82f6, transparent),
                      radial-gradient(1px 1px at 90px 40px, #8b5cf6, transparent);
    opacity: 0.4;
}

body.light-mode .stars-layer-2 {
    background-image: radial-gradient(1px 1px at 130px 80px, #64748b, transparent),
                      radial-gradient(2px 2px at 160px 30px, #10b981, transparent);
    opacity: 0.3;
}

body.light-mode .stars-layer-3 {
    background-image: radial-gradient(1px 1px at 50px 100px, #f59e0b, transparent),
                      radial-gradient(1px 1px at 180px 50px, #ec4899, transparent);
    opacity: 0.2;
}

body.light-mode .nebula {
    opacity: 0.05;
}

body.light-mode .particle {
    opacity: 0.3;
}

body.light-mode .theme-toggle-btn {
    background: rgba(255, 255, 255, 0.95);
    border-color: rgba(59, 130, 246, 0.3);
}

body.light-mode .parallax-layer {
    background: radial-gradient(circle, rgba(59, 130, 246, 0.05) 1px, transparent 1px);
}

/* ═══════════════════════════════════════════════════
   🔄 تبديل نوع العرض
   ═══════════════════════════════════════════════════ */

.view-toggle-sidebar {
    position: fixed;
    right: 30px;
    top: 90px;
    z-index: 9998;
}

.view-toggle-container {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    background: rgba(26, 26, 46, 0.9);
    border-radius: 20px;
    padding: 0.5rem;
    border: 2px solid rgba(59, 130, 246, 0.3);
    backdrop-filter: blur(20px);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
}

body.light-mode .view-toggle-container {
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

.view-btn {
    width: 50px;
    height: 50px;
    border: none;
    border-radius: 15px;
    background: transparent;
    color: #8b9dc3;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

body.light-mode .view-btn {
    color: #64748b;
}

.view-btn:hover {
    color: #3b82f6;
    background: rgba(59, 130, 246, 0.1);
    transform: scale(1.1);
}

.view-btn.active {
    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
    color: #ffffff;
    box-shadow: 0 5px 20px rgba(59, 130, 246, 0.4);
}

/* ═══════════════════════════════════════════════════
   🏠 الصفحة الرئيسية
   ═══════════════════════════════════════════════════ */

.themes-archive-main {
    position: relative;
    z-index: 10;
    min-height: 100vh;
}

/* Hero Section */
.archive-hero {
    position: relative;
    padding: 8rem 0 4rem;
    text-align: center;
    overflow: hidden;
}

.container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem;
    position: relative;
    z-index: 5;
}

.hero-content {
    max-width: 800px;
    margin: 0 auto;
}

.archive-title {
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.title-icon {
    font-size: 3rem;
    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: iconFloat 3s ease-in-out infinite;
}

.title-text {
    background: linear-gradient(45deg, #3b82f6, #8b5cf6, #ec4899);
    background-size: 200% 200%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: gradientShift 4s ease infinite;
}

.title-count {
    font-size: 2rem;
    color: #3b82f6;
    font-weight: 600;
    padding: 0.5rem 1rem;
    background: rgba(59, 130, 246, 0.1);
    border-radius: 50px;
    border: 2px solid rgba(59, 130, 246, 0.3);
}

.archive-subtitle {
    font-size: 1.3rem;
    color: #b8b9ba;
    margin-bottom: 0;
    animation: fadeInUp 1s ease 0.5s both;
}

body.light-mode .archive-subtitle {
    color: #64748b;
}

/* ═══════════════════════════════════════════════════
   🎛️ نظام الفلترة المحدث
   ═══════════════════════════════════════════════════ */

.filters-section {
    padding: 3rem 0;
    position: relative;
    z-index: 10;
}

.filters-container {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    gap: 2rem;
    background: rgba(26, 26, 46, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 25px;
    padding: 2rem;
    border: 2px solid rgba(59, 130, 246, 0.2);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

body.light-mode .filters-container {
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
}

/* شريط البحث */
.search-container {
    width: 100%;
}

.search-wrapper {
    position: relative;
    width: 100%;
}

.search-input {
    width: 100%;
    padding: 1.2rem 3rem 1.2rem 1.5rem;
    background: rgba(0, 0, 17, 0.7);
    border: 2px solid rgba(59, 130, 246, 0.3);
    border-radius: 50px;
    color: #ffffff;
    font-size: 1.1rem;
    font-family: 'Cairo', sans-serif;
    transition: all 0.3s ease;
    outline: none;
}

body.light-mode .search-input {
    background: rgba(248, 250, 252, 0.9);
    color: #1f2937;
}

.search-input:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 20px rgba(59, 130, 246, 0.4);
    transform: scale(1.02);
}

.search-input::placeholder {
    color: #8b9dc3;
}

body.light-mode .search-input::placeholder {
    color: #64748b;
}

.search-icon,
.search-clear {
    position: absolute;
    left: 1.5rem;
    top: 50%;
    transform: translateY(-50%);
    color: #3b82f6;
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

.search-clear {
    color: #ec4899;
    cursor: pointer;
}

.search-clear:hover {
    transform: translateY(-50%) scale(1.2);
}

/* فلتر الفئات المحدث */
.category-filter-container {
    width: 100%;
}

.select-wrapper {
    position: relative;
    width: 100%;
}

.category-select,
.sort-select {
    width: 100%;
    padding: 1.2rem 3rem 1.2rem 1.5rem;
    background: rgba(0, 0, 17, 0.7);
    border: 2px solid rgba(59, 130, 246, 0.3);
    border-radius: 50px;
    color: #ffffff;
    font-size: 1.1rem;
    font-family: 'Cairo', sans-serif;
    cursor: pointer;
    outline: none;
    appearance: none;
    transition: all 0.3s ease;
}

body.light-mode .category-select,
body.light-mode .sort-select {
    background: rgba(248, 250, 252, 0.9);
    color: #1f2937;
}

.category-select:focus,
.sort-select:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 20px rgba(59, 130, 246, 0.4);
}

.select-icon {
    position: absolute;
    left: 1.5rem;
    top: 50%;
    transform: translateY(-50%);
    color: #3b82f6;
    font-size: 1.2rem;
    pointer-events: none;
    transition: all 0.3s ease;
}

.category-select:focus + .select-icon,
.sort-select:focus + .select-icon {
    transform: translateY(-50%) rotate(180deg);
}

/* مؤشر التحميل */
.loading-indicator {
    display: none;
    text-align: center;
    padding: 4rem 0;
    animation: fadeIn 0.5s ease;
}

.loading-indicator.active {
    display: block;
}

.loading-spinner {
    display: inline-block;
    position: relative;
    width: 80px;
    height: 80px;
    margin-bottom: 1rem;
}

.spinner-ring {
    box-sizing: border-box;
    display: block;
    position: absolute;
    width: 64px;
    height: 64px;
    margin: 8px;
    border: 6px solid;
    border-radius: 50%;
    animation: spinnerRotate 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
    border-color: #3b82f6 transparent transparent transparent;
}

.spinner-ring:nth-child(1) { animation-delay: -0.45s; border-color: #3b82f6 transparent transparent transparent; }
.spinner-ring:nth-child(2) { animation-delay: -0.3s; border-color: #8b5cf6 transparent transparent transparent; }
.spinner-ring:nth-child(3) { animation-delay: -0.15s; border-color: #ec4899 transparent transparent transparent; }

/* ═══════════════════════════════════════════════════
   📱 شبكة القوالب - Grid View المحسن
   ═══════════════════════════════════════════════════ */

.themes-grid-section {
    padding: 2rem 0 4rem;
    position: relative;
    z-index: 10;
}

.themes-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 2.5rem;
    padding: 2rem 0;
}

/* بطاقة القالب المحسنة */
.theme-card {
    position: relative;
    background: rgba(26, 26, 46, 0.8);
    border-radius: 25px;
    overflow: hidden;
    backdrop-filter: blur(20px);
    border: 2px solid rgba(59, 130, 246, 0.2);
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
    opacity: 1;
    transform: translateY(0) scale(1);
}

body.light-mode .theme-card {
    background: rgba(255, 255, 255, 0.9);
    border-color: rgba(59, 130, 246, 0.3);
}

.theme-card:hover {
    transform: translateY(-15px) scale(1.05);
    border-color: #3b82f6;
    box-shadow: 
        0 25px 80px rgba(59, 130, 246, 0.4),
        0 0 40px rgba(59, 130, 246, 0.2);
}

.card-inner {
    position: relative;
    height: 100%;
    overflow: hidden;
}

/* صورة القالب */
.card-image-container {
    position: relative;
    height: 240px;
    overflow: hidden;
}

.card-image {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
}

.theme-card:hover .card-image {
    transform: scale(1.1);
    filter: brightness(1.1) contrast(1.1);
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(
        135deg,
        rgba(59, 130, 246, 0.1) 0%,
        rgba(139, 92, 246, 0.1) 50%,
        rgba(236, 72, 153, 0.1) 100%
    );
    opacity: 0;
    transition: opacity 0.3s ease;
}

.theme-card:hover .image-overlay {
    opacity: 1;
}

/* شارات البطاقة */
.card-badges {
    position: absolute;
    top: 1rem;
    right: 1rem;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    z-index: 5;
}

.badge {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: rgba(0, 0, 17, 0.9);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    color: #ffffff;
    font-size: 0.85rem;
    font-weight: 600;
    border: 1px solid rgba(59, 130, 246, 0.3);
    transition: all 0.3s ease;
}

.version-badge {
    border-color: rgba(139, 92, 246, 0.5);
}

.downloads-badge {
    border-color: rgba(34, 197, 94, 0.5);
}

.badge i {
    font-size: 0.8rem;
}

/* محتوى البطاقة */
.card-content {
    padding: 1.5rem;
    position: relative;
    z-index: 3;
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1rem;
}

.theme-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #ffffff;
    line-height: 1.3;
    margin: 0;
    flex: 1;
    margin-left: 1rem;
}

body.light-mode .theme-title {
    color: #1f2937;
}

.theme-rating {
    display: flex;
    gap: 0.2rem;
    margin-top: 0.2rem;
}

.theme-rating i {
    color: #fbbf24;
    font-size: 0.9rem;
    transition: all 0.2s ease;
}

.theme-rating i.far {
    color: rgba(251, 191, 36, 0.3);
}

/* الكلمات المفتاحية العائمة */
.floating-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-bottom: 1rem;
    min-height: 2rem;
}

.floating-tag {
    display: inline-block;
    padding: 0.3rem 0.8rem;
    background: rgba(59, 130, 246, 0.1);
    border: 1px solid rgba(59, 130, 246, 0.3);
    border-radius: 15px;
    color: #3b82f6;
    font-size: 0.8rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.floating-tag:hover {
    background: rgba(59, 130, 246, 0.2);
    transform: translateY(-2px);
}

/* رابط البطاقة - مباشر بدون نصوص إضافية */
.card-link {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 10;
    text-decoration: none;
    color: inherit;
}

/* ═══════════════════════════════════════════════════
   🎬 العرض الشامل المُحسن - Showcase View
   ═══════════════════════════════════════════════════ */

.themes-showcase-section {
    position: relative;
    z-index: 10;
}

.showcase-container {
    height: 100vh;
    overflow: hidden;
    position: relative;
}

/* مؤشر الموضع */
.showcase-indicators {
    position: fixed;
    top: 50px;
    left: 50px;
    z-index: 9997;
    display: flex;
    align-items: center;
    gap: 1rem;
    background: rgba(26, 26, 46, 0.9);
    backdrop-filter: blur(20px);
    padding: 1rem 1.5rem;
    border-radius: 50px;
    border: 2px solid rgba(59, 130, 246, 0.3);
}

body.light-mode .showcase-indicators {
    background: rgba(255, 255, 255, 0.9);
}

.current-theme {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #ffffff;
    font-weight: 600;
    font-size: 1.1rem;
}

body.light-mode .current-theme {
    color: #1f2937;
}

.current-number {
    color: #3b82f6;
    font-size: 1.5rem;
}

.total-number {
    color: #8b9dc3;
}

body.light-mode .total-number {
    color: #64748b;
}

.progress-bar {
    width: 150px;
    height: 4px;
    background: rgba(59, 130, 246, 0.2);
    border-radius: 2px;
    overflow: hidden;
    margin-right: 1rem;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
    border-radius: 2px;
    transition: width 0.5s ease;
    width: 8.33%;
}

/* أزرار التنقل */
.showcase-navigation {
    position: fixed;
    left: 50px;
    top: 50%;
    transform: translateY(-50%);
    z-index: 9997;
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.nav-btn {
    width: 50px;
    height: 50px;
    background: rgba(26, 26, 46, 0.9);
    border: 2px solid rgba(59, 130, 246, 0.3);
    border-radius: 50%;
    color: #3b82f6;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    backdrop-filter: blur(20px);
    outline: none;
}

body.light-mode .nav-btn {
    background: rgba(255, 255, 255, 0.9);
}

.nav-btn:hover {
    border-color: #3b82f6;
    background: rgba(59, 130, 246, 0.1);
    transform: scale(1.1);
}

.nav-btn:active {
    transform: scale(0.95);
}

/* حاوي القوالب الشاملة */
.showcase-themes {
    height: 100vh;
    overflow-y: auto;
    scroll-snap-type: y mandatory;
    scroll-behavior: smooth;
    scrollbar-width: none;
    -ms-overflow-style: none;
}

.showcase-themes::-webkit-scrollbar {
    display: none;
}

/* قالب شامل منفرد */
.showcase-theme {
    height: 100vh;
    display: flex;
    align-items: center;
    position: relative;
    scroll-snap-align: start;
    padding: 2rem;
    overflow: hidden;
}

/* الخلفية المتحركة */
.showcase-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    filter: blur(8px) brightness(0.3);
    transform: scale(1.1);
    transition: all 1s ease;
}

.showcase-theme:hover .showcase-bg {
    filter: blur(5px) brightness(0.4);
    transform: scale(1.05);
}

.showcase-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(
        135deg,
        rgba(0, 0, 17, 0.8) 0%,
        rgba(26, 26, 46, 0.6) 50%,
        rgba(0, 0, 17, 0.9) 100%
    );
}

/* المحتوى الرئيسي */
.showcase-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    max-width: 1400px;
    margin: 0 auto;
    position: relative;
    z-index: 5;
    width: 100%;
    align-items: center;
}

/* الجزء الأيسر - معاينة القالب */
.showcase-left {
    display: flex;
    align-items: center;
    justify-content: center;
}

.showcase-preview {
    position: relative;
    width: 100%;
    max-width: 600px;
}

.preview-frame {
    background: rgba(26, 26, 46, 0.9);
    border-radius: 20px;
    padding: 1rem;
    border: 2px solid rgba(59, 130, 246, 0.3);
    backdrop-filter: blur(20px);
    box-shadow: 0 25px 80px rgba(0, 0, 0, 0.5);
    transition: all 0.5s ease;
}

body.light-mode .preview-frame {
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 25px 80px rgba(0, 0, 0, 0.1);
}

.showcase-theme:hover .preview-frame {
    transform: scale(1.05);
    border-color: #3b82f6;
    box-shadow: 0 35px 100px rgba(59, 130, 246, 0.3);
}

.preview-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem;
    border-bottom: 1px solid rgba(59, 130, 246, 0.2);
    margin-bottom: 1rem;
}

.preview-controls {
    display: flex;
    gap: 0.5rem;
}

.control {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    opacity: 0.7;
}

.control.red { background: #ef4444; }
.control.yellow { background: #fbbf24; }
.control.green { background: #10b981; }

.preview-url {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #8b9dc3;
    font-size: 0.9rem;
}

body.light-mode .preview-url {
    color: #64748b;
}

.preview-url i {
    color: #3b82f6;
}

.preview-screen {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    aspect-ratio: 16/10;
}

.preview-screen img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.5s ease;
}

.preview-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 17, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
    cursor: pointer;
}

.preview-screen:hover .preview-overlay {
    opacity: 1;
}

.preview-play {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
    color: #ffffff;
    text-align: center;
}

.preview-play i {
    font-size: 3rem;
    color: #3b82f6;
    animation: playPulse 2s ease-in-out infinite;
}

/* الجزء الأيمن - معلومات القالب */
.showcase-right {
    padding: 2rem;
}

.showcase-info {
    max-width: 500px;
}

/* رقم القالب */
.theme-number {
    margin-bottom: 1.5rem;
}

.number-bg {
    display: inline-block;
    font-size: 6rem;
    font-weight: 900;
    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    opacity: 0.7;
    line-height: 1;
}

/* عنوان القالب */
.showcase-title {
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 1.5rem;
    background: linear-gradient(45deg, #ffffff, #8b9dc3);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height: 1.2;
}

body.light-mode .showcase-title {
    background: linear-gradient(45deg, #1f2937, #64748b);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* وصف القالب */
.showcase-description {
    font-size: 1.3rem;
    color: #b8b9ba;
    margin-bottom: 2rem;
    line-height: 1.6;
}

body.light-mode .showcase-description {
    color: #64748b;
}

/* إحصائيات القالب */
.showcase-stats {
    display: flex;
    gap: 2rem;
    margin-bottom: 2rem;
    flex-wrap: wrap;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: rgba(26, 26, 46, 0.8);
    border-radius: 15px;
    border: 2px solid rgba(59, 130, 246, 0.2);
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
    min-width: 120px;
}

body.light-mode .stat-item {
    background: rgba(255, 255, 255, 0.9);
    border-color: rgba(59, 130, 246, 0.3);
}

.stat-item:hover {
    border-color: #3b82f6;
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
}

.stat-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
    border-radius: 10px;
    color: #ffffff;
}

.stat-content {
    display: flex;
    flex-direction: column;
}

.stat-value {
    font-size: 1.4rem;
    font-weight: 700;
    color: #ffffff;
    line-height: 1;
}

body.light-mode .stat-value {
    color: #1f2937;
}

.stat-label {
    font-size: 0.9rem;
    color: #8b9dc3;
}

body.light-mode .stat-label {
    color: #64748b;
}

/* التصنيفات */
.showcase-categories {
    margin-bottom: 2rem;
}

.showcase-categories h4 {
    color: #ffffff;
    margin-bottom: 1rem;
    font-size: 1.1rem;
}

body.light-mode .showcase-categories h4 {
    color: #1f2937;
}

.categories-list {
    display: flex;
    flex-wrap: wrap;
    gap: 0.8rem;
}

.category-tag {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.6rem 1rem;
    background: rgba(59, 130, 246, 0.1);
    border: 2px solid rgba(59, 130, 246, 0.3);
    border-radius: 20px;
    color: #3b82f6;
    font-size: 0.9rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.category-tag:hover {
    background: rgba(59, 130, 246, 0.2);
    border-color: #3b82f6;
    transform: translateY(-2px);
}

/* الأوسمة */
.showcase-tags {
    margin-bottom: 2rem;
}

.showcase-tags h4 {
    color: #ffffff;
    margin-bottom: 1rem;
    font-size: 1.1rem;
}

body.light-mode .showcase-tags h4 {
    color: #1f2937;
}

.tags-list {
    display: flex;
    flex-wrap: wrap;
    gap: 0.6rem;
}

.theme-tag {
    padding: 0.4rem 0.8rem;
    background: rgba(139, 92, 246, 0.1);
    border: 1px solid rgba(139, 92, 246, 0.3);
    border-radius: 15px;
    color: #8b5cf6;
    font-size: 0.85rem;
    transition: all 0.3s ease;
}

.theme-tag:hover {
    background: rgba(139, 92, 246, 0.2);
    transform: translateY(-2px);
}

/* أزرار العمل */
.showcase-actions {
    display: flex;
    gap: 1.5rem;
    margin-top: 2rem;
}

.btn-primary,
.btn-secondary {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.2rem 2rem;
    border: none;
    border-radius: 50px;
    font-size: 1.1rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    cursor: pointer;
}

.btn-primary {
    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
    color: #ffffff;
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(59, 130, 246, 0.6);
}

.btn-secondary {
    background: rgba(26, 26, 46, 0.8);
    color: #ffffff;
    border: 2px solid rgba(59, 130, 246, 0.3);
    backdrop-filter: blur(10px);
}

body.light-mode .btn-secondary {
    background: rgba(255, 255, 255, 0.9);
    color: #1f2937;
}

.btn-secondary:hover {
    border-color: #3b82f6;
    background: rgba(59, 130, 246, 0.1);
    transform: translateY(-3px);
}

/* ═══════════════════════════════════════════════════
   📊 الإحصائيات السريعة
   ═══════════════════════════════════════════════════ */

.quick-stats {
    padding: 4rem 0;
    position: relative;
    z-index: 10;
    background: rgba(26, 26, 46, 0.5);
    backdrop-filter: blur(20px);
    border-top: 2px solid rgba(59, 130, 246, 0.2);
}

body.light-mode .quick-stats {
    background: rgba(255, 255, 255, 0.5);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    max-width: 1000px;
    margin: 0 auto;
}

.quick-stats .stat-item {
    text-align: center;
    padding: 2rem;
    background: rgba(0, 0, 17, 0.7);
    border-radius: 20px;
    border: 2px solid rgba(59, 130, 246, 0.2);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    backdrop-filter: blur(10px);
}

body.light-mode .quick-stats .stat-item {
    background: rgba(255, 255, 255, 0.9);
    border-color: rgba(59, 130, 246, 0.3);
}

.quick-stats .stat-item:hover {
    transform: translateY(-10px);
    border-color: #3b82f6;
    box-shadow: 0 20px 60px rgba(59, 130, 246, 0.3);
}

.quick-stats .stat-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 1.5rem;
    color: #ffffff;
    box-shadow: 0 10px 30px rgba(59, 130, 246, 0.4);
}

.quick-stats .stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    color: #ffffff;
    display: block;
    margin-bottom: 0.5rem;
    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

body.light-mode .quick-stats .stat-number {
    color: #1f2937;
}

.quick-stats .stat-label {
    color: #8b9dc3;
    font-size: 1.1rem;
    font-weight: 500;
}

body.light-mode .quick-stats .stat-label {
    color: #64748b;
}

/* رسالة عدم وجود قوالب */
.no-themes-message {
    grid-column: 1 / -1;
    text-align: center;
    padding: 4rem 2rem;
    background: rgba(26, 26, 46, 0.8);
    border-radius: 25px;
    border: 2px dashed rgba(59, 130, 246, 0.3);
    backdrop-filter: blur(20px);
}

body.light-mode .no-themes-message {
    background: rgba(255, 255, 255, 0.9);
}

.no-themes-icon {
    font-size: 4rem;
    color: #3b82f6;
    margin-bottom: 1.5rem;
    opacity: 0.7;
}

.no-themes-message h3 {
    font-size: 1.8rem;
    color: #ffffff;
    margin-bottom: 1rem;
}

body.light-mode .no-themes-message h3 {
    color: #1f2937;
}

.no-themes-message p {
    color: #8b9dc3;
    font-size: 1.1rem;
}

body.light-mode .no-themes-message p {
    color: #64748b;
}

/* ═══════════════════════════════════════════════════
   🎭 الأنيميشن والحركة
   ═══════════════════════════════════════════════════ */

@keyframes starFloat {
    0% { transform: translateY(0) translateX(0); }
    100% { transform: translateY(-200px) translateX(-200px); }
}

@keyframes nebulaFloat {
    0%, 100% { 
        opacity: 0.1; 
        transform: scale(1) rotate(0deg); 
    }
    50% { 
        opacity: 0.15; 
        transform: scale(1.1) rotate(5deg); 
    }
}

@keyframes waveMove {
    0%, 100% { 
        transform: translateX(0) scaleY(1); 
        opacity: 0.05; 
    }
    50% { 
        transform: translateX(20px) scaleY(1.1); 
        opacity: 0.1; 
    }
}

@keyframes particleFloat {
    0%, 100% { 
        transform: translateY(0) scale(1); 
        opacity: 0.6; 
    }
    25% { 
        transform: translateY(-20px) scale(1.1); 
        opacity: 0.8; 
    }
    50% { 
        transform: translateY(-10px) scale(0.9); 
        opacity: 0.4; 
    }
    75% { 
        transform: translateY(-30px) scale(1.2); 
        opacity: 0.7; 
    }
}

@keyframes iconFloat {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

@keyframes fadeInUp {
    0% { opacity: 0; transform: translateY(30px); }
    100% { opacity: 1; transform: translateY(0); }
}

@keyframes fadeIn {
    0% { opacity: 0; }
    100% { opacity: 1; }
}

@keyframes spinnerRotate {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@keyframes playPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

@keyframes shapeFloat {
    0%, 100% { transform: translate(0, 0) scale(1) rotate(0deg); }
    25% { transform: translate(-20px, -20px) scale(1.1) rotate(90deg); }
    50% { transform: translate(20px, -10px) scale(0.9) rotate(180deg); }
    75% { transform: translate(-10px, 20px) scale(1.05) rotate(270deg); }
}

/* ═══════════════════════════════════════════════════
   📱 الاستجابة
   ═══════════════════════════════════════════════════ */

@media (max-width: 1200px) {
    .showcase-content {
        grid-template-columns: 1fr;
        gap: 2rem;
        text-align: center;
    }
    
    .showcase-left {
        order: 2;
    }
    
    .showcase-right {
        order: 1;
    }
    
    .filters-container {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
}

@media (max-width: 768px) {
    .container {
        padding: 0 1rem;
    }
    
    .archive-title {
        font-size: 2.5rem;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .title-count {
        font-size: 1.5rem;
    }
    
    .themes-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .filters-container {
        padding: 1.5rem;
        gap: 1.5rem;
        grid-template-columns: 1fr;
    }
    
    .showcase-stats {
        flex-direction: column;
        gap: 1rem;
    }
    
    .showcase-actions {
        flex-direction: column;
        gap: 1rem;
    }
    
    .showcase-title {
        font-size: 2.5rem;
    }
    
    .number-bg {
        font-size: 4rem;
    }
    
    .showcase-indicators {
        top: 20px;
        left: 20px;
        padding: 0.8rem 1rem;
    }
    
    .showcase-navigation {
        left: 20px;
    }
    
    .theme-toggle-sidebar {
        right: 20px;
        top: 20px;
    }
    
    .view-toggle-sidebar {
        right: 20px;
        top: 90px;
    }
    
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }
}

@media (max-width: 480px) {
    .archive-title {
        font-size: 2rem;
    }
    
    .title-icon {
        font-size: 2rem;
    }
    
    .title-count {
        font-size: 1.2rem;
        padding: 0.3rem 0.8rem;
    }
    
    .showcase-title {
        font-size: 2rem;
    }
    
    .number-bg {
        font-size: 3rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .theme-card {
        margin: 0 0.5rem;
    }
    
    .theme-toggle-btn {
        width: 50px;
        height: 50px;
    }
}

/* تحسينات للأداء */
.theme-card,
.showcase-theme {
    will-change: transform;
    backface-visibility: hidden;
    transform-style: preserve-3d;
}

.card-image,
.showcase-bg {
    will-change: transform;
    backface-visibility: hidden;
}

/* تحسينات للحركة المنخفضة */
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
    
    .cosmic-background,
    .stars-field,
    .nebula-effects,
    .cosmic-waves,
    .floating-particles {
        display: none;
    }
}

/* تحسينات للتباين العالي */
@media (prefers-contrast: high) {
    .theme-card {
        border-width: 3px;
    }
    
    .badge {
        border-width: 2px;
    }
}
</style>

<script>
// 🚀 JavaScript المتقدم لأرشيف القوالب - محدث ومحسن من index.php

document.addEventListener('DOMContentLoaded', function() {
    console.log('🎨 بدء تحميل نظام القوالب المتقدم...');
    
    // تهيئة جميع الوظائف بالترتيب الصحيح
    initParticles();
    initThemeSystem();
    initViewToggle();
    initAdvancedFiltering();
    initShowcaseNavigation();
    initKeyboardNavigation();
    initCardInteractions();
    initCosmicEffects();
    initMouseEffects();
    
    console.log('✅ نظام القوالب المتقدم جاهز للاستخدام!');
});

// ═══════════════════════════════════════════════════
// 🌓 نظام المظاهر المحسن - نفس وظائف index.php
// ═══════════════════════════════════════════════════
function initThemeSystem() {
    const themeToggle = document.getElementById('theme-toggle');
    const savedTheme = localStorage.getItem('theme') || 'dark';
    
    // تطبيق المظهر المحفوظ
    applyTheme(savedTheme);
    console.log('🌓 تم تطبيق المظهر:', savedTheme);
    
    if (themeToggle) {
        themeToggle.addEventListener('click', function() {
            const currentTheme = document.body.classList.contains('dark-mode') ? 'dark' : 'light';
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            // تأثير انتقال ناعم
            document.body.style.transition = 'all 0.5s cubic-bezier(0.4, 0, 0.2, 1)';
            
            applyTheme(newTheme);
            localStorage.setItem('theme', newTheme);
            
            triggerToggleRipple(this);
            console.log('🔄 تم تغيير المظهر إلى:', newTheme);
            
            // إعادة تعيين الانتقال
            setTimeout(() => {
                document.body.style.transition = '';
            }, 500);
        });
        
        console.log('✅ نظام تبديل المظهر مُفعل');
    } else {
        console.warn('⚠️ زر تبديل المظهر غير موجود');
    }
    
    function applyTheme(theme) {
        document.body.classList.remove('dark-mode', 'light-mode');
        document.body.classList.add(theme + '-mode');
        
        // تحديث meta theme-color
        let metaThemeColor = document.querySelector('meta[name="theme-color"]');
        if (!metaThemeColor) {
            metaThemeColor = document.createElement('meta');
            metaThemeColor.name = 'theme-color';
            document.head.appendChild(metaThemeColor);
        }
        
        metaThemeColor.content = theme === 'dark' ? '#0a0a0f' : '#f8fafc';
        
        // تحديث الجسيمات لتتناسب مع المظهر
        if (window.particleSystem) {
            window.particleSystem.updateTheme(theme);
        }
    }
    
    function triggerToggleRipple(button) {
        const ripple = button.querySelector('.toggle-ripple');
        if (ripple) {
            ripple.style.width = '120px';
            ripple.style.height = '120px';
            
            setTimeout(() => {
                ripple.style.width = '0';
                ripple.style.height = '0';
            }, 600);
        }
    }
}

// ⭐ نظام الجسيمات المتحركة المحسن - نفس index.php
function initParticles() {
    const canvas = document.getElementById('particles-canvas');
    if (!canvas) return;
    
    const ctx = canvas.getContext('2d');
    let particles = [];
    let animationId;
    
    // تحديد حجم Canvas
    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);
    
    // 🌟 فئة الجسيم المحسنة
    class Particle {
        constructor() {
            this.reset();
        }
        
        reset() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 4 + 1;
            this.speedX = (Math.random() - 0.5) * 1;
            this.speedY = (Math.random() - 0.5) * 1;
            this.color = this.getRandomColor();
            this.opacity = Math.random() * 0.6 + 0.3;
            this.pulse = Math.random() * 0.02 + 0.01;
            this.life = 1.0;
            this.decay = Math.random() * 0.005 + 0.001;
            this.angle = Math.random() * Math.PI * 2;
            this.angleSpeed = (Math.random() - 0.5) * 0.02;
        }
        
        getRandomColor() {
            const isDark = document.body.classList.contains('dark-mode');
            if (isDark) {
                const colors = [
                    `hsl(${200 + Math.random() * 60}, 80%, 65%)`,
                    `hsl(${250 + Math.random() * 60}, 80%, 65%)`,
                    `hsl(${300 + Math.random() * 60}, 80%, 65%)`
                ];
                return colors[Math.floor(Math.random() * colors.length)];
            } else {
                const colors = [
                    `hsl(${200 + Math.random() * 60}, 70%, 55%)`,
                    `hsl(${250 + Math.random() * 60}, 70%, 55%)`,
                    `hsl(${300 + Math.random() * 60}, 70%, 55%)`
                ];
                return colors[Math.floor(Math.random() * colors.length)];
            }
        }
        
        update() {
            this.x += this.speedX;
            this.y += this.speedY;
            this.angle += this.angleSpeed;
            
            // إعادة تدوير الجسيمات
            if (this.x > canvas.width) this.x = 0;
            if (this.x < 0) this.x = canvas.width;
            if (this.y > canvas.height) this.y = 0;
            if (this.y < 0) this.y = canvas.height;
            
            // تأثير النبض
            this.opacity += this.pulse;
            if (this.opacity > 0.8 || this.opacity < 0.2) {
                this.pulse *= -1;
            }
            
            // دورة الحياة
            this.life -= this.decay;
            if (this.life <= 0) {
                this.reset();
            }
        }
        
        draw() {
            ctx.save();
            ctx.globalAlpha = this.opacity * this.life;
            ctx.fillStyle = this.color;
            
            // رسم جسيم مع دوران
            ctx.translate(this.x, this.y);
            ctx.rotate(this.angle);
            
            ctx.beginPath();
            ctx.arc(0, 0, this.size, 0, Math.PI * 2);
            ctx.fill();
            
            // تأثير الهالة المحسن
            ctx.shadowBlur = 20;
            ctx.shadowColor = this.color;
            ctx.fill();
            
            ctx.restore();
        }
        
        updateTheme(theme) {
            this.color = this.getRandomColor();
        }
    }
    
    // إنشاء الجسيمات
    for (let i = 0; i < 150; i++) {
        particles.push(new Particle());
    }
    
    // نظام الجسيمات العالمي
    window.particleSystem = {
        updateTheme: function(theme) {
            particles.forEach(particle => particle.updateTheme(theme));
        }
    };
    
    // حلقة الرسم المحسنة
    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        particles.forEach(particle => {
            particle.update();
            particle.draw();
        });
        
        // رسم خطوط الاتصال المحسنة
        drawAdvancedConnections();
        
        animationId = requestAnimationFrame(animate);
    }
    
    // 🌐 رسم خطوط الاتصال المتقدمة
    function drawAdvancedConnections() {
        for (let i = 0; i < particles.length; i++) {
            for (let j = i + 1; j < particles.length; j++) {
                const dx = particles[i].x - particles[j].x;
                const dy = particles[i].y - particles[j].y;
                const distance = Math.sqrt(dx * dx + dy * dy);
                
                if (distance < 180) {
                    ctx.save();
                    const opacity = (180 - distance) / 180 * 0.5;
                    ctx.globalAlpha = opacity;
                    
                    // تدرج لوني للخط
                    const gradient = ctx.createLinearGradient(
                        particles[i].x, particles[i].y,
                        particles[j].x, particles[j].y
                    );
                    gradient.addColorStop(0, '#3b82f6');
                    gradient.addColorStop(0.5, '#8b5cf6');
                    gradient.addColorStop(1, '#ec4899');
                    
                    ctx.strokeStyle = gradient;
                    ctx.lineWidth = 1.5;
                    ctx.beginPath();
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(particles[j].x, particles[j].y);
                    ctx.stroke();
                    ctx.restore();
                }
            }
        }
    }
    
    animate();
    
    // تنظيف الذاكرة عند إلغاء تحميل الصفحة
    window.addEventListener('beforeunload', () => {
        if (animationId) {
            cancelAnimationFrame(animationId);
        }
    });
}

// ═══════════════════════════════════════════════════
// 🔄 نظام تبديل العرض المحسن
// ═══════════════════════════════════════════════════
function initViewToggle() {
    const gridBtn = document.getElementById('grid-view-btn');
    const showcaseBtn = document.getElementById('showcase-view-btn');
    const gridView = document.getElementById('grid-view');
    const showcaseView = document.getElementById('showcase-view');
    
    let currentView = 'grid';
    
    if (gridBtn && showcaseBtn && gridView && showcaseView) {
        gridBtn.addEventListener('click', () => switchView('grid'));
        showcaseBtn.addEventListener('click', () => switchView('showcase'));
        
        console.log('✅ نظام تبديل العرض مُفعل');
    } else {
        console.warn('⚠️ عناصر تبديل العرض غير موجودة');
    }
    
    function switchView(view) {
        if (currentView === view) return;
        
        console.log('🔄 تبديل العرض إلى:', view);
        currentView = view;
        
        // تحديث الأزرار
        document.querySelectorAll('.view-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        
        if (view === 'grid') {
            gridBtn.classList.add('active');
            showGridView();
        } else {
            showcaseBtn.classList.add('active');
            showShowcaseView();
        }
    }
    
    function showGridView() {
        // إخفاء العرض الشامل
        showcaseView.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
        showcaseView.style.opacity = '0';
        showcaseView.style.transform = 'scale(0.9)';
        
        setTimeout(() => {
            showcaseView.style.display = 'none';
            
            // إظهار الشبكة
            gridView.style.display = 'block';
            gridView.style.opacity = '0';
            gridView.style.transform = 'scale(1.1)';
            
            setTimeout(() => {
                gridView.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
                gridView.style.opacity = '1';
                gridView.style.transform = 'scale(1)';
                
                // إعادة تشغيل أنيميشن البطاقات
                triggerCardsAnimation();
            }, 50);
        }, 400);
    }
    
    function showShowcaseView() {
        // إخفاء الشبكة
        gridView.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
        gridView.style.opacity = '0';
        gridView.style.transform = 'scale(1.1)';
        
        setTimeout(() => {
            gridView.style.display = 'none';
            
            // إظهار العرض الشامل
            showcaseView.style.display = 'block';
            showcaseView.style.opacity = '0';
            showcaseView.style.transform = 'scale(0.9)';
            
            setTimeout(() => {
                showcaseView.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
                showcaseView.style.opacity = '1';
                showcaseView.style.transform = 'scale(1)';
                
                // تهيئة العرض الشامل
                initShowcaseScroll();
            }, 50);
        }, 400);
    }
    
    function triggerCardsAnimation() {
        const cards = document.querySelectorAll('.theme-card:not([style*="display: none"])');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(50px) scale(0.9)';
            
            setTimeout(() => {
                card.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0) scale(1)';
            }, index * 100);
        });
    }
}

// ═══════════════════════════════════════════════════
// 🎛️ نظام الفلترة المتقدم - مع القائمة المنسدلة
// ═══════════════════════════════════════════════════
function initAdvancedFiltering() {
    const searchInput = document.getElementById('theme-search');
    const searchClear = document.querySelector('.search-clear');
    const searchIcon = document.querySelector('.search-icon');
    const categorySelect = document.getElementById('category-filter');
    const sortSelect = document.getElementById('theme-sort');
    const loadingIndicator = document.getElementById('loading-indicator');
    
    let currentFilter = 'all';
    let currentSort = 'date';
    let searchTerm = '';
    
    console.log('🎛️ تهيئة نظام الفلترة...');
    
    // البحث المباشر
    if (searchInput) {
        searchInput.addEventListener('input', debounce(function(e) {
            searchTerm = e.target.value.toLowerCase().trim();
            
            if (searchTerm && searchClear && searchIcon) {
                searchClear.style.display = 'block';
                searchIcon.style.display = 'none';
            } else if (searchClear && searchIcon) {
                searchClear.style.display = 'none';
                searchIcon.style.display = 'block';
            }
            
            applyFilters();
        }, 300));
        
        console.log('✅ البحث المباشر مُفعل');
    }
    
    // مسح البحث
    if (searchClear) {
        searchClear.addEventListener('click', function() {
            if (searchInput) {
                searchInput.value = '';
                searchTerm = '';
                this.style.display = 'none';
                if (searchIcon) searchIcon.style.display = 'block';
                applyFilters();
            }
        });
    }
    
    // فلتر الفئات
    if (categorySelect) {
        categorySelect.addEventListener('change', function() {
            currentFilter = this.value;
            console.log('🏷️ تم اختيار فلتر:', currentFilter);
            applyFilters();
        });
        
        console.log('✅ فلتر الفئات مُفعل');
    }
    
    // ترتيب النتائج
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            currentSort = this.value;
            console.log('🔄 تم تغيير الترتيب إلى:', currentSort);
            applyFilters();
        });
    }
    
    function applyFilters() {
        console.log('🔍 تطبيق الفلاتر - البحث:', searchTerm, 'الفئة:', currentFilter, 'الترتيب:', currentSort);
        
        showLoading();
        
        setTimeout(() => {
            // تطبيق الفلترة على Grid View
            applyGridFilters();
            
            // تطبيق الفلترة على Showcase View
            applyShowcaseFilters();
            
            hideLoading();
        }, 300);
    }
    
    function applyGridFilters() {
        const cards = document.querySelectorAll('.theme-card');
        let visibleCards = [];
        
        cards.forEach(card => {
            const categories = card.dataset.categories || '';
            const name = (card.dataset.name || '').toLowerCase();
            const downloads = parseInt(card.dataset.downloads) || 0;
            const date = card.dataset.date || '';
            
            let isVisible = true;
            
            // فلترة الفئة
            if (currentFilter !== 'all' && !categories.includes(currentFilter)) {
                isVisible = false;
            }
            
            // فلترة البحث
            if (searchTerm && !name.includes(searchTerm)) {
                isVisible = false;
            }
            
            if (isVisible) {
                visibleCards.push({
                    element: card,
                    name: name,
                    downloads: downloads,
                    date: date
                });
            }
        });
        
        // ترتيب النتائج
        visibleCards.sort((a, b) => {
            switch (currentSort) {
                case 'name':
                    return a.name.localeCompare(b.name, 'ar');
                case 'popularity':
                case 'downloads':
                    return b.downloads - a.downloads;
                case 'date':
                default:
                    return new Date(b.date) - new Date(a.date);
            }
        });
        
        // إخفاء جميع البطاقات أولاً
        cards.forEach(card => {
            card.style.display = 'none';
            card.style.opacity = '0';
            card.style.transform = 'translateY(50px) scale(0.9)';
        });
        
        // إظهار البطاقات المفلترة
        if (visibleCards.length > 0) {
            hideNoResultsMessage();
            visibleCards.forEach((item, index) => {
                setTimeout(() => {
                    item.element.style.display = 'block';
                    item.element.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                    item.element.style.opacity = '1';
                    item.element.style.transform = 'translateY(0) scale(1)';
                }, index * 100);
            });
            console.log('✅ تم عرض', visibleCards.length, 'قالب في Grid View');
        } else {
            showNoResultsMessage();
            console.log('⚠️ لا توجد نتائج في Grid View');
        }
    }
    
    function applyShowcaseFilters() {
        const showcaseThemes = document.querySelectorAll('.showcase-theme');
        let visibleThemes = [];
        
        showcaseThemes.forEach(theme => {
            const categories = theme.dataset.categories || '';
            const name = (theme.dataset.name || '').toLowerCase();
            const downloads = parseInt(theme.dataset.downloads) || 0;
            const date = theme.dataset.date || '';
            
            let isVisible = true;
            
            // فلترة الفئة
            if (currentFilter !== 'all' && !categories.includes(currentFilter)) {
                isVisible = false;
            }
            
            // فلترة البحث
            if (searchTerm && !name.includes(searchTerm)) {
                isVisible = false;
            }
            
            if (isVisible) {
                visibleThemes.push({
                    element: theme,
                    name: name,
                    downloads: downloads,
                    date: date
                });
            }
        });
        
        // ترتيب النتائج
        visibleThemes.sort((a, b) => {
            switch (currentSort) {
                case 'name':
                    return a.name.localeCompare(b.name, 'ar');
                case 'popularity':
                case 'downloads':
                    return b.downloads - a.downloads;
                case 'date':
                default:
                    return new Date(b.date) - new Date(a.date);
            }
        });
        
        // إخفاء جميع القوالب أولاً
        showcaseThemes.forEach(theme => {
            theme.style.display = 'none';
        });
        
        // إظهار القوالب المفلترة
        if (visibleThemes.length > 0) {
            visibleThemes.forEach((item, index) => {
                item.element.style.display = 'flex';
                item.element.dataset.themeIndex = index + 1;
            });
            
            // تحديث مؤشر العدد
            updateShowcaseIndicators(visibleThemes.length);
            console.log('✅ تم عرض', visibleThemes.length, 'قالب في Showcase View');
        }
        
        // إعادة تعيين التمرير للبداية
        const showcaseContainer = document.querySelector('.showcase-themes');
        if (showcaseContainer) {
            showcaseContainer.scrollTop = 0;
        }
    }
    
    function showLoading() {
        if (loadingIndicator) {
            loadingIndicator.classList.add('active');
        }
    }
    
    function hideLoading() {
        if (loadingIndicator) {
            loadingIndicator.classList.remove('active');
        }
    }
    
    function showNoResultsMessage() {
        const themesGrid = document.getElementById('themes-grid');
        let noMessage = document.querySelector('.no-themes-message');
        
        if (!noMessage && themesGrid) {
            noMessage = document.createElement('div');
            noMessage.className = 'no-themes-message';
            noMessage.innerHTML = `
                <div class="no-themes-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h3>لم يتم العثور على قوالب</h3>
                <p>جرب تغيير معايير البحث أو الفلترة</p>
            `;
            themesGrid.appendChild(noMessage);
        } else if (noMessage) {
            noMessage.style.display = 'block';
        }
    }
    
    function hideNoResultsMessage() {
        const noMessage = document.querySelector('.no-themes-message');
        if (noMessage) {
            noMessage.style.display = 'none';
        }
    }
    
    function updateShowcaseIndicators(totalCount) {
        const totalNumber = document.querySelector('.total-number');
        const progressFill = document.querySelector('.progress-fill');
        
        if (totalNumber) {
            totalNumber.textContent = totalCount;
        }
        
        if (progressFill && totalCount > 0) {
            const percentage = (1 / totalCount) * 100;
            progressFill.style.width = percentage + '%';
        }
    }
    
    // Debounce function
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
}

// ═══════════════════════════════════════════════════
// 🎬 تنقل العرض الشامل المحسن
// ═══════════════════════════════════════════════════
function initShowcaseNavigation() {
    let currentThemeIndex = 0;
    
    function initShowcaseScroll() {
        const showcaseContainer = document.querySelector('.showcase-themes');
        const currentNumber = document.querySelector('.current-number');
        const progressFill = document.querySelector('.progress-fill');
        const prevBtn = document.getElementById('prevTheme');
        const nextBtn = document.getElementById('nextTheme');
        
        if (showcaseContainer) {
            // مراقبة التمرير
            showcaseContainer.addEventListener('scroll', debounce(function() {
                updateCurrentTheme();
            }, 100));
            
            // أزرار التنقل
            if (prevBtn) {
                prevBtn.addEventListener('click', () => scrollToPrevTheme());
            }
            
            if (nextBtn) {
                nextBtn.addEventListener('click', () => scrollToNextTheme());
            }
            
            // تحديث المؤشر الأولي
            updateIndicators();
            console.log('🎬 تم تفعيل تنقل العرض الشامل');
        }
        
        function updateCurrentTheme() {
            const visibleThemes = document.querySelectorAll('.showcase-theme:not([style*="display: none"])');
            const scrollTop = showcaseContainer.scrollTop;
            const containerHeight = showcaseContainer.clientHeight;
            
            const newThemeIndex = Math.round(scrollTop / containerHeight);
            
            if (newThemeIndex !== currentThemeIndex && newThemeIndex < visibleThemes.length && newThemeIndex >= 0) {
                currentThemeIndex = newThemeIndex;
                updateIndicators();
                console.log('📍 انتقل إلى القالب رقم:', currentThemeIndex + 1);
            }
        }
        
        function updateIndicators() {
            const currentNumber = document.querySelector('.current-number');
            const progressFill = document.querySelector('.progress-fill');
            const visibleThemes = document.querySelectorAll('.showcase-theme:not([style*="display: none"])');
            const totalThemes = visibleThemes.length;
            
            if (currentNumber) {
                currentNumber.textContent = currentThemeIndex + 1;
            }
            
            if (progressFill && totalThemes > 0) {
                const percentage = ((currentThemeIndex + 1) / totalThemes) * 100;
                progressFill.style.width = percentage + '%';
            }
        }
        
        function scrollToNextTheme() {
            const visibleThemes = document.querySelectorAll('.showcase-theme:not([style*="display: none"])');
            if (currentThemeIndex < visibleThemes.length - 1) {
                const containerHeight = showcaseContainer.clientHeight;
                const nextScroll = (currentThemeIndex + 1) * containerHeight;
                showcaseContainer.scrollTo({ top: nextScroll, behavior: 'smooth' });
            }
        }
        
        function scrollToPrevTheme() {
            if (currentThemeIndex > 0) {
                const containerHeight = showcaseContainer.clientHeight;
                const prevScroll = (currentThemeIndex - 1) * containerHeight;
                showcaseContainer.scrollTo({ top: prevScroll, behavior: 'smooth' });
            }
        }
    }
    
    // تصدير الدالة للاستخدام الخارجي
    window.initShowcaseScroll = initShowcaseScroll;
    
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    console.log('✅ نظام تنق
