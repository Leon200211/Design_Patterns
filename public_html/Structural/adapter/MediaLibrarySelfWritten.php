<?php

class MediaLibrarySelfWritten implements MediaLibraryInterface
{

    public function upload(string $pathToFile) : string
    {
        return md5(__METHOD__ . $pathToFile);
    }

    public function get(string $fileCode) : string
    {
        return '';
    }

}