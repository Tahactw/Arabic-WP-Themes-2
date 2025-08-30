<?php
/**
 * شريط البحث المتقدم للقوالب
 * نظام بحث ذكي مع الإكمال التلقائي والفلترة السريعة
 * 
 * @package ArabicThemes
 * @author Tahactw
 * @date 2025-05-29
 * @version 1.0
 */

// منع الوصول المباشر
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="advanced-search-container">
    <div class="search-main-wrapper">
        <!-- شريط البحث الرئيسي -->
        <div class="primary-search">
            <div class="search-input-container">
                <input type="text" 
                       id="theme-search-advanced" 
                       class="advanced-search-input"
                       placeholder="ابحث عن القالب المثالي... (اكتب 3 أحرف على الأقل)"
                       autocomplete="off"
                       spellcheck="false">
                
                <div class="search-controls">
                    <button class="search-voice-btn" id="voice-search" title="البحث الصوتي">
                        <i class="fas fa-microphone"></i>
                    </button>
                    
                    <button class="search-action-btn" id="search-action" title="بحث">
                        <i class="fas fa-search"></i>
                    </button>
                    
                    <button class="search-clear-btn" id="search-clear" title="مسح" style="display: none;">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            
            <!-- شريط التقدم للبحث -->
            <div class="search-progress-bar">
                <div class="search-progress-fill"></div>
            </div>
        </div>

        <!-- الإكمال التلقائي -->
        <div class="search-autocomplete" id="search-autocomplete" style="display: none;">
            <div class="autocomplete-header">
                <i class="fas fa-lightbulb"></i>
                <span>اقتراحات البحث</span>
            </div>
            <div class="autocomplete-results" id="autocomplete-results">
                <!-- ستتم تعبئة النتائج ديناميكياً -->
            </div>
        </div>

        <!-- البحث المتقدم القابل للطي -->
        <div class="advanced-search-toggle">
            <button class="toggle-advanced-btn" id="toggle-advanced-search">
                <i class="fas fa-filter"></i>
                <span>بحث متقدم</span>
                <i class="fas fa-chevron-down toggle-icon"></i>
            </button>
        </div>

        <div class="advanced-search-panel" id="advanced-search-panel" style="display: none;">
            <div class="advanced-search-grid">
                <!-- البحث في الحقول -->
                <div class="search-field-group">
                    <label class="search-field-label">
                        <i class="fas fa-heading"></i>
                        البحث في العنوان
                    </label>
                    <input type="text" class="search-field-input" id="search-title" placeholder="عنوان القالب">
                </div>

                <div class="search-field-group">
                    <label class="search-field-label">
                        <i class="fas fa-align-left"></i>
                        البحث في الوصف
                    </label>
                    <input type="text" class="search-field-input" id="search-description" placeholder="وصف القالب">
                </div>

                <div class="search-field-group">
                    <label class="search-field-label">
                        <i class="fas fa-tags"></i>
                        الكلمات المفتاحية
                    </label>
                    <input type="text" class="search-field-input" id="search-tags" placeholder="الأوسمة">
                </div>

                <div class="search-field-group">
                    <label class="search-field-label">
                        <i class="fas fa-user"></i>
                        المطور
                    </label>
                    <input type="text" class="search-field-input" id="search-author" placeholder="اسم المطور">
                </div>
            </div>

            <div class="advanced-search-actions">
                <button class="btn-advanced-search" id="apply-advanced-search">
                    <i class="fas fa-search"></i>
                    تطبيق البحث المتقدم
                </button>
                <button class="btn-reset-search" id="reset-advanced-search">
                    <i class="fas fa-undo"></i>
                    إعادة تعيين
                </button>
            </div>
        </div>

        <!-- إحصائيات البحث -->
        <div class="search-stats" id="search-stats" style="display: none;">
            <div class="stats-content">
                <span class="search-results-count">
                    <i class="fas fa-chart-bar"></i>
                    تم العثور على <strong id="results-count">0</strong> نتيجة
                </span>
                <span class="search-time">
                    في <span id="search-time">0</span> ثانية
                </span>
            </div>
        </div>

        <!-- البحث السريع -->
        <div class="quick-search-tags">
            <span class="quick-search-label">البحث السريع:</span>
            <div class="quick-tags">
                <button class="quick-tag" data-search="متجاوب">متجاوب</button>
                <button class="quick-tag" data-search="أعمال">أعمال</button>
                <button class="quick-tag" data-search="مدونة">مدونة</button>
                <button class="quick-tag" data-search="متجر">متجر إلكتروني</button>
                <button class="quick-tag" data-search="شخصي">شخصي</button>
                <button class="quick-tag" data-search="تعليمي">تعليمي</button>
                <button class="quick-tag" data-search="طبي">طبي</button>
                <button class="quick-tag" data-search="مطعم">مطعم</button>
            </div>
        </div>
    </div>
