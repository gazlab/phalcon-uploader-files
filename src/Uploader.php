<?php
namespace Gazlab;

class Uploader extends \Phalcon\Mvc\User\Plugin
{
    public $storage = 'file';
    public $url = '/public/files';
    public $storeDir;
    public $adapter;

    public function __construct()
    {
        if (is_null($this->storeDir)) {
            $this->storeDir = BASE_PATH . $this->baseStoreDir . '/modelName';
        }

        $this->adapter = '\Gazlab\Adapters\\' . ucwords($this->storage);
    }

    public static function mountUploaders()
    {
        $adapter = (new self)->adapter;
        $adapter = new $adapter();

        return json_encode($adapter->upload());
    }
}
