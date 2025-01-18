<?php
$book = isset($_GET['book']) ? $_GET['book'] : '';

$bookDir = './books/';

$bookPath = $bookDir . $book;

// Check if the file exists and read its contents
if (file_exists($bookPath)) {
    $bookContent = file_get_contents($bookPath);
    echo "<h1>Şair-in Sözləri</h1>";
    echo "<pre>$bookContent</pre>";
} else {
    if (file_exists($book)) {
        $content = file_get_contents($book);
        echo "<h1>File Content</h1>";
        echo "<pre>$content</pre>";
    } else {
        echo "<h1>Error: File not found!</h1>";
    }
}
?>

