<?php
/**
 * Created by PhpStorm.
 * User: glefevre
 * Date: 01/03/2018
 * Time: 15:12
 */

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class FileUploader
{
    private $targetDir;
    private $token_storage;

    public function __construct($targetDir, TokenStorage $token_storage)
    {
        $this->targetDir = $targetDir;
        $this->token_storage = $token_storage;
    }

    public function upload(UploadedFile $file)
    {
        $fileName = str_replace(' ','_',$file->getClientOriginalName());

        $file->move($this->getTargetDir().'/'.$this->token_storage->getToken()->getUser()->getId(), $fileName);

        return $fileName;
    }

    public function remove($id_user) {
        $fileSystem = new Filesystem();
        $fileSystem->remove(array( $this->getTargetDir().'/'.$id_user));
    }

    public function getTargetDir()
    {
        return $this->targetDir;
    }

}