<form action="#" method="post" enctype="multipart/form-data">
  <input type="file" id="file-to-upload" name="file"><br><br>
  <input type="submit" name="submit">
</form>
<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Compressor\Compressor;

if (isset($_POST['submit'])) {
    $compressor = new Compressor($_FILES);
    $args = $compressor->minify();
    echo '<a href="https://minifier.ytq.pl/download.php/?dir=' . $args->folder . '&file=' . $args->file . '" target="_blank">download</a>';
}

?>