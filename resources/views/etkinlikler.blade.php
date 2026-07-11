<!DOCTYPE html>
<html lang="tr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etkinlikler — Dioreal Dijital</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500&family=Jost:wght@200;300;400;500;600&family=Oswald:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/base.css?v={{ time() }}">
    <link rel="stylesheet" href="css/nav-footer.css?v={{ time() }}">
    <link rel="stylesheet" href="css/components.css?v={{ time() }}">
    <link rel="stylesheet" href="css/about.css?v={{ time() }}">
    <link rel="stylesheet" href="css/events.css?v={{ time() }}">
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
            <li><a href="yatlar.html" data-i18n="nav_yachts">Yatlar</a></li>
            <li><a href="restoranlar.html" data-i18n="nav_restaurants">Restoranlar</a></li>
            <li><a href="destinasyonlar.html" data-i18n="nav_guide">Gezi Rehberi</a></li>
            <li><a href="etkinlikler.html" class="active-page" data-i18n="nav_events">Etkinlikler</a></li>
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

    <div class="page-hero" style="background-image:url('foto.img/etkinlik_hero.jpg');">
        <div class="page-hero-content">
            <span class="page-eyebrow" data-i18n="event_hero_eye">Takvim 2026</span>
            <h1 class="page-title" data-i18n="nav_events">Seçkin <em>Etkinlikler</em></h1>
        </div>
    </div>

    <section class="content-section">
        <div style="max-width:1200px;margin:0 auto;padding: 0 2rem;">
            <div style="text-align:center;margin-bottom:4rem;" class="reveal">
                <span class="content-eyebrow" style="display:block;" data-i18n="event_intro_eye">Bu Sezon</span>
                <h2 class="content-title" data-i18n="event_intro_title">Kaçırılmayacak <em>Anlar</em></h2>
            </div>
            <div class="events-grid">
                @foreach($etkinlikler as $e)
                    <div class="event-card reveal visible">
                        <div class="event-card-image" style="background-image: url('{{ asset($e->img) }}');">
                            <div class="event-date-badge">
                                <span class="badge-day">{{ $e->day }}</span>
                                <span class="badge-month lang-text-tr">{{ $e->month["tr"] ?? "" }}</span>
                                <span class="badge-month lang-text-en">{{ $e->month["en"] ?? "" }}</span>
                            </div>
                        </div>
                        <div class="event-card-body">
                            <span class="event-tag lang-text-tr">{{ $e->tag["tr"] ?? "" }}</span>
                            <span class="event-tag lang-text-en">{{ $e->tag["en"] ?? "" }}</span>
                            
                            <h3 class="event-card-title lang-text-tr">{{ $e->title["tr"] ?? "" }}</h3>
                            <h3 class="event-card-title lang-text-en">{{ $e->title["en"] ?? "" }}</h3>
                            
                            <div class="event-location-info">
                                <i class="fas fa-map-marker-alt"></i>
                                <span class="lang-text-tr">{{ $e->loc["tr"] ?? "" }}</span>
                                <span class="lang-text-en">{{ $e->loc["en"] ?? "" }}</span>
                            </div>
                            
                            <a href="{{ route('etkinlik.detay', $e->id) }}" class="btn-event-explore">
                                <span class="lang-text-tr">Detayları İncele</span>
                                <span class="lang-text-en">View Details</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.footer')
    <script src="js/i18n.js?v={{ time() }}"></script>
    <script src="js/common.js?v={{ time() }}"></script>
    <script src="js/nav.js?v={{ time() }}"></script>
</body>
</html>


