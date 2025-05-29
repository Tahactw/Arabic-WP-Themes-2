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

<!-- العناصر العائمة مثل الصفحة الرئيسية -->
<div class="floating-elements">
    <!-- عناصر متحركة -->
    <div class="floating-icon" data-icon="🎨"></div>
    <div class="floating-icon" data-icon="📱"></div>
    <div class="floating-icon" data-icon="💻"></div>
    <div class="floating-icon" data-icon="🚀"></div>
    <div class="floating-icon" data-icon="⭐"></div>
    <div class="floating-icon" data-icon="🎯"></div>
    
    <!-- حروف عربية -->
    <div class="floating-letter">ق</div>
    <div class="floating-letter">و</div>
    <div class="floating-letter">ا</div>
    <div class="floating-letter">ل</div>
    <div class="floating-letter">ب</div>
</div>

<!-- 🌓 نفس أيقونة تغيير المظهر من الصفحة الرئيسية -->
<div class="theme-toggle-sidebar">
    <button id="theme-toggle" class="theme-toggle-btn" title="تغيير المظهر">
        <div class="toggle-icon">
            <i class="fas fa-sun sun-icon"></i>
            <i class="fas fa-moon moon-icon"></i>
        </div>
        <div class="toggle-ripple"></div>
    </button>
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
                    
                    <!-- رابط مخفي للقالب -->
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
   🎨 نفس تأثيرات الصفحة الرئيسية + تحسينات جديدة
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
    background: #000011;
    color: #ffffff;
}

/* ═══════════════════════════════════════════════════
   🌌 نفس الخلفية المتحركة من الصفحة الرئيسية
   ═══════════════════════════════════════════════════ */

.cosmic-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
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

/* Canvas الجسيمات */
#particles-canvas {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 2;
    pointer-events: none;
}

/* خلفية Parallax */
.parallax-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 3;
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

/* العناصر العائمة */
.floating-elements {
    position: fixed;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 3;
}

.floating-icon,
.floating-letter {
    position: absolute;
    font-size: 2rem;
    color: rgba(59, 130, 246, 0.7);
    animation: floatAnimation 15s ease-in-out infinite;
    opacity: 0.6;
    pointer-events: none;
}

.floating-letter {
    font-family: 'Cairo', sans-serif;
    font-weight: 800;
    color: rgba(139, 92, 246, 0.6);
}

.floating-icon:nth-child(1) { top: 20%; left: 10%; animation-delay: 0.2s; }
.floating-icon:nth-child(2) { top: 30%; right: 15%; animation-delay: 0.4s; }
.floating-icon:nth-child(3) { bottom: 20%; left: 20%; animation-delay: 0.6s; }
.floating-icon:nth-child(4) { bottom: 30%; right: 10%; animation-delay: 0.8s; }
.floating-icon:nth-child(5) { top: 15%; left: 50%; animation-delay: 1s; }
.floating-icon:nth-child(6) { bottom: 15%; left: 50%; animation-delay: 1.2s; }

.floating-letter:nth-child(7) { top: 25%; left: 30%; animation-delay: 0.3s; }
.floating-letter:nth-child(8) { top: 35%; right: 25%; animation-delay: 0.5s; }
.floating-letter:nth-child(9) { bottom: 25%; left: 35%; animation-delay: 0.7s; }
.floating-letter:nth-child(10) { bottom: 35%; right: 30%; animation-delay: 0.9s; }
.floating-letter:nth-child(11) { top: 10%; right: 50%; animation-delay: 1.1s; }

/* 🌓 نفس أيقونة تغيير المظهر من الصفحة الرئيسية */
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

/* Dark Mode */
body.dark-mode {
    color: #ffffff;
}

/* Light Mode */
body.light-mode {
    color: #1f2937;
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
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
    top: 30px;
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

/* بطاقة القالب - محسنة للتفاعل المباشر */
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
    padding: 0.3rem 0