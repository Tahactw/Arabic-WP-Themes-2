        transparent 0%,
        var(--category-color, rgba(59, 130, 246, 0.1)) 50%,
        transparent 100%
    );
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 1;
}

.category-card:hover .category-hover-effect {
    opacity: 1;
}

/* Modal المعاينة */
.category-preview-modal {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem;
}

.modal-backdrop {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(10px);
    cursor: pointer;
}

.modal-content {
    position: relative;
    background: rgba(26, 26, 46, 0.95);
    border-radius: 20px;
    max-width: 600px;
    width: 100%;
    max-height: 80vh;
    overflow: hidden;
    border: 2px solid rgba(59, 130, 246, 0.3);
    box-shadow: 0 30px 100px rgba(0, 0, 0, 0.5);
    animation: modalSlideIn 0.4s ease;
}

body.light-mode .modal-content {
    background: rgba(255, 255, 255, 0.95);
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem 2rem;
    border-bottom: 2px solid rgba(59, 130, 246, 0.2);
}

.modal-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #ffffff;
    margin: 0;
}

body.light-mode .modal-title {
    color: #1f2937;
}

.modal-close {
    width: 40px;
    height: 40px;
    border: none;
    background: rgba(239, 68, 68, 0.1);
    border-radius: 10px;
    color: #ef4444;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
}

.modal-close:hover {
    background: rgba(239, 68, 68, 0.2);
    transform: scale(1.1);
}

.modal-body {
    padding: 2rem;
    max-height: 60vh;
    overflow-y: auto;
}

/* Loading Spinner للمعاينة */
.preview-loading {
    text-align: center;
    padding: 3rem 0;
    color: #8b9dc3;
}

