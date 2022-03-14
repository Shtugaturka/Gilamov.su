<?php

namespace App\Http\Widgets;

use App\Models\Good;
use Illuminate\Support\Str;


class GoodDimmer extends BaseDimmer
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
        /*$count = Good::active()->count();
        $string = trans_choice('Товаров', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-news',
            'title'  => "{$count} {$string}",
            'text'   => __('voyager::dimmer.post_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('voyager::dimmer.post_link_text'),
                'link' => route('voyager.goods.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));*/
    }


}
