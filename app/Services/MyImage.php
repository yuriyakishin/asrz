<?php

namespace App\Services;

use Intervention\Image\Facades\Image as ImageManager;
use App\Image;

class MyImage
{

    public function __construct() {

    }


    public function getImage(array $data)
    {
        $id = $data['id'];
        $full = $data['full'];
        $width = $data['width'];
        $height = $data['height'];
        $watermark = $data['watermark'];
        
        $imageEntity = Image::find($id);

        $pubDir = 'images/pub/';
        if($full) {
          $pubDir = 'images/pub/'.$imageEntity->image_dir.'full';
        } else {
          $pubDir = 'images/pub/'.$imageEntity->image_dir.''.$width.'x'.$height;
        }

        $pubDirAbsolutely = $_SERVER['DOCUMENT_ROOT'].'/'.$pubDir;
        $pubImage = $pubDir.'/'.$imageEntity->image_name;
        $pubImageAbsolutely = $pubDirAbsolutely.'/'.$imageEntity->image_name;

        $originalImage = $imageEntity->image;
        $originalImageAbsolutely = $_SERVER['DOCUMENT_ROOT'].'/'.$originalImage;

        if(!is_dir($pubDirAbsolutely))
        {
            mkdir($pubDirAbsolutely,0777,true);
        }

        if(!is_file($pubImageAbsolutely) && is_file($originalImageAbsolutely))
        {
            $image = ImageManager::make($originalImageAbsolutely);

            
            if($full)
            { 
                // create a new Image instance for inserting
                if($watermark === true) {
                    $watermark = ImageManager::make('img/watermark.png');
                    $image->insert($watermark, 'center');
                }
                
                $image->save($pubImageAbsolutely, 100);
            }
            else
            {
                // маштабируем по ширине
                if($width>0 && $height==0)
                {
                    $widthOriginal = $image->getWidth();
                    $heightOriginal = $image->getHeight();
                    $height = ($width * $heightOriginal) / $widthOriginal;
                }

                // маштабируем по высоте
                if($width==0 && $height>0)
                {
                    $widthOriginal = $image->getSize()->getWidth();
                    $heightOriginal = $image->getSize()->getHeight();
                    $width = ($height * $widthOriginal) / $heightOriginal;
                }

                $image->fit($width, $height);
                $image->save($pubImageAbsolutely, 100);
            }
        }

        //
        if(is_file($pubImageAbsolutely)) {
            return $pubImage;
        }
        else {
            return null;
        }
    }
    
    /**
     * 
     * @param string $imageFile
     * @return string
     */
    public function addWatermark(string $imageFile)
    {
        $imagePub = 'images/pub/'.$imageFile;
        $pubFileAbsolutely = $_SERVER['DOCUMENT_ROOT'].'/'.$imagePub;
        if(!is_file($pubFileAbsolutely))
        {
            
            
            $image = ImageManager::make($imageFile);
            $watermark = ImageManager::make('img/watermark.png');
            $image->insert($watermark, 'center');
            $image->save($pubFileAbsolutely, 100);
        }
        
        return $imagePub;
    }
}
