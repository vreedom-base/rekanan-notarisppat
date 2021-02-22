<?php

namespace App\Widgets;

use App\District;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class DistrictDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = District::all()->count();
        $string = "Kecamatan";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-location',
            'title'  => "{$count} {$string}",
            'text'   => "Ada " . $count . ' ' . Str::lower($string) . " yang terdaftar. Klik tombol dibawah untuk melihat semua kecamatan.",
            'button' => [
                'text' => "Lihat semua kecamatan",
                'link' => route('voyager.districts.index'),
            ],
            'image' => asset('/storage/images/widget-backgrounds/03.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', new District());
    }
}
