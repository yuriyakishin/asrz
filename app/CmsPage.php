<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsPage extends Model
{
    protected $fillable = ['code','value'];
    
    /**
     * 
     * @return array
     */
    public function getValue()
    {
        return unserialize($this->value);
    }
    
    /**
     * 
     * @param string $path
     * @return type
     */
    public static function getPage(string $path)
    {
        $row = self::where('code',$path)->first();
        if(isser($row))
        {
            return unserialize($row->value);
        }
        else
        {
            return null;
        }
    }
    
    /**
     * 
     */
    public function setValue(array $value)
    {
        $this->value = serialize($value);
    }
}
