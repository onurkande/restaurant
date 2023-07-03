<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;

class Footer extends Component
{
    public $records;
    public function render()
    {
        $this->records=app('App\Http\Controllers\FooterController')->view();
        return view('livewire.site.footer',['records'=>$this->records]);
    }
}
