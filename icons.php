<?php
$cssPath = 'apps/css/awesome.6.4.0.min.css'; // CSS dosyasının yolu
$cssContent = file_get_contents($cssPath);

// Regex ile tüm .fa-* sınıflarını al
preg_match_all('/\.fa-([a-z0-9\-]+)(?=\s*[:{,])/', $cssContent, $matches);

// Benzersiz sınıflar
$iconClasses = array_unique($matches[1]);
sort($iconClasses); // alfabetik sırala
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Font Awesome Tüm İkonlar</title>
    <link rel="stylesheet" href="apps/css/awesome.6.4.0.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .icon-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            gap: 15px;
        }
        .icon-item {
            text-align: center;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .icon-item i {
            font-size: 24px;
            display: block;
            margin-bottom: 6px;
        }
    </style>
</head>
<body>
    <h1>Tüm Font Awesome 6.4.0 Sınıfları</h1>
    <div class="icon-grid">
        <?php foreach ($iconClasses as $icon): ?>
            <div class="icon-item">
                <i class="fa fa-<?= $icon ?>"></i>
                fa-<?= $icon ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
