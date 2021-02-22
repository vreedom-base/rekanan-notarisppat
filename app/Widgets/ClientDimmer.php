<?php

namespace App\Widgets;

use App\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Widgets\BaseDimmer;

class ClientDimmer extends BaseDimmer
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
        $count = Client::all()->count();
        $string = "Klien";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-person',
            'title'  => "{$count} {$string}",
            'text'   => "Kamu mempunyai " . $count . ' ' . Str::lower($string) . " dalam database. Klik tombol dibawah untuk melihat semua klien.",
            'button' => [
                'text' => "Lihat semua klien",
                'link' => route('voyager.clients.index'),
            ],
            'image' => asset('/storage/images/widget-backgrounds/02.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', new Client());
    }
}
