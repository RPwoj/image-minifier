<?php

namespace Compressor;

use Datetime;

class Compressor
{

    private $time;
    private $dirName;
    private $targetDir;
    private $files;
    private $targetFile;


    public function __construct($files) {
        $dateTime = new DateTime();
        $this->time = $dateTime->format('Y-m-d H:i:s');
        $this->dirName = hash('adler32', $this->time);
        $this->targetDir = "/var/www/minifier.ytq.pl/uploads/" . $this->dirName;
        $this->files = $files;
    }

    public function minify(): string
    {
        if ($this->files) {
            
            foreach ($this->files as $file) {
                mkdir($this->targetDir, 0755);
                $this->targetFile = $this->targetDir . '/' . basename($file['name']);
                move_uploaded_file($file["tmp_name"], $this->targetFile);

                shell_exec("pngquant --force --skip-if-larger --quality=65-80 --output " . escapeshellarg($this->targetFile) . " " . escapeshellarg($this->targetFile));

            }
        }

        return basename($this->targetFile);
    }
}