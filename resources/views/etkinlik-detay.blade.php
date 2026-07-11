<!DOCTYPE html>
<html lang="tr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $etkinlik->title['tr'] ?? 'Etkinlik Detayı' }} — Dioreal Dijital</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500&family=Jost:wght@200;300;400;500;600&family=Oswald:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/nav-footer.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}?v={{ time() }}">
    <style>
        body {
            background-color: var(--off-white);
            color: var(--dark-gray);
        }
        .page-hero {
            position: relative;
            height: 60vh;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--white);
        }
        .page-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3));
            z-index: 1;
        }
        .page-hero-content {
            position: relative;
            z-index: 2;
            padding: 2rem;
            max-width: 900px;
        }
        .page-eyebrow {
            font-family: var(--font-condensed);
            font-size: 0.9rem;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 1.5rem;
            display: block;
        }
        .page-title {
            font-family: var(--font-display);
            font-size: clamp(3rem, 6vw, 4.5rem);
            line-height: 1.1;
            font-weight: 300;
            text-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }
        
        .detail-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 5rem 2rem;
        }
        
        .detail-grid {
            display: grid;
            grid-template-columns: 2.2fr 1fr;
            gap: 5rem;
            align-items: start;
        }
        
        .detail-story {
            font-size: 1.15rem;
            line-height: 2;
            color: #4a4745;
        }
        
        .detail-story p {
            margin-bottom: 2rem;
        }
        
        .detail-section-title {
            font-family: var(--font-display);
            font-size: 2.5rem;
            color: var(--near-black);
            margin-bottom: 1.8rem;
            font-weight: 400;
            border-bottom: 1px solid rgba(200, 169, 110, 0.15);
            padding-bottom: 1rem;
        }
        
        .detail-section-title em {
            font-style: italic;
            font-weight: 300;
            color: var(--accent);
        }
        
        .detail-sidebar-card {
            background: var(--white);
            border: 1px solid rgba(200, 169, 110, 0.15);
            border-radius: 16px;
            padding: 2.5rem;
            position: sticky;
            top: 120px;
            box-shadow: 0 15px 40px rgba(29, 27, 26, 0.04);
        }
        
        .sidebar-title {
            font-family: var(--font-condensed);
            font-size: 1rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--near-black);
            margin-bottom: 1.5rem;
            border-bottom: 1px solid rgba(200, 169, 110, 0.1);
            padding-bottom: 1rem;
        }
        
        .sidebar-info-item {
            margin-bottom: 1.5rem;
            display: flex;
            align-items: flex-start;
            gap: 1.2rem;
            font-size: 1.05rem;
        }
        
        .sidebar-info-item i {
            color: var(--accent);
            font-size: 1.2rem;
            margin-top: 0.2rem;
        }
        
        .sidebar-info-label {
            font-size: 0.8rem;
            color: var(--mid-gray);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 0.3rem;
            font-weight: 500;
        }
        
        .sidebar-info-value {
            color: var(--near-black);
            font-weight: 400;
        }
        
        .btn-booking {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            width: 100%;
            background: var(--accent);
            color: var(--white);
            padding: 1.2rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            font-size: 0.9rem;
            transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
            box-shadow: 0 10px 25px rgba(200, 169, 110, 0.15);
            margin-top: 2rem;
            border: none;
            cursor: pointer;
        }
        
        .btn-booking:hover {
            background: var(--near-black);
            color: var(--white);
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(26, 24, 22, 0.2);
        }

        /* Gallery Grid */
        .gallery-section {
            max-width: 1200px;
            margin: 4rem auto 6rem;
            padding: 0 2rem;
        }
        .gallery-header {
            text-align: center;
            margin-bottom: 3.5rem;
        }
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }
        .gallery-img-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            aspect-ratio: 1/1;
            box-shadow: 0 15px 35px rgba(29, 27, 26, 0.06);
            transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.4s ease;
            cursor: pointer;
        }
        .gallery-img-wrapper:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(29, 27, 26, 0.12);
        }
        .gallery-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
        }
        .gallery-img-wrapper:hover img {
            transform: scale(1.05);
        }

        /* Other Events Hover Effect */
        .event-card-link:hover .event-card {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(29, 27, 26, 0.1) !important;
            border-color: var(--accent) !important;
        }
        
        @media (max-width: 992px) {
            .detail-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
            .detail-sidebar-card {
                position: static;
                margin-top: 2rem;
            }
        }
        @media (max-width: 768px) {
            .detail-container {
                padding: 3rem 1rem;
            }
            .detail-sidebar-card {
                padding: 1.5rem;
            }
            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.8rem;
            }
            .gallery-section {
                padding: 3rem 1rem;
            }
            .video-section {
                padding: 0 1rem !important;
                margin: 2rem auto !important;
            }
        }
    </style>
