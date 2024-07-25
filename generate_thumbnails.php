<?php

$imagesDir = 'path/to/your/images/directory';
$thumbnailsDir = 'path/to/your/thumbnails/directory';
$thumbnailWidth = 300;
$thumbnailHeight = 200;

if (!file_exists($thumbnailsDir)) {
    mkdir($thumbnailsDir, 0777, true);
}

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$imagesPerPage = 20;
$offset = ($page - 1) * $imagesPerPage;

$images = array_slice(scandir($imagesDir), 2);
$totalImages = count($images);
$images = array_slice($images, $offset, $imagesPerPage);

$response = ['images' => []];

foreach ($images as $image) {
    $imagePath = $imagesDir . '/' . $image;
    $thumbnailPath = $thumbnailsDir . '/' . $image;

    if (!file_exists($thumbnailPath)) {
        createThumbnail($imagePath, $thumbnailPath, $thumbnailWidth, $thumbnailHeight);
    }

    $response['images'][] = [
        'src' => $thumbnailPath,
        'alt' => pathinfo($image, PATHINFO_FILENAME)
    ];
}

header('Content-Type: application/json');
echo json_encode($response);

function createThumbnail($src, $dest, $width, $height) {
    list($srcWidth, $srcHeight) = getimagesize($src);
    $srcRatio = $srcWidth / $srcHeight;
    $destRatio = $width / $height;

    if ($srcRatio > $destRatio) {
        $newHeight = $height;
        $newWidth = $srcWidth / ($srcHeight / $height);
    } else {
        $newWidth = $width;
        $newHeight = $srcHeight / ($srcWidth / $width);
    }

    $srcImage = imagecreatefromjpeg($src);
    $destImage = imagecreatetruecolor($width, $height);

    imagecopyresampled($destImage, $srcImage, 0 - ($newWidth - $width) / 2, 0 - ($newHeight - $height) / 2, 0, 0, $newWidth, $newHeight, $srcWidth, $srcHeight);

    imagejpeg($destImage, $dest);
    imagedestroy($srcImage);
    imagedestroy($destImage);
}
