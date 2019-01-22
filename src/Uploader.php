<?php
namespace Gazlab;

class Uploader extends \Phalcon\Mvc\User\Plugin
{
    public $storage = 'file';
    public $baseStoreDir = BASE_PATH . '/public/files';
    public $storeDir;
    public $adapter;

    public function __construct()
    {
        if (is_null($this->storeDir)) {
            $this->storeDir = $this->baseStoreDir . '/modelName';
        }

        $this->adapter = '\Gazlab\Adapters\\' . ucwords($this->storage);
    }

    public static function mountUploader()
    {
        $adapter = self::adapter;
        $adapter = new $adapter();

        return json_encode($adapter->upload());
    }
}