</div>

<style>
/* ═══════════════════════════════════════════════════
   🔍 تصميم البحث المتقدم
   ═══════════════════════════════════════════════════ */

.advanced-search-container {
    background: rgba(26, 26, 46, 0.9);
    backdrop-filter: blur(20px);
    border-radius: 25px;
    padding: 2rem;
    margin-bottom: 3rem;
    border: 2px solid rgba(59, 130, 246, 0.2);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    transition: all 0.3s ease;
}

body.light-mode .advanced-search-container {
    background: rgba(255, 255, 255, 0.95);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
}

.search-main-wrapper {
    max-width: 800px;
    margin: 0 auto;
}

/* شريط البحث الرئيسي */
.primary-search {
    position: relative;
    margin-bottom: 1.5rem;
}

.search-input-container {
    position: relative;
    display: flex;
    align-items: center;
    background: rgba(0, 0, 17, 0.7);
    border: 2px solid rgba(59, 130, 246, 0.3);
    border-radius: 50px;
    padding: 0.5rem;
    transition: all 0.3s ease;
}

body.light-mode .search-input-container {
    background: rgba(248, 250, 252, 0.9);
}

.search-input-container:focus-within {
    border-color: #3b82f6;
    box-shadow: 0 0 30px rgba(59, 130, 246, 0.4);
    transform: scale(1.02);
}

.advanced-search-input {
    flex: 1;
    padding: 1.2rem 1.5rem;
    background: transparent;
    border: none;
    outline: none;
    color: #ffffff;
    font-size: 1.1rem;
    font-family: 'Cairo', sans-serif;
    font-weight: 500;
}

body.light-mode .advanced-search-input {
    color: #1f2937;
}

.advanced-search-input::placeholder {
    color: #8b9dc3;
    transition: all 0.3s ease;
}

body.light-mode .advanced-search-input::placeholder {
    color: #64748b;
}

.advanced-search-input:focus::placeholder {
    opacity: 0.5;
    transform: translateX(10px);
}

/* أزرار التحكم */
.search-controls {
    display: flex;
    gap: 0.5rem;
    padding-left: 1rem;
}

.search-voice-btn,
.search-action-btn,
.search-clear-btn {
    width: 45px;
    height: 45px;
    border: none;
    border-radius: 50%;
    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
    color: #ffffff;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    font-size: 1rem;
    position: relative;
    overflow: hidden;
}

.search-voice-btn:hover,
.search-action-btn:hover,
.search-clear-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
}

