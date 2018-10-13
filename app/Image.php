<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * Прикрепляем новые фото к сущности
     * 
     * @param array $where
     * @param array $set
     */
    public static function imagePush(array $where, array $set)
    {
        $set['temp'] = 0;
        self::where($where)->update($set);
    }
    
    /**
     * Обновляем данные фото
     * 
     * @param int $pathId
     * @param string $path
     * @param \Illuminate\Http\Request $request
     */
    public static function imageUpdate($pathId, $path, $request)
    {
        // Удаляем картинки
        $imageDelete = $request->image_delete;
        if($imageDelete)
        {
            $imageDeleteArrayId = [];
            foreach($imageDelete as $key => $value)
            {
                $imageDeleteArrayId[] = $key;                
            }
            self::destroy($imageDeleteArrayId);
        }
        
        // Обновляем данные о картинках
        $images = self::where(['path_id' => $pathId, 'path' => $path])->get();
        foreach ($images as $image)
        {
            $comment = $request->image_comment[$image->id];
            $sort = $request->image_sort[$image->id];
            //
            $image->comment = $comment;
            $image->sort = $sort;
            if(isset($request->image_active[$image->id])) {
                $image->active = 1;
            } else {
                $image->active = 0;
            }
            
            $image->save();
        }
        
    }
}
