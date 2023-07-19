<?php

class MediaLibraryAdapter implements MediaLibraryInterface
{

    private $adapterObj;

    public function __construct()
    {
        $this->adapterObj = new MediaLibraryThirdParty();
    }

    public function upload($pathToFile) : string
    {
        return $this->adapterObj->addMedia($pathToFile);
    }

    public function get(string $fileCode): string
    {
        // TODO: Implement get() method.
        return $this->adapterObj->getMedia($fileCode);
    }

    public function __call($name, $arguments)
    {
        if (method_exists($this->adapterObj, $name)) {
           return call_user_func_array([$this->adapterObj, $name], $arguments);
        } else {
            throw new Exception("Метод $name не найден");
        }
    }

}