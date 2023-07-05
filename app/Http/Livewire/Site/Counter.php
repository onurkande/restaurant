<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;

class Counter extends Component
{
    public $records;
    public function render()
    {
        $this->records=app('App\Http\Controllers\CounterController')->view();
        return view('livewire.site.counter',['records'=>$this->records]);
    }
}
