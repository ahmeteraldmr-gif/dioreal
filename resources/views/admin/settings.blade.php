@extends('admin.layouts.app')

@yield('title', 'Genel Ayarlar')

@section('page_title', 'Sistem Ayarları')
@section('page_subtitle', 'Sitenin genel ayarları, hakkımızda sayfası, iletişim ve sosyal medya kanalları ile referans markaları yönetin.')

@section('content')
<style>
    .settings-nav-tabs {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        background: rgba(15, 23, 42, 0.4);
        border: 1px solid var(--border-color);
        padding: 0.5rem;
        border-radius: var(--radius-lg);
        margin-bottom: 2rem;
    }
    .settings-tab-btn {
        background: transparent;
        border: none;
        color: var(--text-muted);
        font-family: var(--font-body);
        font-size: 0.95rem;
        font-weight: 600;
        padding: 0.75rem 1.25rem;
        border-radius: var(--radius-md);
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }
    .settings-tab-btn:hover {
        color: var(--text-color);
        background: rgba(255, 255, 255, 0.05);
    }
    .settings-tab-btn.active {
        color: var(--near-black);
        background: var(--primary);
    }
    .settings-tab-pane {
        display: none;
        animation: fadeIn 0.4s ease;
    }
    .settings-tab-pane.active {
        display: block;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .image-preview-container {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        background: rgba(255, 255, 255, 0.02);
        border: 1px dashed var(--border-color);
        padding: 1rem;
        border-radius: var(--radius-md);
        margin-top: 0.5rem;
        margin-bottom: 1rem;
    }
    .image-preview-box {
        width: 120px;
        height: 80px;
        border-radius: var(--radius-sm);
        overflow: hidden;
        border: 1px solid var(--border-color);
        background: rgba(0, 0, 0, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .image-preview-box img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }
    .image-preview-info {
        flex: 1;
        font-size: 0.85rem;
        color: var(--text-muted);
    }
    
    .section-title {
        color: var(--primary);
        font-family: var(--font-display);
        font-size: 1.25rem;
        margin-bottom: 1.5rem;
        border-bottom: 1px solid var(--border-color);
        padding-bottom: 0.5rem;
    }
</style>

<!-- Settings Navigation Tabs -->
<div class="settings-nav-tabs">
    <button type="button" class="settings-tab-btn active" data-tab="tab-general" onclick="openSettingsTab('tab-general')">
        <i class="fas fa-sliders-h"></i> Genel & Hero Ayarları
    </button>
    <button type="button" class="settings-tab-btn" data-tab="tab-about" onclick="openSettingsTab('tab-about')">
        <i class="fas fa-info-circle"></i> Hakkımızda Sayfası
    </button>
    <button type="button" class="settings-tab-btn" data-tab="tab-contact" onclick="openSettingsTab('tab-contact')">
        <i class="fas fa-envelope"></i> İletişim & Sosyal Medya
    </button>
    <button type="button" class="settings-tab-btn" data-tab="tab-brands" onclick="openSettingsTab('tab-brands')">
        <i class="fas fa-handshake"></i> Marka Referansları
    </button>
</div>

<!-- Main Settings Form -->
<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- TAB 1: GENERAL & HERO -->
    <div id="tab-general" class="settings-tab-pane active">
        <div class="panel-card">
            <div class="panel-card-header">
                <h3 class="panel-card-title"><i class="fas fa-home" style="color: var(--primary); margin-right: 0.5rem;"></i> Genel Giriş Ayarları</h3>
            </div>
            
            <div style="margin-bottom: 2rem;">
                <h4 style="color: var(--primary); margin-bottom: 1rem; font-size: 1.05rem;">Hero Giriş Başlığı</h4>
                <div class="lang-tabs-container">
                    <button type="button" class="lang-tab active" data-lang="tr" onclick="switchLanguageTab('tr')">Türkçe</button>
                    <button type="button" class="lang-tab" data-lang="en" onclick="switchLanguageTab('en')">English</button>
                </div>

                <div class="lang-pane active" data-lang="tr">
                    <div class="form-group">
                        <label class="form-label" for="hero_title_tr">Ana Başlık (TR)</label>
                        <textarea class="form-control" name="hero_title_tr" id="hero_title_tr" rows="2" placeholder="Örn: Türkiye ve dünyada seçkin&#10;deneyimlerin kapısını aralıyoruz.">{{ $settings['hero_title_tr'] ?? '' }}</textarea>
                    </div>
                </div>

                <div class="lang-pane" data-lang="en">
                    <div class="form-group">
                        <label class="form-label" for="hero_title_en">Ana Başlık (EN)</label>
                        <textarea class="form-control" name="hero_title_en" id="hero_title_en" rows="2" placeholder="Örn: Opening doors to exclusive&#10;experiences globally.">{{ $settings['hero_title_en'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="footer_copy">Footer Telif Yazısı (Copyright)</label>
                <input type="text" class="form-control" name="footer_copy" id="footer_copy" value="{{ $settings['footer_copy'] ?? '' }}" placeholder="© 2026 Dioreal Dijital. All Rights Reserved.">
            </div>
        </div>
    </div>

    <!-- TAB 2: ABOUT PAGE -->
    <div id="tab-about" class="settings-tab-pane">
        <div class="panel-card">
            <div class="panel-card-header">
                <h3 class="panel-card-title"><i class="fas fa-edit" style="color: var(--primary); margin-right: 0.5rem;"></i> Hakkımızda Sayfası İçerikleri</h3>
            </div>

            <!-- Lang Switcher inside About Tab -->
            <div class="lang-tabs-container" style="margin-bottom: 2rem;">
                <button type="button" class="lang-tab active" data-lang="tr" onclick="switchLanguageTab('tr')">Türkçe Form</button>
                <button type="button" class="lang-tab" data-lang="en" onclick="switchLanguageTab('en')">English Form</button>
            </div>

            <!-- TR PANEL -->
            <div class="lang-pane active" data-lang="tr">
                <!-- Hero Header -->
                <div class="section-title">Hakkımızda Giriş Alanı (TR)</div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div class="form-group">
                        <label class="form-label">Üst Küçük Başlık (TR)</label>
                        <input type="text" class="form-control" name="about_eyebrow_tr" value="{{ $settings['about_eyebrow_tr'] ?? 'Biz Kimiz' }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Ana Büyük Başlık (TR)</label>
                        <input type="text" class="form-control" name="about_title_tr" value="{{ $settings['about_title_tr'] ?? 'Dioreal Dijital' }}">
                    </div>
                </div>

                <!-- Story Section -->
                <div class="section-title" style="margin-top: 2rem;">Hikayemiz Bölümü (TR)</div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div class="form-group">
                        <label class="form-label">Üst Küçük Başlık (TR)</label>
                        <input type="text" class="form-control" name="about_story_eyebrow_tr" value="{{ $settings['about_story_eyebrow_tr'] ?? 'Hikayemiz' }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Bölüm Başlığı (TR)</label>
                        <input type="text" class="form-control" name="about_story_title_tr" value="{{ $settings['about_story_title_tr'] ?? '15 yıldır lüks seyahatin sesi' }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Paragraf 1 (TR)</label>
                    <textarea class="form-control" name="about_p1_tr" rows="3">{{ $settings['about_p1_tr'] ?? '2010 yılında İstanbul\'da kurulan Dioreal Dijital, Türkiye\'nin öncü lüks seyahat ve yaşam tarzı medya platformuna dönüşmüştür. Seçkin destinasyonlar, premium markalar ve doğru kitleyi bir araya getiren köprü olmak misyonuyla kurulduk.' }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Paragraf 2 (TR)</label>
                    <textarea class="form-control" name="about_p2_tr" rows="3">{{ $settings['about_p2_tr'] ?? 'Her destinasyonda bizzat bulunarak, her oteli bizatihi deneyimleyerek ve her markayı özenle seçerek güvenilir bir referans noktası haline geldik.' }}</textarea>
                </div>

                <!-- Stats Section Header -->
                <div class="section-title" style="margin-top: 2rem;">İstatistik Sayaçları (TR)</div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div class="form-group">
                        <label class="form-label">Sayaç Üst Küçük Başlık (TR)</label>
                        <input type="text" class="form-control" name="about_stats_eyebrow_tr" value="{{ $settings['about_stats_eyebrow_tr'] ?? 'Rakamlarla' }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Sayaç Bölüm Başlığı (TR)</label>
                        <input type="text" class="form-control" name="about_stats_title_tr" value="{{ $settings['about_stats_title_tr'] ?? '15 Yılın Mirası' }}">
                    </div>
                </div>

                <!-- Mission Section -->
                <div class="section-title" style="margin-top: 2rem;">Misyonumuz Bölümü (TR)</div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div class="form-group">
                        <label class="form-label">Üst Küçük Başlık (TR)</label>
                        <input type="text" class="form-control" name="about_mission_eyebrow_tr" value="{{ $settings['about_mission_eyebrow_tr'] ?? 'Misyonumuz' }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Bölüm Başlığı (TR)</label>
                        <input type="text" class="form-control" name="about_mission_title_tr" value="{{ $settings['about_mission_title_tr'] ?? 'Anlamlı deneyimler için' }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Paragraf 1 (TR)</label>
                    <textarea class="form-control" name="about_mission_p1_tr" rows="3">{{ $settings['about_mission_p1_tr'] ?? 'Dioreal olarak misyonumuz, sıradan tatillerin ötesine geçerek iz bırakan anlar tasarlamaktır. Küresel bir vizyonla, lokal zarafeti birleştiriyoruz.' }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Paragraf 2 (TR)</label>
                    <textarea class="form-control" name="about_mission_p2_tr" rows="3">{{ $settings['about_mission_p2_tr'] ?? 'Sadece destinasyon tanıtmakla kalmıyor, lüks yaşam kültürünü ve estetik seyahat felsefesini de paylaşıyoruz.' }}</textarea>
                </div>
            </div>

            <!-- EN PANEL -->
            <div class="lang-pane" data-lang="en">
                <!-- Hero Header -->
                <div class="section-title">About Entrance Area (EN)</div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div class="form-group">
                        <label class="form-label">Top Subtitle (EN)</label>
                        <input type="text" class="form-control" name="about_eyebrow_en" value="{{ $settings['about_eyebrow_en'] ?? 'Who We Are' }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Main Large Title (EN)</label>
                        <input type="text" class="form-control" name="about_title_en" value="{{ $settings['about_title_en'] ?? 'Dioreal Digital' }}">
                    </div>
                </div>

                <!-- Story Section -->
                <div class="section-title" style="margin-top: 2rem;">Our Story Section (EN)</div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div class="form-group">
                        <label class="form-label">Top Subtitle (EN)</label>
                        <input type="text" class="form-control" name="about_story_eyebrow_en" value="{{ $settings['about_story_eyebrow_en'] ?? 'Our Story' }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Section Title (EN)</label>
                        <input type="text" class="form-control" name="about_story_title_en" value="{{ $settings['about_story_title_en'] ?? '15 years of luxury travel storytelling' }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Paragraph 1 (EN)</label>
                    <textarea class="form-control" name="about_p1_en" rows="3">{{ $settings['about_p1_en'] ?? 'Founded in 2010 in Istanbul, Dioreal Digital has evolved into Turkey\'s leading luxury travel and lifestyle media platform. We were established with the mission to bridge elite destinations, premium brands, and the right audience.' }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Paragraph 2 (EN)</label>
                    <textarea class="form-control" name="about_p2_en" rows="3">{{ $settings['about_p2_en'] ?? 'By personally visiting each destination, experiencing every hotel, and carefully selecting each brand, we have become a trusted reference point.' }}</textarea>
                </div>

                <!-- Stats Section Header -->
                <div class="section-title" style="margin-top: 2rem;">Statistics Counter (EN)</div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div class="form-group">
                        <label class="form-label">Counter Subtitle (EN)</label>
                        <input type="text" class="form-control" name="about_stats_eyebrow_en" value="{{ $settings['about_stats_eyebrow_en'] ?? 'By Numbers' }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Counter Title (EN)</label>
                        <input type="text" class="form-control" name="about_stats_title_en" value="{{ $settings['about_stats_title_en'] ?? 'Legacy of 15 Years' }}">
                    </div>
                </div>

                <!-- Mission Section -->
                <div class="section-title" style="margin-top: 2rem;">Our Mission Section (EN)</div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div class="form-group">
                        <label class="form-label">Top Subtitle (EN)</label>
                        <input type="text" class="form-control" name="about_mission_eyebrow_en" value="{{ $settings['about_mission_eyebrow_en'] ?? 'Our Mission' }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Section Title (EN)</label>
                        <input type="text" class="form-control" name="about_mission_title_en" value="{{ $settings['about_mission_title_en'] ?? 'For meaningful experiences' }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Paragraph 1 (EN)</label>
                    <textarea class="form-control" name="about_mission_p1_en" rows="3">{{ $settings['about_mission_p1_en'] ?? 'At Dioreal, our mission is to go beyond ordinary vacations and design moments that leave a lasting mark. We combine a global vision with local sophistication.' }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Paragraph 2 (EN)</label>
                    <textarea class="form-control" name="about_mission_p2_en" rows="3">{{ $settings['about_mission_p2_en'] ?? 'We do not just introduce destinations; we also share the luxury lifestyle culture and aesthetic travel philosophy.' }}</textarea>
                </div>
            </div>

            <!-- Page Images (Independent of Language Tabs) -->
            <div class="section-title" style="margin-top: 2.5rem;">Hakkımızda Sayfa Görselleri</div>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem;">
                
                <!-- Story Image -->
                <div>
                    <label class="form-label" style="font-weight: 600;">Hikayemiz Görseli (Sol Kolon)</label>
                    <input type="file" class="form-control" name="about_story_img" accept="image/*">
                    <div class="image-preview-container">
                        <div class="image-preview-box">
                            <img src="{{ asset($settings['about_story_img'] ?? 'foto.img/about_yacht.jpg') }}" alt="Hikaye Görseli">
                        </div>
                        <div class="image-preview-info">
                            <strong>Mevcut Görsel</strong><br>
                            Önerilen Çözünürlük:<br>600x800 veya benzer dikey oran.
                        </div>
                    </div>
                </div>

                <!-- Mission Image -->
                <div>
                    <label class="form-label" style="font-weight: 600;">Misyonumuz Görseli (Sağ Kolon)</label>
                    <input type="file" class="form-control" name="about_mission_img" accept="image/*">
                    <div class="image-preview-container">
                        <div class="image-preview-box">
                            <img src="{{ asset($settings['about_mission_img'] ?? 'foto.img/about_safari.jpg') }}" alt="Misyon Görseli">
                        </div>
                        <div class="image-preview-info">
                            <strong>Mevcut Görsel</strong><br>
                            Önerilen Çözünürlük:<br>600x800 veya benzer dikey oran.
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- TAB 3: CONTACT & SOCIAL MEDIA -->
    <div id="tab-contact" class="settings-tab-pane">
        <div class="panel-card">
            <div class="panel-card-header">
                <h3 class="panel-card-title"><i class="fas fa-phone-alt" style="color: var(--primary); margin-right: 0.5rem;"></i> İletişim & Sosyal Medya Ayarları</h3>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem;">
                
                <!-- Contact Info Section -->
                <div>
                    <h4 style="color: var(--primary); margin-bottom: 1.25rem; font-size: 1.05rem; border-bottom: 1px solid var(--border-color); padding-bottom: 0.5rem;">İletişim Bilgileri</h4>
                    
                    <div class="form-group">
                        <label class="form-label" for="contact_email">E-posta Adresi</label>
                        <input type="email" class="form-control" name="contact_email" id="contact_email" value="{{ $settings['contact_email'] ?? '' }}" placeholder="info@diorealdijital.com">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="contact_phone">Telefon Numarası</label>
                        <input type="text" class="form-control" name="contact_phone" id="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}" placeholder="+90 212 555 0100">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="contact_address_tr">Adres (TR)</label>
                        <input type="text" class="form-control" name="contact_address_tr" id="contact_address_tr" value="{{ $settings['contact_address_tr'] ?? '' }}" placeholder="İstanbul, Türkiye">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="contact_address_en">Adres (EN)</label>
                        <input type="text" class="form-control" name="contact_address_en" id="contact_address_en" value="{{ $settings['contact_address_en'] ?? '' }}" placeholder="Istanbul, Turkey">
                    </div>
                </div>

                <!-- Social Media & Integrations -->
                <div>
                    <h4 style="color: var(--primary); margin-bottom: 1.25rem; font-size: 1.05rem; border-bottom: 1px solid var(--border-color); padding-bottom: 0.5rem;">Sosyal Ağlar & Entegrasyonlar</h4>

                    <div class="form-group">
                        <label class="form-label" for="instagram">Instagram Profili</label>
                        <input type="url" class="form-control" name="instagram" id="instagram" value="{{ $settings['instagram'] ?? '' }}" placeholder="https://instagram.com/kullanici">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="linkedin">LinkedIn Profili</label>
                        <input type="url" class="form-control" name="linkedin" id="linkedin" value="{{ $settings['linkedin'] ?? '' }}" placeholder="https://linkedin.com/company/sirket">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="whatsapp">WhatsApp Buton Numarası</label>
                        <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="{{ $settings['whatsapp'] ?? '' }}" placeholder="905320000000">
                        <small style="color: var(--text-muted); display: block; margin-top: 0.25rem;">Numaranın başına + veya 0 koymadan, ülke koduyla bitişik yazın (Örn: 905321234567).</small>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Form Submit Action Button (Spans General, About, Contact Tabs) -->
    <div id="settings-submit-container" style="border-top: 1px solid var(--border-color); padding-top: 1.5rem; display: flex; justify-content: flex-end; margin-bottom: 2rem;">
        <button type="submit" class="btn btn-primary" style="padding: 0.75rem 2rem; font-size: 1rem;">
            <i class="fas fa-save"></i> Tüm Değişiklikleri Kaydet
        </button>
    </div>
</form>

<!-- TAB 4: BRANDS (Independent form to add/remove brands) -->
<div id="tab-brands" class="settings-tab-pane">
    <div class="panel-card">
        <div class="panel-card-header">
            <h3 class="panel-card-title">
                <i class="fas fa-handshake" style="color: var(--primary); margin-right: 0.5rem;"></i> Marka Referansları Yönetimi
            </h3>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2.5rem;">
            
            <!-- Existing Brands Grid -->
            <div>
                <h4 style="color: var(--primary); margin-bottom: 1.25rem; font-size: 1.05rem; border-bottom: 1px solid var(--border-color); padding-bottom: 0.5rem;">Mevcut Referans Markalar</h4>
                
                @if(isset($settings['brands']) && is_array($settings['brands']) && count($settings['brands']) > 0)
                    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(130px, 1fr)); gap: 1rem; max-height: 450px; overflow-y: auto; padding-right: 0.5rem;">
                        @foreach($settings['brands'] as $index => $brand)
                            <div style="background: rgba(15, 23, 42, 0.4); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 0.75rem; display: flex; flex-direction: column; align-items: center; justify-content: space-between; text-align: center; height: 120px; position: relative;">
                                <div style="width: 100%; height: 50px; display: flex; align-items: center; justify-content: center; background: rgba(0, 0, 0, 0.1); border-radius: 4px; overflow: hidden; margin-bottom: 0.5rem;">
                                    <img src="{{ asset($brand['img']) }}" alt="{{ $brand['name'] }}" style="max-width: 90%; max-height: 90%; object-fit: contain; filter: brightness(0) invert(1);">
                                </div>
                                <span style="font-size: 0.8rem; font-weight: 500; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; width: 100%;">{{ $brand['name'] }}</span>
                                
                                <form action="{{ route('admin.settings.delete_brand', $index) }}" method="POST" onsubmit="return confirm('Bu markayı referanslardan kaldırmak istediğinizden emin misiniz?');" style="position: absolute; top: 5px; right: 5px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: rgba(239, 68, 68, 0.2); border: 1px solid rgba(239, 68, 68, 0.3); color: #f87171; width: 22px; height: 22px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 0.7rem; transition: var(--transition);">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p style="color: var(--text-muted); font-size: 0.9rem;">Henüz bir referans marka eklenmemiş.</p>
                @endif
            </div>

            <!-- Add Brand Form -->
            <div style="background: rgba(255, 255, 255, 0.02); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 1.5rem;">
                <h4 style="color: var(--primary); margin-bottom: 1.25rem; font-size: 1.05rem; border-bottom: 1px solid var(--border-color); padding-bottom: 0.5rem;">Yeni Referans Ekle</h4>
                
                <form action="{{ route('admin.settings.add_brand') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label" for="brand_name">Marka Adı</label>
                        <input type="text" class="form-control" name="brand_name" id="brand_name" required placeholder="Örn: Gucci">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="brand_logo">Marka Logosu</label>
                        <input type="file" class="form-control" name="brand_logo" id="brand_logo" required accept="image/*">
                        <small style="color: var(--text-muted); display: block; margin-top: 0.25rem;">Şeffaf arka planlı PNG, SVG veya WEBP formatı önerilir.</small>
                    </div>

                    <div style="margin-top: 1.5rem;">
                        <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">
                            <i class="fas fa-plus"></i> Referans Markayı Ekle
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    function openSettingsTab(tabId) {
        // Toggle Nav Buttons Active Class
        document.querySelectorAll('.settings-tab-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        const activeBtn = document.querySelector(`.settings-tab-btn[data-tab="${tabId}"]`);
        if (activeBtn) activeBtn.classList.add('active');

        // Toggle Tab Panes Display
        document.querySelectorAll('.settings-tab-pane').forEach(pane => {
            pane.classList.remove('active');
        });
        const activePane = document.getElementById(tabId);
        if (activePane) activePane.classList.add('active');

        // Show/Hide Submit Button for Main Form
        const submitContainer = document.getElementById('settings-submit-container');
        if (tabId === 'tab-brands') {
            submitContainer.style.display = 'none';
        } else {
            submitContainer.style.display = 'flex';
        }

        // Store active tab in localStorage
        localStorage.setItem('active_settings_tab', tabId);
    }

    document.addEventListener("DOMContentLoaded", () => {
        // Load stored active tab or default to 'tab-general'
        const storedTab = localStorage.getItem('active_settings_tab') || 'tab-general';
        openSettingsTab(storedTab);
    });
</script>
@endsection
