<?php
namespace Components;

class Gallery
{
    private $dirName;
    private $allowedExtension = [];
    private $pictureExtension;

    public function __construct($dirName, array $allowedExtension)
    {
        $this->setDirName($dirName);
        $this->setAllowedExtension($allowedExtension);
    }

    public function savePicture($pictureName, $varFile, $width, $height)
    {
        $fileInformation = pathinfo($varFile['name']);
        $fileExtension = $fileInformation['extension'];

        if (in_array($fileExtension, $this->allowedExtension))
        {
            if ($fileExtension == 'jpg' || $fileExtension == 'jpeg')
            {
                $source = imagecreatefromjpeg($varFile['tmp_name']);
            }

            else
            {
                $source = 'imagecreatefrom'.$fileExtension;
                $source = $source($varFile['tmp_name']);
            }

            $destination = imagecreatetruecolor($width, $height);

            $width_source = imagesx($source);
            $height_source = imagesy($source);
            $width_destination = imagesx($destination);
            $height_destination = imagesy($destination);

            imagecopyresampled($destination, $source, 0, 0, 0, 0, $width_destination, $height_destination, $width_source, $height_source);

            if ($fileExtension == 'jpg' || $fileExtension == 'jpeg')
            {
                imagejpeg($destination, $this->dirName.'/'.$pictureName.'.'.$fileExtension);
            }

            else
            {
                $imageSave = 'image'.$fileExtension;
                $imageSave($destination, $this->dirName.'/'.$pictureName.'.'.$fileExtension);

            }

        }

        else
        {
            throw new \RuntimeException('L\'extension du fichier n\'est pas autorisé !');
        }
    }

        public function getPicture($pictureName)
        {
            foreach ($this->allowedExtension as $key => $extension) 
            {
                $picture = $this->dirName.'/'.$pictureName.'.'.$extension;

                if (file_exists($picture))
                {
                    $picture = '/'.$picture;
                    return $picture;
                }
            }
        }

        public function deletePicture($pictureName)
        {
            foreach ($this->allowedExtension as $key => $extension) 
            {
                $picture = $this->dirName.'/'.$pictureName.'.'.$extension;

                if (file_exists($picture))
                {
                    unlink($picture);
                }
            }
        }

        public function setAllowedExtension(array $allowedExtension)
        {
            if (!empty($allowedExtension))
            {
                $this->allowedExtension = $allowedExtension;
            }
        }

        public function setDirName($dirName)
        {
            if (!empty($dirName) && is_string($dirName))
            {
                $this->dirName = $dirName;
            }
        }
}

