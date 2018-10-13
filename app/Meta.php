<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $fillable = ['path_id','path','title','description','keywords'];
    
    /**
     * 
     * @param int $pathId
     * @param string $path
     * @return Meta
     */
    public static function getMeta(int $pathId, string $path)
    {
        $meta = self::where(['path_id' => $pathId, 'path' => $path])->first();
        return $meta;
    }
}