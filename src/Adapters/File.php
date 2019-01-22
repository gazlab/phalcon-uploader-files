<?php
namespace Gazlab\Adapters;

class File extends \Gazlab\Uploader
{
    public function upload()
    {
        if ($this->request->hasFiles()) {
            $files = $this->request->getUploadedFiles();

            $filePaths = [];

            // Print the real file names and sizes
            foreach ($files as $file) {
                // Move the file into the application
                $file->moveTo(
                    $this->storeDir . '/' . $file->getName()
                );

                $filePaths[] = $this->url . '/' . $file->getName();
            }

            return $filePaths;
        }
    }
}