.search-clear-btn {
    background: linear-gradient(45deg, #ef4444, #f97316);
}

.search-clear-btn:hover {
    box-shadow: 0 8px 25px rgba(239, 68, 68, 0.4);
}

/* شريط التقدم */
.search-progress-bar {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: rgba(59, 130, 246, 0.2);
    border-radius: 0 0 50px 50px;
    overflow: hidden;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.search-progress-bar.active {
    opacity: 1;
}

.search-progress-fill {
    height: 100%;
    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
    width: 0%;
    transition: width 0.5s ease;
}

/* الإكمال التلقائي */
.search-autocomplete {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    z-index: 1000;
    background: rgba(26, 26, 46, 0.95);
    backdrop-filter: blur(20px);
    border: 2px solid rgba(59, 130, 246, 0.3);
    border-radius: 20px;
    margin-top: 0.5rem;
    max-height: 400px;
    overflow-y: auto;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
    animation: slideDown 0.3s ease;
}

body.light-mode .search-autocomplete {
    background: rgba(255, 255, 255, 0.95);
}

.autocomplete-header {
    padding: 1rem 1.5rem;
    border-bottom: 1px solid rgba(59, 130, 246, 0.2);
    display: flex;
    align-items: center;
    gap: 0.8rem;
    color: #3b82f6;
    font-weight: 600;
}

.autocomplete-results {
    padding: 0.5rem 0;
}

.autocomplete-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem 1.5rem;
    cursor: pointer;
    transition: all 0.3s ease;
    border-bottom: 1px solid rgba(59, 130, 246, 0.1);
}

.autocomplete-item:hover {
    background: rgba(59, 130, 246, 0.1);
    transform: translateX(5px);
}

.autocomplete-item:last-child {
    border-bottom: none;
}

.autocomplete-icon {
    width: 20px;
    color: #3b82f6;
}

.autocomplete-text {
    flex: 1;
    color: #ffffff;
}

body.light-mode .autocomplete-text {
    color: #1f2937;
}

.autocomplete-count {
    color: #8b9dc3;
    font-size: 0.9rem;
}

body.light-mode .autocomplete-count {
    color: #64748b;
}

/* زر البحث المتقدم */
.advanced-search-toggle {
    text-align: center;
    margin-bottom: 1rem;
}

.toggle-advanced-btn {
    background: rgba(0, 0, 17, 0.7);
    border: 2px solid rgba(59, 130, 246, 0.3);
    border-radius: 25px;
    padding: 1rem 2rem;
    color: #ffffff;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 1rem;
    font-size: 1rem;
    font-weight: 600;
}

body.light-mode .toggle-advanced-btn {
    background: rgba(248, 250, 252, 0.9);
    color: #1f2937;
}

.toggle-advanced-btn:hover {
    border-color: #3b82f6;
    background: rgba(59, 130, 246, 0.1);
    transform: translateY(-2px);
}

.toggle-icon {
    transition: transform 0.3s ease;
}

.toggle-advanced-btn.active .toggle-icon {
    transform: rotate(180deg);
}

/* لوحة البحث المتقدم */
.advanced-search-panel {
    background: rgba(0, 0, 17, 0.5);
    border-radius: 20px;
    padding: 2rem;
    margin-bottom: 1.5rem;
    border: 1px solid rgba(59, 130, 246, 0.2);
    animation: slideDown 0.4s ease;
}

body.light-mode .advanced-search-panel {
    background: rgba(248, 250, 252, 0.7);
}

.advanced-search-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.search-field-group {
    position: relative;
}

.search-field-label {
    display: flex;
    align-items: center;
    gap: 0.8rem;
    margin-bottom: 0.8rem;
    color: #ffffff;
    font-weight: 600;
    font-size: 0.95rem;
}

body.light-mode .search-field-label {
    color: #1f2937;
}

.search-field-label i {
    color: #3b82f6;
    width: 16px;
}

.search-field-input {
    width: 100%;
    padding: 1rem 1.5rem;
    background: rgba(26, 26, 46, 0.7);
    border: 2px solid rgba(59, 130, 246, 0.3);
    border-radius: 15px;
    color: #ffffff;
    font-size: 1rem;
    font-family: 'Cairo', sans-serif;
    transition: all 0.3s ease;
    outline: none;
}

body.light-mode .search-field-input {
    background: rgba(255, 255, 255, 0.9);
    color: #1f2937;
}

.search-field-input:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
    transform: scale(1.02);
}

.search-field-input::placeholder {
    color: #8b9dc3;
}

body.light-mode .search-field-input::placeholder {
    color: #64748b;
}

/* أزرار البحث المتقدم */
.advanced-search-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-advanced-search,
.btn-reset-search {
    padding: 1.2rem 2rem;
    border: none;
    border-radius: 25px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    gap: 0.8rem;
    min-width: 160px;
    justify-content: center;
}

