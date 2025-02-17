<?php

namespace App\Utils;

class FileCleaner
{

    public function delete($pathName) {
        $fullPath = '/var/www/minifier.ytq.pl/uploads/' . $pathName;
        $files = array_diff(scandir($fullPath), array('.', '..'));

        foreach ($files as $file) {
            unlink($fullPath . '/' . $file);
        }

        rmdir($fullPath);
    }

}