</head>
<body>

    <!-- Desktop Nav -->
    <nav id="mainNav">
        <div class="nav-logo-wrapper">
            <a href="{{ url('/') }}" class="nav-logo">
                <span class="logo-text">DIOREAL</span>
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="{{ url('/hakkimizda') }}" data-i18n="nav_about">Hakkımızda</a></li>
            <li><a href="{{ url('/oteller') }}" data-i18n="nav_hotels">Oteller</a></li>
            <li><a href="{{ url('/yatlar') }}" data-i18n="nav_yachts">Yatlar</a></li>
            <li><a href="{{ url('/restoranlar') }}" data-i18n="nav_restaurants">Restoranlar</a></li>
            <li><a href="{{ url('/destinasyonlar') }}" data-i18n="nav_guide">Gezi Rehberi</a></li>
            <li><a href="{{ url('/etkinlikler') }}" class="active-page" data-i18n="nav_events">Etkinlikler</a></li>
            <li><a href="{{ url('/journal') }}" data-i18n="nav_journal">Journal</a></li>
        </ul>
        <div class="nav-right">
            <div class="lang-switch desk-lang">
                <span id="lang-tr" class="lang-btn">TR</span>
                <span>|</span>
                <span id="lang-en" class="lang-btn">EN</span>
            </div>
            <div class="hamburger" id="hamb">
                <span></span><span></span><span></span>
            </div>
        </div>
    </nav>

    <!-- Fullscreen Menu -->
    <div class="fs-menu" id="fsMenu">
        <ul class="fs-links">
            <li><a href="{{ url('/hakkimizda') }}" data-i18n="nav_about">Hakkımızda</a></li>
            <li><a href="{{ url('/oteller') }}" data-i18n="nav_hotels">Oteller</a></li>
            <li><a href="{{ url('/yatlar') }}" data-i18n="nav_yachts">Yatlar</a></li>
            <li><a href="{{ url('/restoranlar') }}" data-i18n="nav_restaurants">Restoranlar</a></li>
            <div class="fs-divider"></div>
            <li><a href="{{ url('/destinasyonlar') }}" data-i18n="nav_guide">Gezi Rehberi</a></li>
            <li><a href="{{ url('/etkinlikler') }}" data-i18n="nav_events">Etkinlikler</a></li>
            <li><a href="{{ url('/journal') }}" data-i18n="nav_journal">Journal</a></li>
            <li class="lang-switch" style="font-size: 1.5rem; font-family: var(--font-display); justify-content: center; margin-top:3rem;">
                <span id="lang-tr-fs" class="lang-btn">TR</span> | <span id="lang-en-fs" class="lang-btn">EN</span>
            </li>
        </ul>
    </div>

    <!-- Page Hero -->
    @php
        $heroBg = !empty($etkinlik->img) ? asset($etkinlik->img) : asset('foto.img/etkinlik_hero.jpg');
    @endphp
    <div class="page-hero" style="background-image: url('{{ $heroBg }}');">
        <div class="page-hero-content">
            <span class="page-eyebrow lang-text-tr">{{ $etkinlik->tag['tr'] ?? '' }}</span>
            <span class="page-eyebrow lang-text-en">{{ $etkinlik->tag['en'] ?? '' }}</span>
            <h1 class="page-title lang-text-tr">{{ $etkinlik->title['tr'] ?? '' }}</h1>
            <h1 class="page-title lang-text-en">{{ $etkinlik->title['en'] ?? '' }}</h1>
        </div>
    </div>

    <!-- Content Layout -->
    <section class="detail-container">
        <div class="detail-grid">
            
            <!-- Left story -->
            <div class="detail-story reveal">
                <h2 class="detail-section-title" data-i18n="detail_about_event">Etkinlik <em>Hakkında</em></h2>
                
                <div class="lang-text-tr">
                    {!! nl2br(!empty($etkinlik->long_desc['tr']) ? $etkinlik->long_desc['tr'] : ($etkinlik->desc['tr'] ?? '')) !!}
                </div>
                <div class="lang-text-en">
                    {!! nl2br(!empty($etkinlik->long_desc['en']) ? $etkinlik->long_desc['en'] : ($etkinlik->desc['en'] ?? '')) !!}
                </div>
            </div>

            <!-- Right info box -->
            <div class="detail-sidebar-card reveal" style="transition-delay: 0.2s">
                <h3 class="sidebar-title" data-i18n="detail_event_info">Etkinlik Detayları</h3>
                
                <div class="sidebar-info-item">
                    <i class="fas fa-calendar-alt"></i>
                    <div>
                        <div class="sidebar-info-label" data-i18n="label_date">Tarih</div>
                        <div class="sidebar-info-value lang-text-tr">{{ $etkinlik->day }} {{ $etkinlik->month['tr'] ?? '' }}</div>
                        <div class="sidebar-info-value lang-text-en">{{ $etkinlik->day }} {{ $etkinlik->month['en'] ?? '' }}</div>
                    </div>
                </div>

                <div class="sidebar-info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <div class="sidebar-info-label" data-i18n="label_location">Mekan / Konum</div>
                        <div class="sidebar-info-value lang-text-tr">{{ $etkinlik->loc['tr'] ?? '' }}</div>
                        <div class="sidebar-info-value lang-text-en">{{ $etkinlik->loc['en'] ?? '' }}</div>
                    </div>
                </div>

                <div class="sidebar-info-item">
                    <i class="fas fa-tag"></i>
                    <div>
                        <div class="sidebar-info-label" data-i18n="label_category">Kategori</div>
                        <div class="sidebar-info-value lang-text-tr">{{ $etkinlik->tag['tr'] ?? '' }}</div>
                        <div class="sidebar-info-value lang-text-en">{{ $etkinlik->tag['en'] ?? '' }}</div>
                    </div>
                </div>

                @if(!empty($etkinlik->phone))
                    <div class="sidebar-info-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <div class="sidebar-info-label" data-i18n="label_phone">Telefon / WhatsApp</div>
                            <div class="sidebar-info-value">{{ $etkinlik->phone }}</div>
                        </div>
                    </div>
                @endif

                @php
                    $wpNumber = !empty($etkinlik->phone) ? preg_replace('/[^0-9]/', '', $etkinlik->phone) : ($settings['whatsapp'] ?? '905320000000');
                @endphp
                <a href="https://wa.me/{{ $wpNumber }}?text=Merhaba,%20{{ urlencode($etkinlik->title['tr'] ?? $etkinlik->title['en'] ?? 'Etkinlik') }}%20hakkında%20detaylı%20bilgi%20almak%20istiyorum." 
                   target="_blank" 
                   class="btn-booking">
                    <i class="fab fa-whatsapp"></i>
                    <span data-i18n="detail_booking_event">Bilgi Al / Katıl</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Tanıtım Videosu Section -->
    @if(!empty($etkinlik->video_file) || !empty($etkinlik->video_url))
        <section class="video-section reveal" style="max-width: 1200px; margin: 4rem auto; padding: 0 2rem;">
            <div class="gallery-header" style="text-align: center; margin-bottom: 3.5rem;">
                <h2 class="detail-section-title" data-i18n="detail_video">Tanıtım <em>Videosu</em></h2>
            </div>
            <div class="video-container" style="position: relative; border-radius: 16px; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.15); background: #000; aspect-ratio: 16/9; max-width: 900px; margin: 0 auto;">
                @if(!empty($etkinlik->video_file))
                    <video src="{{ asset($etkinlik->video_file) }}" controls style="width: 100%; height: 100%; object-fit: cover;"></video>
                @elseif(!empty($etkinlik->video_url))
                    @php
                        $embedUrl = $etkinlik->video_url;
                        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/', $etkinlik->video_url, $matches)) {
                            $embedUrl = 'https://www.youtube.com/embed/' . $matches[1];
                        }
                    @endphp
                    <iframe src="{{ $embedUrl }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="position: absolute; top:0; left:0; width:100%; height:100%; border:none;"></iframe>
                @endif
            </div>
        </section>
    @endif

    <!-- Asymmetrical Gallery Grid -->
    <section class="gallery-section reveal">
        <div class="gallery-header">
            <h2 class="detail-section-title" data-i18n="detail_gallery">Fotoğraf <em>Galerisi</em></h2>
        </div>
        
        <div class="gallery-grid">
            @if(!empty($etkinlik->gallery) && is_array($etkinlik->gallery))
                @foreach($etkinlik->gallery as $g)
                    <div class="gallery-img-wrapper">
                        <img src="{{ str_starts_with($g, 'data:') || str_starts_with($g, 'http') ? $g : asset($g) }}" alt="Etkinlik Görseli">
                    </div>
                @endforeach
            @else
                <div style="grid-column: span 12; text-align: center; color: var(--mid-gray); padding: 3rem 0;" data-i18n="detail_no_gallery">
                    Galeri bulunmamaktadır.
                </div>
            @endif
        </div>
    </section>



    <!-- Diğer Etkinlikler Section -->
    @if($otherEvents && count($otherEvents) > 0)
        <section class="other-events-section reveal" style="max-width: 1200px; margin: 6rem auto 4rem; padding: 0 2rem;">
            <div class="gallery-header" style="text-align: center; margin-bottom: 3.5rem;">
                <h2 class="detail-section-title" data-i18n="other_events_title">Diğer <em>Etkinlikler</em></h2>
            </div>
            <div class="other-events-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                @foreach($otherEvents as $oe)
                    @php
                        $oeBg = !empty($oe->img) ? asset($oe->img) : asset('foto.img/etkinlik_hero.jpg');
                    @endphp
                    <a href="{{ route('etkinlik.detay', $oe->id) }}" class="event-card-link" style="text-decoration: none; color: inherit;">
                        <div class="event-card" style="background: var(--white); border: 1px solid rgba(200, 169, 110, 0.15); border-radius: 12px; overflow: hidden; transition: all 0.4s ease; box-shadow: 0 10px 30px rgba(0,0,0,0.02); height: 100%; display: flex; flex-direction: column;">
                            <div class="event-card-img" style="height: 200px; background-image: url('{{ $oeBg }}'); background-size: cover; background-position: center; position: relative;">
                                <div class="event-card-date" style="position: absolute; bottom: 1rem; left: 1rem; background: var(--near-black); color: var(--white); padding: 0.5rem 1rem; border-radius: 6px; font-family: var(--font-condensed); text-align: center;">
                                    <span style="font-size: 1.1rem; font-weight: 600; display: block; line-height: 1;">{{ $oe->day }}</span>
                                    <span class="lang-text-tr" style="font-size: 0.75rem; text-transform: uppercase;">{{ $oe->month['tr'] ?? '' }}</span>
                                    <span class="lang-text-en" style="font-size: 0.75rem; text-transform: uppercase;">{{ $oe->month['en'] ?? '' }}</span>
                                </div>
                            </div>
                            <div class="event-card-content" style="padding: 1.5rem; flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between;">
                                <div>
                                    <span class="event-card-tag lang-text-tr" style="color: var(--accent); font-size: 0.8rem; font-family: var(--font-condensed); letter-spacing: 0.1em; text-transform: uppercase;">{{ $oe->tag['tr'] ?? '' }}</span>
                                    <span class="event-card-tag lang-text-en" style="color: var(--accent); font-size: 0.8rem; font-family: var(--font-condensed); letter-spacing: 0.1em; text-transform: uppercase;">{{ $oe->tag['en'] ?? '' }}</span>
                                    <h3 class="event-card-title lang-text-tr" style="font-family: var(--font-display); font-size: 1.5rem; margin: 0.5rem 0; font-weight: 400; color: var(--near-black);">{{ $oe->title['tr'] ?? '' }}</h3>
                                    <h3 class="event-card-title lang-text-en" style="font-family: var(--font-display); font-size: 1.5rem; margin: 0.5rem 0; font-weight: 400; color: var(--near-black);">{{ $oe->title['en'] ?? '' }}</h3>
                                </div>
                                <div class="event-card-footer" style="display: flex; align-items: center; justify-content: space-between; margin-top: 1rem; border-top: 1px solid rgba(200, 169, 110, 0.1); padding-top: 1rem;">
                                    <span style="font-size: 0.85rem; color: var(--mid-gray);">
                                        <i class="fas fa-map-marker-alt" style="color: var(--accent); margin-right: 0.25rem;"></i>
                                        <span class="lang-text-tr">{{ $oe->loc['tr'] ?? '' }}</span>
                                        <span class="lang-text-en">{{ $oe->loc['en'] ?? '' }}</span>
                                    </span>
                                    <span style="color: var(--accent); font-weight: 500; font-size: 0.9rem;">
                                        <span class="lang-text-tr">Detaylar <i class="fas fa-arrow-right" style="margin-left: 0.25rem; font-size: 0.8rem;"></i></span>
                                        <span class="lang-text-en">Details <i class="fas fa-arrow-right" style="margin-left: 0.25rem; font-size: 0.8rem;"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    @include('partials.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/i18n.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('js/common.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('js/nav.js') }}?v={{ time() }}"></script>
</body>
</html>