body.light-mode .preview-loading {
    color: #64748b;
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

.spinner-ring:nth-child(1) { animation-delay: -0.45s; }
.spinner-ring:nth-child(2) { animation-delay: -0.3s; border-color: #8b5cf6 transparent transparent transparent; }
.spinner-ring:nth-child(3) { animation-delay: -0.15s; border-color: #ec4899 transparent transparent transparent; }

/* إحصائيات الفئات */
.categories-statistics {
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 2px solid rgba(59, 130, 246, 0.2);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
}

.stat-card {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.5rem;
    background: rgba(0, 0, 17, 0.7);
    border-radius: 15px;
    border: 2px solid rgba(59, 130, 246, 0.2);
    transition: all 0.3s ease;
}

body.light-mode .stat-card {
    background: rgba(255, 255, 255, 0.9);
    border-color: rgba(59, 130, 246, 0.3);
}

.stat-card:hover {
    border-color: #3b82f6;
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(59, 130, 246, 0.3);
}

.stat-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    font-size: 1.3rem;
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
}

.stat-content {
    flex: 1;
}

.stat-number {
    display: block;
    font-size: 1.6rem;
    font-weight: 800;
    color: #ffffff;
    line-height: 1.2;
    margin-bottom: 0.3rem;
}

body.light-mode .stat-number {
    color: #1f2937;
}

.stat-label {
    color: #8b9dc3;
    font-size: 0.9rem;
    font-weight: 600;
}

body.light-mode .stat-label {
    color: #64748b;
}

/* رسالة عدم وجود فئات */
.no-categories-message {
    grid-column: 1 / -1;
    text-align: center;
    padding: 4rem 2rem;
    background: rgba(0, 0, 17, 0.5);
    border-radius: 20px;
    border: 2px dashed rgba(59, 130, 246, 0.3);
}

body.light-mode .no-categories-message {
    background: rgba(248, 250, 252, 0.7);
}

.no-categories-icon {
    font-size: 4rem;
    color: #3b82f6;
    margin-bottom: 1.5rem;
    opacity: 0.7;
}

.no-categories-message h4 {
    font-size: 1.5rem;
    color: #ffffff;
    margin-bottom: 1rem;
}

body.light-mode .no-categories-message h4 {
    color: #1f2937;
}

.no-categories-message p {
    color: #8b9dc3;
    font-size: 1.1rem;
}

body.light-mode .no-categories-message p {
    color: #64748b;
}

/* الأنيميشن */
@keyframes slideDown {
    0% {
        opacity: 0;
        transform: translateY(-30px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes modalSlideIn {
    0% {
        opacity: 0;
        transform: scale(0.8) translateY(-50px);
    }
    100% {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

@keyframes progressShine {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(200%); }
}

@keyframes spinnerRotate {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* الاستجابة */
@media (max-width: 768px) {
    .advanced-categories-container {
        padding: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .header-content {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }
    
    .filter-tabs {
        justify-content: center;
    }
    
    .categories-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .category-actions {
        flex-direction: column;
    }
    
    .modal-content {
        margin: 1rem;
        max-height: 90vh;
    }
    
    .modal-header {
        padding: 1rem 1.5rem;
    }
    
    .modal-body {
        padding: 1.5rem;
    }
}

@media (max-width: 480px) {
    .header-title h3 {
        font-size: 1.3rem;
    }
    
    .filter-tab {
        padding: 0.8rem 1rem;
        font-size: 0.9rem;
    }
    
    .category-card-inner {
        padding: 1rem;
    }
    
    .category-icon {
        width: 45px;
        height: 45px;
        font-size: 1.2rem;
    }
    
    .count-number {
        font-size: 1.3rem;
    }
    
    .category-title {
        font-size: 1.2rem;
    }
}

/* تحسينات للأداء */
.category-card,
.modal-content {
    will-change: transform;
    backface-visibility: hidden;
    transform-style: preserve-3d;
}

/* دعم الحركة المنخفضة */
@media (prefers-reduced-motion: reduce) {
    .category-card,
    .filter-tab,
    .stat-card,
    .modal-content {
        animation: none !important;
        transition: none !important;
    }
    
    .progress-fill::after {
        animation: none !important;
    }
}

/* تحسينات للتباين العالي */
@media (prefers-contrast: high) {
    .category-card {
        border-width: 3px;
    }
    
    .filter-tab {
        border-width: 3px;
    }
    
    .category-count-badge {
        border-width: 3px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    initAdvancedCategories();
});

function initAdvancedCategories() {
    console.log('📂 تهيئة نظام الفئات المتقدم...');
    
    const filterTabs = document.querySelectorAll('.filter-tab');
    const showAllBtn = document.getElementById('show-all-categories');
    const detailedSection = document.getElementById('detailed-categories');
    const categoryCards = document.querySelectorAll('.category-card');
    const selectButtons = document.querySelectorAll('.btn-select-category');
    const previewButtons = document.querySelectorAll('.btn-preview-category');
    const previewModal = document.getElementById('category-preview-modal');
    const modalBackdrop = document.getElementById('modal-backdrop');
    const modalClose = document.getElementById('modal-close');
    
    let currentFilter = 'all';
    let isDetailedVisible = false;
    
    // تبديل التبويبات السريعة
    filterTabs.forEach(tab => {
        if (!tab.classList.contains('show-all-btn')) {
            tab.addEventListener('click', function() {
                const filter = this.dataset.filter;
                selectFilter(filter, this);
            });
        }
    });
    
    // عرض جميع الفئات
    if (showAllBtn && detailedSection) {
        showAllBtn.addEventListener('click', function() {
            toggleDetailedView();
        });
    }
    
    // أزرار تحديد الفئة
    selectButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation();
            const category = this.dataset.category;
            selectFilter(category);
            
            // تأثير بصري للنقر
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });
    
    // أزرار المعاينة
    previewButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation();
            const category = this.dataset.category;
            showCategoryPreview(category);
        });
    });
    
    // إغلاق المعاينة
    if (modalClose && modalBackdrop) {
        modalClose.addEventListener('click', closeCategoryPreview);
        modalBackdrop.addEventListener('click', closeCategoryPreview);
    }
    
    // إغلاق المعاينة بـ ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && previewModal && previewModal.style.display !== 'none') {
            closeCategoryPreview();
        }
    });
    
    function selectFilter(filter, tabElement = null) {
        console.log('📂 اختيار فلتر الفئة:', filter);
        
        currentFilter = filter;
        
        // تحديث التبويبات
        filterTabs.forEach(tab => {
            tab.classList.remove('active');
        });
        
        if (tabElement) {
            tabElement.classList.add('active');
        } else {
            // البحث عن التبويب المناسب
            const targetTab = document.querySelector(`[data-filter="${filter}"]`);
            if (targetTab) {
                targetTab.classList.add('active');
            }
        }
        
        // تطبيق الفلتر على النظام الرئيسي
        if (window.applyMainFilter) {
            window.applyMainFilter('category', filter);
        }
        
        // تأثير بصري
        animateFilterChange();
    }
    
    function toggleDetailedView() {
        if (!detailedSection) return;
        
        isDetailedVisible = !isDetailedVisible;
        
        if (isDetailedVisible) {
            detailedSection.style.display = 'block';
            showAllBtn.innerHTML = `
                <i class="fas fa-chevron-up"></i>
                <span>إخفاء</span>
            `;
            
            // تأثير ظهور البطاقات
            setTimeout(() => {
                animateCategoryCards();
            }, 100);
        } else {
            detailedSection.style.display = 'none';
            showAllBtn.innerHTML = `
                <i class="fas fa-ellipsis-h"></i>
                <span>المزيد</span>
            `;
        }
        
        console.log('📂 تبديل العرض التفصيلي:', isDetailedVisible);
    }
    
    function animateCategoryCards() {
        categoryCards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px) scale(0.9)';
            
            setTimeout(() => {
                card.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0) scale(1)';
            }, index * 100);
        });
    }
    
    function animateFilterChange() {
        // إضافة تأثير موجة للإشارة لتغيير الفلتر
        const container = document.querySelector('.advanced-categories-container');
        if (container) {
            container.style.transform = 'scale(1.02)';
            setTimeout(() => {
                container.style.transform = '';
            }, 200);
        }
    }
    
    function showCategoryPreview(category) {
        console.log('👀 معاينة الفئة:', category);
        
        if (!previewModal) return;
        
        const modalTitle = document.getElementById('modal-title');
        const modalBody = document.getElementById('modal-body');
        
        // إعداد العنوان
        if (modalTitle) {
            modalTitle.textContent = `معاينة فئة: ${getCategoryName(category)}`;
        }
        
        // إظهار المودال
        previewModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        
        // عرض شاشة التحميل
        if (modalBody) {
            modalBody.innerHTML = `
                <div class="preview-loading">
                    <div class="loading-spinner">
                        <div class="spinner-ring"></div>
                        <div class="spinner-ring"></div>
                        <div class="spinner-ring"></div>
                    </div>
                    <span>جاري تحميل معاينة الفئة...</span>
                </div>
            `;
        }
        
        // محاكاة تحميل المعاينة
        setTimeout(() => {
            loadCategoryPreview(category);
        }, 1500);
    }
    
    function loadCategoryPreview(category) {
        const modalBody = document.getElementById('modal-body');
        if (!modalBody) return;
        
        // محاكاة محتوى المعاينة
        const previewContent = generatePreviewContent(category);
        modalBody.innerHTML = previewContent;
        
        console.log('✅ تم تحميل معاينة الفئة:', category);
    }
    
    function generatePreviewContent(category) {
        // محاكاة قوالب الفئة
        const sampleThemes = [
            { name: 'قالب عصري للأعمال', rating: 5, downloads: 1250 },
            { name: 'قالب متجاوب متطور', rating: 4, downloads: 890 },
            { name: 'قالب احترافي أنيق', rating: 5, downloads: 2100 },
            { name: 'قالب حديث وسريع', rating: 4, downloads: 650 }
        ];
        
        return `
            <div class="category-preview-content">
                <div class="preview-header">
                    <div class="preview-stats">
                        <div class="preview-stat">
                            <i class="fas fa-palette"></i>
                            <span>${sampleThemes.length} قوالب</span>
                        </div>
                        <div class="preview-stat">
                            <i class="fas fa-star"></i>
                            <span>4.8 تقييم متوسط</span>
                        </div>
                        <div class="preview-stat">
                            <i class="fas fa-download"></i>
                            <span>${sampleThemes.reduce((sum, theme) => sum + theme.downloads, 0)} تحميل</span>
                        </div>
                    </div>
                </div>
                
                <div class="preview-themes">
                    <h4>أحدث القوالب في هذه الفئة:</h4>
                    <div class="preview-themes-list">
                        ${sampleThemes.map(theme => `
                            <div class="preview-theme-item">
                                <div class="theme-info">
                                    <h5>${theme.name}</h5>
                                    <div class="theme-meta">
                                        <div class="theme-rating">
                                            ${Array.from({length: 5}, (_, i) => 
                                                `<i class="fas fa-star ${i < theme.rating ? 'active' : ''}"></i>`
                                            ).join('')}
                                        </div>
                                        <span class="theme-downloads">
                                            <i class="fas fa-download"></i>
                                            ${theme.downloads}
                                        </span>
                                    </div>
                                </div>
                                <button class="btn-preview-theme">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        `).join('')}
                    </div>
                </div>
                
                <div class="preview-actions">
                    <button class="btn-view-all-category" onclick="selectFilter('${category}'); closeCategoryPreview();">
                        <i class="fas fa-th"></i>
                        عرض جميع قوالب هذه الفئة
                    </button>
                </div>
            </div>
            
            <style>
                .category-preview-content {
                    color: #ffffff;
                }
                
                body.light-mode .category-preview-content {
                    color: #1f2937;
                }
                
                .preview-header {
                    margin-bottom: 2rem;
                    padding: 1.5rem;
                    background: rgba(59, 130, 246, 0.1);
                    border-radius: 15px;
                    border: 2px solid rgba(59, 130, 246, 0.3);
                }
                
                .preview-stats {
                    display: flex;
                    gap: 2rem;
                    flex-wrap: wrap;
                }
                
                .preview-stat {
                    display: flex;
                    align-items: center;
                    gap: 0.5rem;
                    color: #3b82f6;
                    font-weight: 600;
                }
                
                .preview-themes h4 {
                    margin-bottom: 1.5rem;
                    color: #ffffff;
                }
                
                body.light-mode .preview-themes h4 {
                    color: #1f2937;
                }
                
                .preview-themes-list {
                    display: flex;
                    flex-direction: column;
                    gap: 1rem;
                    margin-bottom: 2rem;
                }
                
                .preview-theme-item {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 1rem;
                    background: rgba(0, 0, 17, 0.5);
                    border-radius: 12px;
                    border: 1px solid rgba(59, 130, 246, 0.2);
                    transition: all 0.3s ease;
                }
                
                body.light-mode .preview-theme-item {
                    background: rgba(248, 250, 252, 0.7);
                }
                
                .preview-theme-item:hover {
                    border-color: #3b82f6;
                    transform: translateX(5px);
                }
                
                .theme-info h5 {
                    margin: 0 0 0.5rem 0;
                    font-size: 1.1rem;
                    color: #ffffff;
                }
                
                body.light-mode .theme-info h5 {
                    color: #1f2937;
                }
                
                .theme-meta {
                    display: flex;
                    align-items: center;
                    gap: 1rem;
                }
                
                .theme-rating .fa-star {
                    color: rgba(251, 191, 36, 0.3);
                    font-size: 0.85rem;
                }
                
                .theme-rating .fa-star.active {
                    color: #fbbf24;
                }
                
                .theme-downloads {
                    color: #8b9dc3;
                    font-size: 0.9rem;
                }
                
                body.light-mode .theme-downloads {
                    color: #64748b;
                }
                
                .btn-preview-theme {
                    width: 40px;
                    height: 40px;
                    border: none;
                    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
                    border-radius: 10px;
                    color: #ffffff;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                
                .btn-preview-theme:hover {
                    transform: scale(1.1);
                    box-shadow: 0 5px 20px rgba(59, 130, 246, 0.4);
                }
                
                .preview-actions {
                    text-align: center;
                    padding-top: 1.5rem;
                    border-top: 2px solid rgba(59, 130, 246, 0.2);
                }
                
                .btn-view-all-category {
                    padding: 1rem 2rem;
                    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
                    border: none;
                    border-radius: 25px;
                    color: #ffffff;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    display: inline-flex;
                    align-items: center;
                    gap: 0.8rem;
                }
                
                .btn-view-all-category:hover {
                    transform: translateY(-3px);
                    box-shadow: 0 10px 30px rgba(59, 130, 246, 0.5);
                }
                
                @media (max-width: 768px) {
                    .preview-stats {
                        flex-direction: column;
                        gap: 1rem;
                    }
                    
                    .theme-meta {
                        flex-direction: column;
                        align-items: flex-start;
                        gap: 0.5rem;
                    }
                }
            </style>
        `;
    }
    
    function closeCategoryPreview() {
        if (previewModal) {
            previewModal.style.display = 'none';
            document.body.style.overflow = '';
        }
        console.log('❌ إغلاق معاينة الفئة');
    }
    
    function getCategoryName(slug) {
        const categoryCard = document.querySelector(`[data-category="${slug}"]`);
        if (categoryCard) {
            const titleElement = categoryCard.querySelector('.category-title');
            return titleElement ? titleElement.textContent : slug;
        }
        return slug;
    }
    
    // تصدير الدوال للاستخدام الخارجي
    window.selectFilter = selectFilter;
    window.closeCategoryPreview = closeCategoryPreview;
    
    console.log('✅ نظام الفئات المتقدم جاهز للاستخدام!');
}
</script>