<?php
namespace Gazlab\Adapters;

class File extends \Gazlab\Uploader
{
    public function upload()
    {
        if ($this->request->hasFiles()) {
            $files = $this->request->getUploadedFiles();

            // Print the real file names and sizes
            foreach ($files as $file) {
                $filePaths[] = $this->storeDir . '/' . $file->getName();

                // Move the file into the application
                $file->moveTo(
                    $filePath
                );
            }

            return $filePaths;
        }
    }
}
