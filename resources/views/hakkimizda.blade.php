<!DOCTYPE html>
<html lang="tr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hakkımızda — Dioreal Dijital</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500&family=Jost:wght@200;300;400;500;600&family=Oswald:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/base.css?v={{ time() }}">
    <link rel="stylesheet" href="css/nav-footer.css?v={{ time() }}">
    <link rel="stylesheet" href="css/components.css?v={{ time() }}">
    <link rel="stylesheet" href="css/about.css?v={{ time() }}">
</head>
<body>
    <nav id="mainNav">
        <div class="nav-logo-wrapper">
            <a href="index.html" class="nav-logo">
                <span class="logo-text">DIOREAL</span>
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="hakkimizda.html" class="active-page" data-i18n="nav_about">Hakkımızda</a></li>
            <li><a href="oteller.html" data-i18n="nav_hotels">Oteller</a></li>
            <li><a href="yatlar.html" data-i18n="nav_yachts">Yatlar</a></li>
            <li><a href="restoranlar.html" data-i18n="nav_restaurants">Restoranlar</a></li>
            <li><a href="destinasyonlar.html" data-i18n="nav_guide">Gezi Rehberi</a></li>
            <li><a href="etkinlikler.html" data-i18n="nav_events">Etkinlikler</a></li>
            <li><a href="journal.html" data-i18n="nav_journal">Journal</a></li>
        </ul>
        <div class="nav-right">
            <div class="lang-switch desk-lang">
                <span id="lang-tr" class="lang-btn active">TR</span>
                <span>|</span>
                <span id="lang-en" class="lang-btn">EN</span>
            </div>
            <div class="hamburger" id="hamb">
                <span></span><span></span><span></span>
            </div>
        </div>
    </nav>
    <div class="fs-menu" id="fsMenu">
        <ul class="fs-links">
            <li><a href="hakkimizda.html" data-i18n="nav_about">Hakkımızda</a></li>
            <li><a href="oteller.html" data-i18n="nav_hotels">Oteller</a></li>
            <li><a href="yatlar.html" data-i18n="nav_yachts">Yatlar</a></li>
            <li><a href="restoranlar.html" data-i18n="nav_restaurants">Restoranlar</a></li>
            <div class="fs-divider"></div>
            <li><a href="destinasyonlar.html" data-i18n="nav_guide">Gezi Rehberi</a></li>
            <li><a href="etkinlikler.html" data-i18n="nav_events">Etkinlikler</a></li>
            <li><a href="journal.html" data-i18n="nav_journal">Journal</a></li>
            <li style="font-size:1.5rem;font-family:var(--font-display);margin-top:2rem;"><span id="lang-tr-fs" class="lang-btn active">TR</span> | <span id="lang-en-fs" class="lang-btn">EN</span></li>
        </ul>
    </div>

    <div class="page-hero" style="background-image:url('foto.img/hero_4k.jpg');">
        <div class="page-hero-content">
            <span class="page-eyebrow lang-text-tr">{!! $settings['about_eyebrow_tr'] ?? 'Biz Kimiz' !!}</span>
            <span class="page-eyebrow lang-text-en">{!! $settings['about_eyebrow_en'] ?? 'Who We Are' !!}</span>
            <h1 class="page-title lang-text-tr">{!! $settings['about_title_tr'] ?? '<em>Dioreal</em> Dijital' !!}</h1>
            <h1 class="page-title lang-text-en">{!! $settings['about_title_en'] ?? '<em>Dioreal</em> Digital' !!}</h1>
        </div>
    </div>

    <section class="content-section">
        <div class="content-grid">
            <div class="reveal">
                <span class="content-eyebrow lang-text-tr">{!! $settings['about_story_eyebrow_tr'] ?? 'Hikayemiz' !!}</span>
                <span class="content-eyebrow lang-text-en">{!! $settings['about_story_eyebrow_en'] ?? 'Our Story' !!}</span>
                <h2 class="content-title lang-text-tr">{!! $settings['about_story_title_tr'] ?? '15 yıldır lüks <em>seyahatin</em> sesi' !!}</h2>
                <h2 class="content-title lang-text-en">{!! $settings['about_story_title_en'] ?? '15 years of luxury <em>travel</em> storytelling' !!}</h2>
                <p class="content-body lang-text-tr">{!! nl2br(e($settings['about_p1_tr'] ?? '2010 yılında İstanbul\'da kurulan Dioreal Dijital, Türkiye\'nin öncü lüks seyahat ve yaşam tarzı medya platformuna dönüşmüştür. Seçkin destinasyonlar, premium markalar ve doğru kitleyi bir araya getiren köprü olmak misyonuyla kurulduk.')) !!}</p>
                <p class="content-body lang-text-en">{!! nl2br(e($settings['about_p1_en'] ?? 'Founded in 2010 in Istanbul, Dioreal Digital has evolved into Turkey\'s leading luxury travel and lifestyle media platform. We were established with the mission to bridge elite destinations, premium brands, and the right audience.')) !!}</p>
                <p class="content-body lang-text-tr">{!! nl2br(e($settings['about_p2_tr'] ?? 'Her destinasyonda bizzat bulunarak, her oteli bizatihi deneyimleyerek ve her markayı özenle seçerek güvenilir bir referans noktası haline geldik.')) !!}</p>
                <p class="content-body lang-text-en">{!! nl2br(e($settings['about_p2_en'] ?? 'By personally visiting each destination, experiencing every hotel, and carefully selecting each brand, we have become a trusted reference point.')) !!}</p>
            </div>
            <div class="reveal" style="transition-delay:0.2s">
                <img src="{{ asset($settings['about_story_img'] ?? 'foto.img/about_yacht.jpg') }}" alt="Hakkımızda" style="width:100%;aspect-ratio:4/3;object-fit:cover;">
            </div>
        </div>
    </section>

    <section class="content-section alt">
        <div style="text-align:center;max-width:800px;margin:0 auto 4rem;" class="reveal">
            <span class="content-eyebrow lang-text-tr" style="display:block;">{!! $settings['about_stats_eyebrow_tr'] ?? 'Rakamlarla' !!}</span>
            <span class="content-eyebrow lang-text-en" style="display:block;">{!! $settings['about_stats_eyebrow_en'] ?? 'By Numbers' !!}</span>
            <h2 class="content-title lang-text-tr">{!! $settings['about_stats_title_tr'] ?? '15 Yılın <em>Mirası</em>' !!}</h2>
            <h2 class="content-title lang-text-en">{!! $settings['about_stats_title_en'] ?? 'Legacy of 15 <em>Years</em>' !!}</h2>
        </div>
        <div class="stat-row reveal" style="justify-content:center;">
            <div class="stat-item">
                <span class="stat-num">150+</span>
                <span class="stat-label" data-i18n="stat_dest">Destinasyon</span>
            </div>
            <div class="stat-item">
                <span class="stat-num">2M+</span>
                <span class="stat-label" data-i18n="stat_readers">Aylık Okuyucu</span>
            </div>
            <div class="stat-item">
                <span class="stat-num">300+</span>
                <span class="stat-label" data-i18n="stat_brands">Marka Ortağı</span>
            </div>
            <div class="stat-item">
                <span class="stat-num">15</span>
                <span class="stat-label" data-i18n="stat_exp">Yıllık Deneyim</span>
            </div>
        </div>
    </section>

    <section class="content-section">
        <div class="content-grid reverse">
            <div class="reveal">
                <span class="content-eyebrow lang-text-tr">{!! $settings['about_mission_eyebrow_tr'] ?? 'Misyonumuz' !!}</span>
                <span class="content-eyebrow lang-text-en">{!! $settings['about_mission_eyebrow_en'] ?? 'Our Mission' !!}</span>
                <h2 class="content-title lang-text-tr">{!! $settings['about_mission_title_tr'] ?? 'Anlamlı <em>deneyimler</em> için' !!}</h2>
                <h2 class="content-title lang-text-en">{!! $settings['about_mission_title_en'] ?? 'For meaningful <em>experiences</em>' !!}</h2>
                <p class="content-body lang-text-tr">{!! nl2br(e($settings['about_mission_p1_tr'] ?? 'Dioreal olarak misyonumuz, sıradan tatillerin ötesine geçerek iz bırakan anlar tasarlamaktır. Küresel bir vizyonla, lokal zarafeti birleştiriyoruz.')) !!}</p>
                <p class="content-body lang-text-en">{!! nl2br(e($settings['about_mission_p1_en'] ?? 'At Dioreal, our mission is to go beyond ordinary vacations and design moments that leave a lasting mark. We combine a global vision with local sophistication.')) !!}</p>
                <p class="content-body lang-text-tr">{!! nl2br(e($settings['about_mission_p2_tr'] ?? 'Sadece destinasyon tanıtmakla kalmıyor, lüks yaşam kültürünü ve estetik seyahat felsefesini de paylaşıyoruz.')) !!}</p>
                <p class="content-body lang-text-en">{!! nl2br(e($settings['about_mission_p2_en'] ?? 'We do not just introduce destinations; we also share the luxury lifestyle culture and aesthetic travel philosophy.')) !!}</p>
            </div>
            <div class="reveal" style="transition-delay:0.2s">
                <img src="{{ asset($settings['about_mission_img'] ?? 'foto.img/about_safari.jpg') }}" alt="Misyon" style="width:100%;aspect-ratio:4/3;object-fit:cover;">
            </div>
        </div>
    </section>

    @include('partials.footer')
    <script src="js/i18n.js?v={{ time() }}"></script>
    <script src="js/common.js?v={{ time() }}"></script>
    <script src="js/nav.js?v={{ time() }}"></script>
</body>
</html>
