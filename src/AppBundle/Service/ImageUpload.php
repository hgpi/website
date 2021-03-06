<?php
/**
 * Created by PhpStorm.
 * User: glefevre
 * Date: 02/03/2018
 * Time: 17:20
 */

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageUpload
{
    private $targetDir;

    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    public function upload(UploadedFile $file)
    {

        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move($this->getTargetDir(), $fileName);

        return $fileName;
    }

    public function remove($file) {
        $fileSystem = new Filesystem();
        $fileSystem->remove(array( $this->getTargetDir().'/'.$file));
    }

    public function getTargetDir()
    {
        return $this->targetDir;
    }
}