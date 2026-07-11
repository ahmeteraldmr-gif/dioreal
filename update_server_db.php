<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

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

echo "=== ACTIVE DATABASE UPDATE START ===\n";
$updatedCount = 0;
foreach (App\Models\Guide::all() as $g) {
    $titleTr = $g->title['tr'] ?? '';
    foreach ($mapping as $keyword => $img) {
        if (mb_strpos($titleTr, $keyword) !== false) {
            // Special check: do not match Datça if it is Eski Datça
            if ($keyword === 'Datça' && mb_strpos($titleTr, 'Eski Datça') !== false) {
                continue;
            }
            // Special check: do not match Bodrum if it is Bodrum Kalesi
            if ($keyword === 'Bodrum' && mb_strpos($titleTr, 'Kale') !== false) {
                continue;
            }
            
            $g->img = $img;
            $g->save();
            echo "SUCCESS: Match found for keyword '$keyword' -> '{$titleTr}' updated to '{$img}'\n";
            $updatedCount++;
            break;
        }
    }
}
echo "=== UPDATE FINISHED. Total updated: $updatedCount ===\n";
