<?php
// includes/section-title.php
// Reusable section title component
// Usage: <?php sectionTitle('Label Text', 'Main Title', 'Subtitle text'); ?>

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
?>