.btn-advanced-search {
    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
    color: #ffffff;
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
}

.btn-advanced-search:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(59, 130, 246, 0.6);
}

.btn-reset-search {
    background: rgba(26, 26, 46, 0.8);
    color: #ffffff;
    border: 2px solid rgba(59, 130, 246, 0.3);
}

body.light-mode .btn-reset-search {
    background: rgba(255, 255, 255, 0.9);
    color: #1f2937;
}

.btn-reset-search:hover {
    border-color: #ef4444;
    background: rgba(239, 68, 68, 0.1);
    transform: translateY(-3px);
}

/* إحصائيات البحث */
.search-stats {
    background: rgba(59, 130, 246, 0.1);
    border: 1px solid rgba(59, 130, 246, 0.3);
    border-radius: 15px;
    padding: 1rem 1.5rem;
    margin-bottom: 1.5rem;
    animation: fadeIn 0.4s ease;
}

.stats-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.search-results-count {
    color: #ffffff;
    font-weight: 600;
}

body.light-mode .search-results-count {
    color: #1f2937;
}

.search-results-count strong {
    color: #3b82f6;
    font-size: 1.1rem;
}

.search-time {
    color: #8b9dc3;
    font-size: 0.9rem;
}

body.light-mode .search-time {
    color: #64748b;
}

