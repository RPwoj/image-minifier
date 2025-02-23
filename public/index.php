
<?php
  require_once __DIR__ . '/../vendor/autoload.php';
  use App\Utils\Compressor;
?>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/assets/css/main.css" />
</head>
<body>
  <section class="section-main">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="form-holder">
            <form action="#" method="post" enctype="multipart/form-data">
              <input type="file" id="file-to-upload" name="file" class="input-file">
              <input class="btn" type="submit" name="submit">
            </form>
            <?php if (isset($_POST['submit'])) {
                $compressor = new Compressor($_FILES);
                $args = $compressor->minify();
                echo '<div class="downloads-holder">';
                echo '<span class="download-file-name">' . $args->file . '</span>';
                echo '<a class="btn download-url" href="https://minifier.ytq.pl/download.php/?dir=' . $args->folder . '&file=' . $args->file . '" target="_blank">&#x21e9;</a>';
                echo '</div>';
            } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>