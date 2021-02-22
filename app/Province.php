<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Province extends Model
{
    public $additional_attributes = ['province_name_with_code'];

    public function getProvinceNameWithCodeAttribute()
    {
        return "{$this->code} - {$this->name}";
    }
}
