<?php

namespace App\View\Components;

use App\Weather as AppWeather;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Weather extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(private AppWeather $weather)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View | Closure | string
    {
        return view('components.weather', [
            'sunny' => $this->weather->isSunnyTomorrow(),
        ]);
    }
}
