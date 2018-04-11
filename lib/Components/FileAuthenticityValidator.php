<?php
namespace Components;

class FileAuthenticityValidator extends Validator
{
    private $path;

    public function __construct($errorMessage, $path)
    {
        parent::__construct($errorMessage);
        $this->setPath($path);
    }

    public function isValid($value)
    {
        if (empty($value))
        {
            return true;
        }

        else
        {
            $actualName = $value['tmp_name'];
            $newName = str_shuffle('nf86Lp34c09');
            $fileInfos = pathinfo($value['name']);
            $extension = $fileInfos['extension'];
            $file = $this->path.'/'.$newsName.'.'.$extension;

            move_uploaded_file($actualName, $file);

            $handle = fopen($file, 'r');
            
            if ($handle) 
            {
                $error = 0;
                while (!feof($handle) AND $error == 0)
                {
                    $buffer = fgets($handle);
                    switch (true) 
                    {
                        case strstr($buffer,'<'):
                        $error += 1;
                        break;

                        case strstr($buffer,'>'):
                        $error += 1;
                        break;

                        case strstr($buffer,';'):
                        $error += 1;
                        break;

                        case strstr($buffer,'&'):
                        $error += 1;
                        break;

                        case strstr($buffer,'?'):
                        $error += 1;
                        break;
                    }
                }

                if ($error == 1)
                {
                    fclose($handle);
                    unlink($file);
                    return false;
                }
            }

            fclose($handle);
            unlink($file);
            return true;
        }
    }

    public function setPath($path)
    {
        if(file_exists($path))
        {
            $this->path = $path;
        }

        else
        {
            throw new RuntimeException('Le dossier spécifiée n\'existe pas !');
        }
    }
}