<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// 1. Destination Guides (guides table) Mapping
$mapping = [
    'Gümüşlük' => 'foto.img/destinations/gumusluk.png',
    'Yalıkavak' => 'foto.img/destinations/yalikavak.png',
    'Bitez' => 'foto.img/destinations/bitez.png',
    'Türkbükü' => 'foto.img/destinations/turkbuku.png',
    'Gündoğan' => 'foto.img/destinations/gundogan.png',
    'Torba' => 'foto.img/destinations/torba.png',
    'Turgutreis' => 'foto.img/destinations/turgutreis.png',
    'Ortakent' => 'foto.img/destinations/ortakent.png',
    'Akyarlar' => 'foto.img/destinations/akyarlar.png',
    'Güvercinlik' => 'foto.img/destinations/guvercinlik.png',
    'Mazı' => 'foto.img/destinations/mazi.png',
    'Kale' => 'foto.img/destinations/bodrum_kalesi.png',
    'Eski Datça' => 'foto.img/destinations/eski_datca.png',
    'Datça' => 'foto.img/datca.jpg',
    'Bodrum' => 'foto.img/bodrum.jpg'
];

echo "=== UPDATE START ===\n";

// Update Destination Guides (guides table)
$destCount = 0;
foreach (App\Models\Guide::all() as $g) {
    $titleTr = $g->title['tr'] ?? '';
    foreach ($mapping as $keyword => $img) {
        if (mb_strpos($titleTr, $keyword) !== false) {
            if ($keyword === 'Datça' && mb_strpos($titleTr, 'Eski Datça') !== false) {
                continue;
            }
            if ($keyword === 'Bodrum' && mb_strpos($titleTr, 'Kale') !== false) {
                continue;
            }
            $g->img = $img;
            $g->save();
            $destCount++;
            break;
        }
    }
}
echo "SUCCESS: Updated $destCount destination guides.\n";

// 2. Destinations (destinations table) Mapping
$destTableMapping = [
    'Bodrum' => 'foto.img/bodrum.jpg',
    'Datça' => 'foto.img/datca.jpg',
    'Fethiye' => 'foto.img/fethiye.jpg',
    'Alaçatı' => 'foto.img/cesme.jpg',
    'Çeşme' => 'foto.img/cesme.jpg',
    'Kekova' => 'foto.img/yat_manzara.jpg',
    'Göcek' => 'foto.img/about_yacht.jpg',
    'Bozburun' => 'foto.img/yat_hero.jpg',
    'İstanbul' => 'foto.img/istanbul.jpg',
    'Kapadokya' => 'foto.img/kapadokya.jpg',
    'Kaş' => 'foto.img/kas.jpg',
    'Maldivler' => 'foto.img/maldivler.jpg',
    'Japonya' => 'foto.img/japonya.jpg',
    'Kyoto' => 'foto.img/japonya.jpg',
    'Patagonya' => 'foto.img/patagonya.jpg',
    'Kosta Rika' => 'foto.img/patagonya.jpg',
    'Amalfi' => 'foto.img/amalfi.jpg',
    'Toskana' => 'foto.img/amalfi.jpg',
    'Norveç' => 'foto.img/norvec.jpg',
    'İsviçre' => 'foto.img/norvec.jpg',
    'İzlanda' => 'foto.img/norvec.jpg',
    'Lapland' => 'foto.img/norvec.jpg',
    'Sahra' => 'foto.img/sahra.jpg',
    'Petra' => 'foto.img/sahra.jpg',
    'Seyşeller' => 'foto.img/maldivler.jpg',
    'Paris' => 'foto.img/istanbul.jpg'
];

$destTableCount = 0;
foreach (App\Models\Destination::all() as $d) {
    $nameTr = $d->name['tr'] ?? '';
    $updated = false;
    foreach ($destTableMapping as $keyword => $img) {
        if (mb_strpos($nameTr, $keyword) !== false) {
            $d->img = $img;
            $d->save();
            $destTableCount++;
            $updated = true;
            break;
        }
    }
    if (!$updated) {
        $d->img = 'foto.img/bodrum.jpg';
        $d->save();
        $destTableCount++;
    }
}
echo "SUCCESS: Updated $destTableCount destination table records.\n";

// Update Journals (News) with unique existing images
$journalImages = [
    "foto.img/norvec.jpg",
    "foto.img/sahra.jpg",
    "foto.img/japonya.jpg",
    "foto.img/patagonya.jpg",
    "foto.img/maldivler.jpg",
    "foto.img/about_safari.jpg",
    "foto.img/about_yacht.jpg",
    "foto.img/amalfi.jpg"
];
$journalCount = 0;
$jIndex = 0;
foreach (App\Models\Journal::all() as $j) {
    $img = $journalImages[$jIndex % count($journalImages)];
    $j->img = $img;
    $j->save();
    $jIndex++;
    $journalCount++;
}
echo "SUCCESS: Updated $journalCount Journal articles.\n";

// Update Events with unique existing images
$eventImages = [
    "foto.img/etkinlik_hero.jpg",
    "foto.img/hero_slide_2.jpg",
    "foto.img/hero_slide_3.jpg",
    "foto.img/about_safari.jpg",
    "foto.img/about_yacht.jpg"
];
$eventCount = 0;
$eIndex = 0;
foreach (App\Models\Event::all() as $e) {
    $img = $eventImages[$eIndex % count($eventImages)];
    $e->img = $img;
    $e->save();
    $eIndex++;
    $eventCount++;
}
echo "SUCCESS: Updated $eventCount Events.\n";

echo "=== ALL DATABASE RECORDS UPDATED SUCCESSFULLY ===\n";
