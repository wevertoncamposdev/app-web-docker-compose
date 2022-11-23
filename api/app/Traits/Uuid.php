<?php

namespace App\Traits;
use Illuminate\Support\Str;

trait Uuid
{

    protected static function boot(){
        parent::boot();
        static::creating(function($model){
            if(!$model->getKey){
                $model->setAttribute($model->getUuidName(), Str::uuid()->toString());
            };
        });
    }

    public function getUuidName()
    {
        return property_exists($this, 'uuidName') ? $this->uuidName : 'uuid';
    }

    public function getIncrementing()
    {
        return false;
    }
    public function getKeyType()
    {
        return 'string';
    }
}