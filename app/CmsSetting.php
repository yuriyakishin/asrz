<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsSetting extends Model
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
     */
    public function setValue(array $value)
    {
        $this->value = serialize($value);
    }
}
