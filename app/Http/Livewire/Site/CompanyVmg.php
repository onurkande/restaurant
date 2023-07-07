<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;

class CompanyVmg extends Component
{
    public $records;
    public function render()
    {
        $this->records=app('App\Http\Controllers\CompanyVmgController')->view();
        return view('livewire.site.company-vmg',['records'=>$this->records]);
    }
}
