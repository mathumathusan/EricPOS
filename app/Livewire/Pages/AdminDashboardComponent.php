<?php

namespace App\Livewire\Pages;

use App\Models\Customer;
use App\Models\Location;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $count = [
           'stores' => Location::whereIsActive(true)->get()->count(),
           'customers' => Customer::whereIsActive(true)->get()->count(),
           'products' => Location::whereIsActive(true)->get()->count(),

        ];
        return view('livewire.pages.admin-dashboard-component',compact('count'));
    }
}
