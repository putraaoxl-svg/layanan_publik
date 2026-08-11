<?php
$dir = __DIR__;
$files = glob($dir . '/*.php');
foreach ($files as $file) {
    if (basename($file) === 'fix.php') continue;
    $content = file_get_contents($file);
    $content = preg_replace('/(\s*)\'metadata\'\s*=>\s*\[.*?\],/s', '', $content);
    $content = preg_replace('/(\s*)\'photo_path\'\s*=>\s*\'.*?\',/s', '', $content);
    file_put_contents($file, $content);
}
echo 'Done';
