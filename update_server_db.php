<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// 1. Destinations Mapping
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

// Update Destinations
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
