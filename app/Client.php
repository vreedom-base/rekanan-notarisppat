<?php

namespace App;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Client extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->user_id && Auth::user()) {
            $this->user_id = Auth::user()->getKey();
        }

        return parent::save();
    }

    public function user()
    {
        $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getBirthPlaceReadAttribute()
    {
        return $this->birth_place . ', ' . date_format(date_create($this->birth_date), 'd-m-Y');
    }

    public function getBirthPlaceBrowseAttribute()
    {
        return $this->birth_place . ', ' . date_format(date_create($this->birth_date), 'd-m-Y');
    }
}
