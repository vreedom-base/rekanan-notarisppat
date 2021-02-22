<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class City extends Model
{
    public $additional_attributes = ['city_name_with_code'];

    public function getCityNameWithCodeAttribute()
    {
        return "{$this->code} - {$this->name}";
    }
}
