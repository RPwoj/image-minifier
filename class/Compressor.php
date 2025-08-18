<?php

namespace App\Utils;

use Datetime;
use stdClass;

class Compressor
{

    private $time;
    private $dirName;
    private $targetDir;
    private $files;
    private $targetFile;
    private $res;

    public function __construct($files) {
        $dateTime = new DateTime();
        $this->time = $dateTime->format('Y-m-d H:i:s');
        $this->dirName = hash('adler32', $this->time);
        $this->targetDir = __DIR__ . '/../uploads/' . $this->dirName;
        $this->files = $files;
    }

    public function minify(): object
    {
        if ($this->files) {
            mkdir($this->targetDir, 0755);

            for($i = 0; $i < count($_FILES['files']['name']); $i++) {
                $this->targetFile = $this->targetDir . '/' . basename($this->files['name'][$i]);
                move_uploaded_file($this->files["tmp_name"][$i], $this->targetFile);
                shell_exec("pngquant --force --skip-if-larger --quality=40-80 --output " . escapeshellarg($this->targetFile) . " " . escapeshellarg($this->targetFile));
            }
        
            $this->res = new stdClass();

            if(count($_FILES['files']['name']) > 1) {
                shell_exec("cd " . escapeshellarg($this->targetDir) . " && zip -rm " . escapeshellarg($this->targetDir . "/minified-images.zip") . " .");
                $this->res->file = "minified-images.zip";
            } else {
                $this->res->file = basename($this->targetFile);
            }

            $this->res->folder = $this->dirName;

            return $this->res;
        }



    }
}