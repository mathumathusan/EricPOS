<?php

namespace App\Livewire\Pages;

use App\Models\Location;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $count = [
           'store' => Location::whereIsActive(true)->get()->count(),
        ];
        return view('livewire.pages.admin-dashboard-component',compact('count'));
    }
}