/* البحث السريع */
.quick-search-tags {
    display: flex;
    align-items: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.quick-search-label {
    color: #8b9dc3;
    font-weight: 600;
    white-space: nowrap;
}

body.light-mode .quick-search-label {
    color: #64748b;
}

.quick-tags {
    display: flex;
    gap: 0.8rem;
    flex-wrap: wrap;
    flex: 1;
}

.quick-tag {
    padding: 0.5rem 1rem;
    background: rgba(59, 130, 246, 0.1);
    border: 1px solid rgba(59, 130, 246, 0.3);
    border-radius: 20px;
    color: #3b82f6;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.quick-tag:hover {
    background: rgba(59, 130, 246, 0.2);
    border-color: #3b82f6;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3);
}

.quick-tag.active {
    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
    color: #ffffff;
    border-color: transparent;
}

/* الأنيميشن */
@keyframes slideDown {
    0% {
        opacity: 0;
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeIn {
    0% { opacity: 0; }
    100% { opacity: 1; }
}

/* الاستجابة */
@media (max-width: 768px) {
    .advanced-search-container {
        padding: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .advanced-search-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .advanced-search-actions {
        flex-direction: column;
    }
    
    .btn-advanced-search,
    .btn-reset-search {
        width: 100%;
    }
    
    .quick-search-tags {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .stats-content {
        flex-direction: column;
        text-align: center;
    }
    
    .search-controls {
        padding-left: 0.5rem;
    }
    
    .search-voice-btn,
    .search-action-btn,
    .search-clear-btn {
        width: 40px;
        height: 40px;
        font-size: 0.9rem;
    }
}

@media (max-width: 480px) {
    .advanced-search-input {
        font-size: 1rem;
        padding: 1rem;
    }
    
    .toggle-advanced-btn {
        padding: 0.8rem 1.5rem;
        font-size: 0.9rem;
    }
    
    .quick-tags {
        justify-content: center;
    }
}

/* تأثيرات إضافية للبحث الصوتي */
.search-voice-btn.recording {
    animation: recordingPulse 1s ease-in-out infinite;
    background: linear-gradient(45deg, #ef4444, #f97316);
}

@keyframes recordingPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); box-shadow: 0 0 20px rgba(239, 68, 68, 0.6); }
}

/* تحسينات للأداء */
.advanced-search-container * {
    will-change: transform;
    backface-visibility: hidden;
}

/* دعم الحركة المنخفضة */
@media (prefers-reduced-motion: reduce) {
    .advanced-search-container *,
    .search-autocomplete,
    .advanced-search-panel {
        animation: none !important;
        transition: none !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    initAdvancedSearch();
});

function initAdvancedSearch() {
    console.log('🔍 تهيئة نظام البحث المتقدم...');
    
    const searchInput = document.getElementById('theme-search-advanced');
    const searchAction = document.getElementById('search-action');
    const searchClear = document.getElementById('search-clear');
    const voiceSearch = document.getElementById('voice-search');
    const toggleAdvanced = document.getElementById('toggle-advanced-search');
    const advancedPanel = document.getElementById('advanced-search-panel');
    const autocomplete = document.getElementById('search-autocomplete');
    const progressBar = document.querySelector('.search-progress-bar');
    const progressFill = document.querySelector('.search-progress-fill');
    const searchStats = document.getElementById('search-stats');
    const quickTags = document.querySelectorAll('.quick-tag');
    
    let searchTimeout;
    let isVoiceSearching = false;
    
    // البحث المباشر
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.trim();
            
            if (query.length > 0) {
                searchClear.style.display = 'block';
                if (query.length >= 3) {
                    showProgress();
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => {
                        performSearch(query);
                        showAutocomplete(query);
                    }, 300);
                }
            } else {
                searchClear.style.display = 'none';
                hideAutocomplete();
                hideProgress();
                clearSearch();
            }
        });
        
        // التركيز والإلغاء
        searchInput.addEventListener('focus', function() {
            if (this.value.length >= 3) {
                showAutocomplete(this.value);
            }
        });
        
        searchInput.addEventListener('blur', function() {
            setTimeout(() => hideAutocomplete(), 200);
        });
    }
    
    // مسح البحث
    if (searchClear) {
        searchClear.addEventListener('click', function() {
            if (searchInput) {
                searchInput.value = '';
                searchInput.focus();
                this.style.display = 'none';
                hideAutocomplete();
                hideProgress();
                clearSearch();
            }
        });
    }
    
    // البحث الصوتي
    if (voiceSearch && 'webkitSpeechRecognition' in window) {
        const recognition = new webkitSpeechRecognition();
        recognition.lang = 'ar-SA';
        recognition.continuous = false;
        recognition.interimResults = false;
        
        voiceSearch.addEventListener('click', function() {
            if (!isVoiceSearching) {
                startVoiceSearch();
            } else {
                stopVoiceSearch();
            }
        });
        
        recognition.onstart = function() {
            isVoiceSearching = true;
            voiceSearch.classList.add('recording');
            voiceSearch.innerHTML = '<i class="fas fa-stop"></i>';
        };
        
        recognition.onresult = function(event) {
            const transcript = event.results[0][0].transcript;
            if (searchInput) {
                searchInput.value = transcript;
                performSearch(transcript);
                showAutocomplete(transcript);
            }
        };
        
        recognition.onend = function() {
            stopVoiceSearch();
        };
        
        function startVoiceSearch() {
            recognition.start();
        }
        
        function stopVoiceSearch() {
            isVoiceSearching = false;
            voiceSearch.classList.remove('recording');
            voiceSearch.innerHTML = '<i class="fas fa-microphone"></i>';
            recognition.stop();
        }
    } else if (voiceSearch) {
        voiceSearch.style.display = 'none';
    }
    
    // تبديل البحث المتقدم
    if (toggleAdvanced && advancedPanel) {
        toggleAdvanced.addEventListener('click', function() {
            const isVisible = advancedPanel.style.display !== 'none';
            
            if (isVisible) {
                advancedPanel.style.display = 'none';
                this.classList.remove('active');
            } else {
                advancedPanel.style.display = 'block';
                this.classList.add('active');
            }
        });
    }
    
    // البحث السريع
    quickTags.forEach(tag => {
        tag.addEventListener('click', function() {
            const searchTerm = this.dataset.search;
            
            // إزالة active من جميع العلامات
            quickTags.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            
            if (searchInput) {
                searchInput.value = searchTerm;
                performSearch(searchTerm);
                showAutocomplete(searchTerm);
            }
        });
    });
    
    function performSearch(query) {
        console.log('🔍 البحث عن:', query);
        
        const startTime = performance.now();
        
        // هنا يتم تنفيذ البحث الفعلي
        // سيتم ربطه مع نظام الفلترة الرئيسي
        
        setTimeout(() => {
            const endTime = performance.now();
            const searchTime = ((endTime - startTime) / 1000).toFixed(2);
            
            // عرض النتائج والإحصائيات
            showSearchStats(query, searchTime);
            hideProgress();
        }, 500);
    }
    
    function showAutocomplete(query) {
        if (!autocomplete) return;
        
        // محاكاة اقتراحات البحث
        const suggestions = generateSuggestions(query);
        const resultsContainer = document.getElementById('autocomplete-results');
        
        if (suggestions.length > 0 && resultsContainer) {
            resultsContainer.innerHTML = suggestions.map(suggestion => `
                <div class="autocomplete-item" data-search="${suggestion.text}">
                    <i class="autocomplete-icon ${suggestion.icon}"></i>
                    <span class="autocomplete-text">${suggestion.text}</span>
                    <span class="autocomplete-count">${suggestion.count} نتيجة</span>
                </div>
            `).join('');
            
            // إضافة مستمعات الأحداث للاقتراحات
            resultsContainer.querySelectorAll('.autocomplete-item').forEach(item => {
                item.addEventListener('click', function() {
                    const searchTerm = this.dataset.search;
                    if (searchInput) {
                        searchInput.value = searchTerm;
                        performSearch(searchTerm);
                    }
                    hideAutocomplete();
                });
            });
            
            autocomplete.style.display = 'block';
        } else {
            hideAutocomplete();
        }
    }
    
    function generateSuggestions(query) {
        // محاكاة اقتراحات ذكية بناءً على الاستعلام
        const baseSuggestions = [
            { text: 'قوالب أعمال', icon: 'fas fa-briefcase', count: 25 },
            { text: 'قوالب مدونة', icon: 'fas fa-blog', count: 18 },
            { text: 'قوالب متجر إلكتروني', icon: 'fas fa-shopping-cart', count: 12 },
            { text: 'قوالب شخصية', icon: 'fas fa-user', count: 15 },
            { text: 'قوالب تعليمية', icon: 'fas fa-graduation-cap', count: 8 },
            { text: 'قوالب طبية', icon: 'fas fa-heartbeat', count: 6 },
            { text: 'قوالب مطاعم', icon: 'fas fa-utensils', count: 9 }
        ];
        
        return baseSuggestions
            .filter(suggestion => 
                suggestion.text.toLowerCase().includes(query.toLowerCase())
            )
            .slice(0, 5);
    }
    
    function showProgress() {
        if (progressBar) {
            progressBar.classList.add('active');
            if (progressFill) {
                progressFill.style.width = '0%';
                setTimeout(() => {
                    progressFill.style.width = '100%';
                }, 50);
            }
        }
    }
    
    function hideProgress() {
        if (progressBar) {
            progressBar.classList.remove('active');
            if (progressFill) {
                progressFill.style.width = '0%';
            }
        }
    }
    
    function showAutocomplete() {
        if (autocomplete) {
            autocomplete.style.display = 'block';
        }
    }
    
    function hideAutocomplete() {
        if (autocomplete) {
            autocomplete.style.display = 'none';
        }
    }
    
    function showSearchStats(query, time) {
        if (searchStats) {
            const resultsCount = document.getElementById('results-count');
            const searchTime = document.getElementById('search-time');
            
            // محاكاة عدد النتائج
            const count = Math.floor(Math.random() * 50) + 1;
            
            if (resultsCount) resultsCount.textContent = count;
            if (searchTime) searchTime.textContent = time;
            
            searchStats.style.display = 'block';
        }
    }
    
    function clearSearch() {
        if (searchStats) {
            searchStats.style.display = 'none';
        }
        
        // إزالة active من جميع العلامات السريعة
        quickTags.forEach(tag => tag.classList.remove('active'));
        
        // مسح جميع الفلاتر
        console.log('🔄 تم مسح جميع فلاتر البحث');
    }
    
    console.log('✅ نظام البحث المتقدم جاهز للاستخدام!');
}
</script>