<?php

namespace App\Livewire\Pages\Sales;

use App\Models\Sales;
use App\Models\SalesItem;
use Auth;
use Livewire\Component;

class SaleListComponent extends Component
{

    protected $listeners = ['delete'];

    public $search;
    public function render()
    {

       $sales=Sales::query()
                 ->where('job_order_id', 'like', '%' . $this->search . '%')
                 ->orWhere('id', 'like', '%' . $this->search . '%')
                 ->get();
      

        $salesitems=SalesItem::all();
        return view('livewire.pages.sales.sale-list-component',compact('sales','salesitems'));
    }

    public function delete($id)
    {
        $sale= Sales::find($id);
        $salesitem=SalesItem::where("sales_id",$id)->first();
        if ($sale) {
            $sale->delete();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'sales Successfully Deleted']);
            cache()->flush();
        }if($salesitem){
            $salesitem->delete();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'sales items Successfully Deleted']);
            cache()->flush();
        }
    }
    public function deleteConfirm($id)
    {
        $this->dispatch('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => '',
            'id' => $id,
        ]);
    }
}
