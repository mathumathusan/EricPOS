<?php

namespace App\Livewire\Pages\Job;

use App\Models\JobFrame;
use App\Models\JobOrder;
use App\Models\JobPrescription;
use Livewire\Component;

class JobListComponent extends Component
{
    protected $listeners = ['delete'];

    public function render()
    {
          $jobs = JobOrder::get();
          $prescriptions=JobPrescription::get();
          $frames=JobFrame::get();
        //  $products=Product::paginate(5);
        //  return view('livewire.pages.product.product-list-component',compact('products'));
        return view('livewire.pages.job.job-list-component',compact('jobs','prescriptions','frames'));
    }
    public function delete($id)
    {
        $product = JobOrder::find($id);
        $prescription=JobPrescription::where("job_order_id",$id)->first();
        $frame=JobFrame::where('job_id',$id)->first();
        if ($product) {
            $product->delete();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'job order Successfully Deleted']);
            cache()->flush();
        }if($prescription){
            $prescription->delete();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Prescription Successfully Deleted']);
            cache()->flush();
        }
        if($frame){
            $frame->delete();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'frame Successfully Deleted']);
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
