<?php

namespace Laratube;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Support\Str;

class Model extends BaseModel
{
    public $incrementing = false;

    protected $guarded = [];

    protected static function boot(){
        parent::boot();

        //register model hook
        static::creating(function($model){
            $model->{$model->getKeyName()} = (string)Str::uuid();
        });

    }
}
