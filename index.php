<form action="#" method="post" enctype="multipart/form-data">
  <input type="file" id="file-to-upload" name="file"><br><br>
  <input type="submit" name="submit">
</form>
<?php
$time = new DateTime();
$time = $time->format('Y-m-d H:i:s');

$dirName = hash('adler32', $time);

$targetDir = "/var/www/minifier.ytq.pl/uploads/" . $dirName;
if (isset($_POST['submit'])) {
    echo 'test';
    $files = $_FILES;
    foreach ($files as $file) {

      mkdir($targetDir, 0755);
        $targetFile = $targetDir . '/' . basename($file['name']);
        move_uploaded_file($file["tmp_name"], $targetFile);
    }
}

?>