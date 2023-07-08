<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;

class AboutChoose extends Component
{
    public $records;
    public function render()
    {
        $this->records=app('App\Http\Controllers\AboutChooseController')->view();
        return view('livewire.site.about-choose',['records'=>$this->records]);
    }
}
