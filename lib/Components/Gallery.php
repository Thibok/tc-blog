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
        $actualName = $varFile['tmp_name'];

        $upload_mime_type = mime_content_type($actualName);

        if (in_array($upload_mime_type, ['image/jpeg', 'image/pjpeg', 'image/png']))
        {
            $extension = pathinfo($varFile['name'], PATHINFO_EXTENSION);

            $name = bin2hex(random_bytes(16));

            $file = $this->dirName.'/'.$name.'.'.$extension;

            move_uploaded_file($actualName, $file);

            $handle = fopen($file, 'r');

            $error = 0;

            while (!feof($handle) AND $error == 0) 
            {
                $buffer = fgets($handle);

                switch (true) 
                {
                    case strstr($buffer,'<?php'):
                    $error = 1;
                    break;

                    case strstr($buffer,'<?='):
                    $error = 1;
                    break;
                }
            }

            fclose($handle);

            if ($error == 1 | !getimagesize($file))
            {
                unlink($file);
            }

            else
            {
                if ($upload_mime_type == 'image/jpeg' || $upload_mime_type == 'image/pjpeg')
                {
                    $source = imagecreatefromjpeg($file);
                }
                        
                else
                {
                    if ($upload_mime_type != 'image/jpeg' && $upload_mime_type != 'image/pjpeg')
                    {
                        $method = 'imagecreatefrom'.$extension;
                        $source = $method($file);
                    }
                }

                $destination = imagecreatetruecolor($width, $height);

                $width_source = imagesx($source);
                $height_source = imagesy($source);
                $width_destination = imagesx($destination);
                $height_destination = imagesy($destination);

                imagecopyresampled($destination, $source, 0, 0, 0, 0, $width_destination, $height_destination, $width_source, $height_source);

                if ($extension == 'jpg' || $extension == 'jpeg')
                {
                    unlink($file);
                    imagejpeg($destination, $this->dirName.'/'.$pictureName.'.'.$extension);
                }

                else
                {
                    unlink($file);
                    $imageSave = 'image'.$extension;
                    $imageSave($destination, $this->dirName.'/'.$pictureName.'.'.$extension);
                }
            }
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

