<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;

class Gallery
{
    /**
	 * 
	 * @var string
	 * @access private
	 */
    private $dirName;

    /**
	 * 
	 * @var array
	 * @access private
	 */
    private $allowedExtension = [];

    /**
	 * @access public
	 * @param string $dirName
	 * @param array $allowedExtension
	 */
    public function __construct($dirName, array $allowedExtension)
    {
        $this->setDirName($dirName);
        $this->setAllowedExtension($allowedExtension);
    }

    /**
     * Save upload picture and resize this
	 * @access public
	 * @param string $pictureName
	 * @param array $varFile
	 * @param int $width
	 * @param int $height
	 * @return void
	 */
    public function savePicture($pictureName, array $varFile, $width, $height)
    {
        $actualName = $varFile['tmp_name'];

        // Get MIME of file
        $upload_mime_type = mime_content_type($actualName);

        if (in_array($upload_mime_type, ['image/jpeg', 'image/pjpeg', 'image/png'])) {

            $extension = pathinfo($varFile['name'], PATHINFO_EXTENSION);

            // New tmp name of file
            $name = bin2hex(random_bytes(16));

            $file = $this->dirName.'/'.$name.'.'.$extension;

            move_uploaded_file($actualName, $file);

            $handle = fopen($file, 'r');

            $error = 0;

            // Verify the file is not a script
            while (!feof($handle) AND $error == 0) {

                $buffer = fgets($handle);

                switch (true) {

                    case strstr($buffer,'<?php'):
                    $error = 1;
                    break;

                    case strstr($buffer,'<?='):
                    $error = 1;
                    break;
                }
            }

            fclose($handle);

            // Destroy file if not a picture 
            if ($error == 1 | !getimagesize($file)) {

                unlink($file);

            // Else create new picture
            } else {

                if ($upload_mime_type == 'image/jpeg' || $upload_mime_type == 'image/pjpeg') {

                    $source = imagecreatefromjpeg($file);

                } else {

                    if ($upload_mime_type != 'image/jpeg' && $upload_mime_type != 'image/pjpeg') {

                        $method = 'imagecreatefrom'.$extension;
                        $source = $method($file);
                    }
                }

                // For resize picture
                $destination = imagecreatetruecolor($width, $height);

                // Get dimensions of picture
                $width_source = imagesx($source);
                $height_source = imagesy($source);
                $width_destination = imagesx($destination);
                $height_destination = imagesy($destination);

                imagecopyresampled($destination, $source, 0, 0, 0, 0, $width_destination, 
                                    $height_destination, $width_source, $height_source);

                // Save new resize picture
                if ($extension == 'jpg' || $extension == 'jpeg') {

                    unlink($file);
                    imagejpeg($destination, $this->dirName.'/'.$pictureName.'.'.$extension);

                } else {
                    
                    unlink($file);
                    $imageSave = 'image'.$extension;
                    $imageSave($destination, $this->dirName.'/'.$pictureName.'.'.$extension);
                }
            }
        }
    }

    /**
     * Get the path of picture with name
     * 
	 * @access public
	 * @param string $pictureName
	 * @return string
	 */
    public function getPicture($pictureName)
    {
        foreach ($this->allowedExtension as $key => $extension) {

            $picture = $this->dirName.'/'.$pictureName.'.'.$extension;

            if (file_exists($picture)) {

                $picture = '/'.$picture;
                return $picture;
            }
        }
    }

    /**
     * Delete picture with name
     * 
	 * @access public
	 * @param string $pictureName
	 * @return void
	 */
    public function deletePicture($pictureName)
    {
        foreach ($this->allowedExtension as $key => $extension) {

            $picture = $this->dirName.'/'.$pictureName.'.'.$extension;

            if (file_exists($picture)) {

                unlink($picture);
            }
        }
    }

    /**
	 * @access public
	 * @param array $allowedExtension
	 * @return void
	 */
    public function setAllowedExtension(array $allowedExtension)
    {
        if (!empty($allowedExtension)) {

            $this->allowedExtension = $allowedExtension;
        }
    }

    /**
	 * @access public
	 * @param string $dirName
	 * @return void
	 */
    public function setDirName($dirName)
    {
        if (!empty($dirName) && is_string($dirName)) {

            $this->dirName = $dirName;
        }
    }
}

