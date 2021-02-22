<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class District extends Model
{
    public $additional_attributes = ['district_name_with_code'];

    public function getDistrictNameWithCodeAttribute()
    {
        return "{$this->code} - {$this->name}";
    }
}
