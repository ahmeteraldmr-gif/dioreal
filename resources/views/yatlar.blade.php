<!DOCTYPE html>
<html lang="tr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yatlar — Dioreal Dijital</title>
    <meta name="description" content="Türkiye ve Akdeniz'de özel yat kiralama ve yat tatili deneyimleri. Dioreal Dijital premium yat koleksiyonu.">
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
            <li><a href="hakkimizda.html" data-i18n="nav_about">Hakkımızda</a></li>
            <li><a href="oteller.html" data-i18n="nav_hotels">Oteller</a></li>
            <li><a href="yatlar.html" class="active-page" data-i18n="nav_yachts">Yatlar</a></li>
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
            <li style="font-size: 1.5rem; font-family: var(--font-display); margin-top: 2rem;">
                <span id="lang-tr-fs" class="lang-btn active">TR</span> | <span id="lang-en-fs" class="lang-btn">EN</span>
            </li>
        </ul>
    </div>

    <div class="page-hero" style="background-image: url('foto.img/yat_manzara.jpg');">
        <div class="page-hero-content">
            <span class="page-eyebrow" data-i18n="yacht_hero_eye">Akdeniz'de Özgürlük</span>
            <h1 class="page-title" data-i18n="yacht_title">Özel <em>Yatlar</em></h1>
        </div>
    </div>

    <section class="content-section">
        <div class="content-grid">
            <div class="reveal">
                <span class="content-eyebrow" data-i18n="yacht_hol_eye">Yat Tatili</span>
                <h2 class="content-title" data-i18n="yacht_hol_title">Koydan koya, <em>özgürce</em></h2>
                <p class="content-body" data-i18n="yacht_hol_p1">Kendi rotanızı belirleyin, kendi hızınızda ilerleyin. Türkiye'nin turquoise kıyılarından Yunan adalarına, İtalyan rivieralarından Hırvatistan koylarına uzanan yolculuklarda lüks ve özgürlüğü bir arada yaşayın.</p>
                <a href="#yatlar" class="btn btn-primary" data-i18n="btn_explore_yachts">Yatları İncele</a>
            </div>
            <div class="reveal" style="transition-delay: 0.2s;">
                <img src="foto.img/yat_ozgur.jpg" alt="Özel Yat" style="width:100%; aspect-ratio: 4/3; object-fit: cover;">
            </div>
        </div>
    </section>

    <section class="content-section alt" id="yatlar">
        <div style="text-align: center; margin-bottom: 4rem;">
            <span class="content-eyebrow" style="display: block;" data-i18n="yacht_fleet_eye">Filo</span>
            <h2 class="content-title" style="font-size: clamp(2rem, 4vw, 3rem);" data-i18n="yacht_fleet_title">Premium <em>Yat Filomuz</em></h2>
        </div>
        <div class="card-grid">
            @foreach($yatlar as $y)
                <div class="card reveal visible">
                    <div class="card-img" style="background-image: url('{{ asset($y->img) }}');"></div>
                    <div class="card-body">
                        <span class="card-tag lang-text-tr">{{ $y->tag["tr"] ?? "" }}</span>
                        <span class="card-tag lang-text-en">{{ $y->tag["en"] ?? "" }}</span>
                        
                        <h3 class="card-title lang-text-tr">{{ $y->name["tr"] ?? "" }}</h3>
                        <h3 class="card-title lang-text-en">{{ $y->name["en"] ?? "" }}</h3>
                        
                        <p class="card-desc lang-text-tr">{{ $y->desc["tr"] ?? "" }}</p>
                        <p class="card-desc lang-text-en">{{ $y->desc["en"] ?? "" }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="content-section">
        <div class="content-grid reverse">
            <div class="reveal">
                <span class="content-eyebrow" data-i18n="yacht_route_eye">Güzergah Planlaması</span>
                <h2 class="content-title" data-i18n="yacht_route_title">Her yolculuk <em>size özel</em></h2>
                <p class="content-body" data-i18n="yacht_route_p1">Bodrum'dan Marmaris'e mavi yolculuk, Ege adaları turu ya da Akdeniz'den Adriyatik'e uzanan epik rotalar — siz hayal edin, biz planlayalım. Deneyimli kaptanlarımız ve özel aşçılarımızla konfor ve lüks güvencesinde.</p>
                <a href="#" class="btn btn-outline" data-i18n="btn_plan_route">Rota Planlat</a>
            </div>
            <div class="reveal" style="transition-delay: 0.2s;">
                <img src="foto.img/yat_rota.jpg" alt="Yat Rotası" style="width:100%; aspect-ratio: 4/3; object-fit: cover;">
            </div>
        </div>
    </section>

    @include('partials.footer')

    <script src="js/i18n.js?v={{ time() }}"></script>
    <script src="js/common.js?v={{ time() }}"></script>
    <script src="js/nav.js?v={{ time() }}"></script>
</body>
</html>


