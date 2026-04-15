<?php
// includes/section-title.php
// Yeniden kullanilabilir section baslik bileseni
// sectionTitle('Label', 'Baslik', 'Alt baslik') seklinde kullanilir

function sectionTitle($label, $title, $subtitle = '', $id = '') {
    $idAttr = $id ? "id=\"$id\"" : '';
    echo "<div class=\"nx-section-title reveal\" $idAttr>";
    if ($label) {
        echo "<div class=\"nx-label\"><i class=\"fa-solid fa-cube\"></i> $label</div>";
    }
    echo "<h2>$title</h2>";
    if ($subtitle) {
        echo "<p>$subtitle</p>";
    }
    echo "</div>";
}
