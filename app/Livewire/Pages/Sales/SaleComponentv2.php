<?php

namespace App\Livewire\Pages\Sales;

use App\Models\Customer;
use App\Models\JobOrder;
use App\Models\Location;
use App\Models\Product;
use App\Models\Sales;
use App\Models\SalesItem;
use Auth;
use Carbon\Carbon;
use Exception;
use Livewire\Component;

use function Laravel\Prompts\error;

class SaleComponentv2 extends Component
{

    public $selectedProducts = [];
    public $total;
    public $discount;
    public $count;

    public $sale=[
        'id'=>'',
        'location_id'=>'',
        'customer_id'=>'',
        'sales_date'=>'',
        'sales_by'=>'',
        'created_by'=>'',
        'sub_total'=>'',
        'discount'=>'',
        'total'=>'',
        'balance'=>'',
        'job_order_id'=>'',
        'status'=>'good',
    ];

    public $saleitem=[
        'id'=>'',
        'sales_id'=>'',
        'product_id'=>'',
        'qty'=>'',
        'unit_amount'=>'',
        'sub_total'=>'',
        'discount'=>'',
        'total'=>'',
        'job_order_id'=>'',
    ];

    public function render()
    {

       $locations=Location::all();
       $customers=Customer::all();
       $customers2=Customer::pluck('cus_name','id');
       $joborderid=JobOrder::pluck('id');
       $lastjoborder=JobOrder::latest()->first();
       $lastId=$lastjoborder->id;
       $products=Product::all();
       $locations = Location::whereIsActive(true)->pluck('name','id');
       
       
    //    $this->sale['job_order_id']=$lastId;
        return view('livewire.pages.sales.sale-componentv2',compact('locations','customers','customers2','joborderid','products','locations'));
    }

    public function mount($id = null)
    {
        try {
            // Initialize necessary fields here
            if ($id) {
                // If $id is provided, fetch the sales data and populate the fields
                $sale = Sales::findOrFail($id);
                $this->sale['id'] = $sale->id;
                $this->sale['location_id'] = $sale->location_id;
                $this->sale['customer_id'] = $sale->customer_id;
                $this->sale['sales_date'] = $sale->sales_date;
                $this->sale['sales_by'] = $sale->sales_by;
                $this->sale['created_by'] = $sale->created_by;
                $this->sale['sub_total'] = $sale->sub_total;
                $this->sale['discount'] = $sale->discount;
                $this->sale['total'] = $sale->total;
                $this->sale['balance'] = $sale->balance;
                $this->sale['job_order_id'] = $sale->job_order_id;
                $this->sale['status'] = $sale->status;
    
                // Fetch and populate SalesItem related fields
                $salesItem = SalesItem::where('sales_id', $sale->id)->first();
                if ($salesItem) {
                    $this->saleitem['id'] = $salesItem->id;
                    $this->saleitem['product_id'] = $salesItem->product_id;
                    $this->saleitem['qty'] = $salesItem->qty;
                    $this->saleitem['unit_amount'] = $salesItem->unit_amount;
                    $this->saleitem['sub_total'] = $salesItem->sub_total;
                    $this->saleitem['discount'] = $salesItem->discount;
                    $this->saleitem['total'] = $salesItem->total;
                    $this->saleitem['job_order_id'] = $salesItem->job_order_id;
                }
            } else {
                // If $id is not provided, initialize fields with default values or null
                $this->sale = [
                    'id' => null,
                    'location_id' => null,
                    'customer_id' => null,
                    'sales_date' => now(), // Example: set sales_date to current date/time
                    'sales_by' => null,
                    'created_by' => null,
                    'sub_total' => null,
                    'discount' => null,
                    'total' => null,
                    'balance' => null,
                    'job_order_id' => null,
                    'status' => null,
                    // Initialize other fields accordingly
                ];
                
                // Initialize SaleItem fields
                $this->saleitem = [
                    'id' => null,
                    'sales_id' => null,
                    'product_id' => null,
                    'qty' => null,
                    'unit_amount' => null,
                    'sub_total' => null,
                    'discount' => null,
                    'total' => null,
                    'job_order_id' => null,
                    // Initialize other fields accordingly
                ];
            }
        } catch (Exception $e) {
            // Handle the exception gracefully, for example, log it or display a message to the user
            dd($e->getMessage()); // This will print the error message to the screen for debugging
        }
    }
    

    public function createProduct($id){
           $product=Product::findOrFail($id);
          
           $this->selectedProducts[$id] = [
            'id' => $product->id,
            'name' => $product->product_name,
            'quantity' => 0,
            'price'=>0,
            'discount'=>0
        ];  
     
         $this->count++;
      
    }


    public function increment($id){
        if (isset($this->selectedProducts[$id])&&($this->selectedProducts[$id]['discount']||$this->selectedProducts[$id]['price'])) {
            $this->discount+=$this->selectedProducts[$id]['discount'];
            $this->selectedProducts[$id]['quantity']++;
            $this->total+=$this->selectedProducts[$id]['price'];
          
            $this->count++;
        }
    }

    public function decrement($id){
        if (isset($this->selectedProducts[$id]) &&$this->selectedProducts[$id]['quantity']>0&&($this->selectedProducts[$id]['discount']||$this->selectedProducts[$id]['price'])) {
            $this->discount-=$this->selectedProducts[$id]['discount'];
            $this->selectedProducts[$id]['quantity']--;
            $this->total-=$this->selectedProducts[$id]['price'];     
            $this->count--;
        } else {
            unset($this->selectedProducts[$id]);
            $this->total=0;
        }
    }

    public function cancelProduct($id) {
        $this->total=$this->total-$this->selectedProducts[$id]['price']*$this->selectedProducts[$id]['quantity'];     
        $this->discount=$this->discount-$this->selectedProducts[$id]['discount']*$this->selectedProducts[$id]['quantity'];
        unset($this->selectedProducts[$id]);
        
    }

    public function cancel(){
        $this->total=0;
        $this->discount=0;
        unset($this->selectedProducts);
    }

    protected function rules()
    {
      
    return [
        // Sale validation rules
        'sale.location_id' => 'required|exists:locations,id',
        'sale.customer_id' => 'required|exists:customers,id',
        'sale.sales_date' => 'required|date',
        'sale.job_order_id' => 'nullable|exists:job_orders,id',
        'sale.discount' => 'nullable|numeric|min:0',
        'sale.status' => 'nullable|string',
        
        // Sale item validation rules
        'saleitem.product_id' => 'required|exists:products,id',
        'saleitem.qty' => 'required|numeric|min:1',
        'saleitem.unit_amount' => 'required|numeric|min:0',
        'saleitem.discount' => 'nullable|numeric|min:0',
    ];
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
            'unique' => 'The :attribute must be unique.',
            'numeric' => 'The :attribute must be a number.',
            'min' => 'The :attribute must be at least :min.',
            'date' => 'The :attribute must be a valid date.',
            'after_or_equal' => 'The :attribute must be after or equal to the Job Date.',
            'integer' => 'The :attribute must be an integer.',
            'string' => 'The :attribute must be a string.',
        ];
    }


   public function updateData(){

    if($this->selectedProducts){
    $sale = $this->sale['id'] ? Sales::findOrFail($this->sale['id']) : new Sales();
    $sale->location_id = Auth::user()->locations()->first()->id;
    $sale->sales_date = Carbon::today();
    $sale->sales_by = auth()->user()->id;
    $sale->created_by = auth()->user()->id;
    $sale->status = "good";
    $sale->save();

    foreach($this->selectedProducts as $productId => $product){
        $saleitem = $this->saleitem['id'] ? SalesItem::findOrFail($this->saleitem['id']) : new SalesItem();
        $saleitem->sales_id=$sale->id;
        $saleitem->product_id=$productId;
        $saleitem->qty=$product['quantity'];
        $saleitem->unit_amount =$product['price'];
        $saleitem->sub_total=$product['price']*$product['quantity'];
        $saleitem->discount=$product['discount'];
        $saleitem->save();
    }

    $sale->sub_total = $this->total;
    $sale->discount=$this->discount;
    $sale->total = $sale->sub_total - $sale->discount;
    $sale->balance =  $sale->total ;
    $sale->save();
    return redirect()->route('print',$sale->id);

    // return redirect()->route('sales')->with('success',$this->sale['id']?'updated Successfully':"created successfully");

}
   }

   public function printData(){


    $this->validate();
    
    $sale = $this->sale['id'] ? Sales::findOrFail($this->sale['id']) : new Sales();
    $sale->location_id = $this->sale['location_id'];
    $sale->customer_id = $this->sale['customer_id'];
    $sale->sales_date = $this->sale['sales_date'];
    $sale->sales_by = auth()->user()->id;
    $sale->created_by = auth()->user()->id;
    $sale->job_order_id = $this->sale['job_order_id'];

  

    if ($this->sale['job_order_id']) {
    
        $jobOrder = JobOrder::findOrFail($this->sale['job_order_id']);

        // Calculate sub_total based on frame_amount, lens_amount, and discount_amount
        $subTotal = $jobOrder->frame_amount + $jobOrder->lens_amount - $jobOrder->discount_amount;
        $sale->sub_total = $subTotal;

        $sale->discount = $this->sale['discount'];
        $sale->total = $subTotal - $this->sale['discount'];

        // Access the balance_amount property from the JobOrder
        $sale->balance = $jobOrder->balance_amount;
    }else {
        // If job_order_id is not provided, set the fields to null or default values
        $sale->job_order_id = null;
        $sale->sub_total = null;
        $sale->discount = $this->sale['discount'] ?? null;
        $sale->total = null;
        $sale->balance = null;
    }

    $sale->status = $this->sale['status'];
    $sale->save();

    $saleitem = $this->saleitem['id'] ? SalesItem::findOrFail($this->saleitem['id']) : new SalesItem();
    $saleitem->sales_id = $sale->id;
    $saleitem->product_id = $this->saleitem['product_id'];
    $saleitem->qty = $this->saleitem['qty'];
    $saleitem->unit_amount = $this->saleitem['unit_amount']; 
    $saleitem->sub_total = $saleitem->qty*$saleitem->unit_amount;

    $saleitem->discount = $this->saleitem['discount']; 
    $saleitem->total = $saleitem->sub_total -$saleitem->discount ;
    $this->saleitem['sub_total']=$saleitem->qty*$saleitem->unit_amount ;
    $this->saleitem['total']=$saleitem->sub_total -$saleitem->discount ;
    $saleitem->job_order_id = $sale->job_order_id;

    $saleitem->save();

    $sale->sub_total += $saleitem->sub_total;
    $sale->total = $sale->sub_total - $sale->discount;
    $sale->balance +=  $sale->total ;
    $sale->save();

    return redirect()->route('print',$sale->id);

    
   }

// customer component below
public $updateMode = false;
protected $listeners = ['delete'];

public $customer = [
    'id' => '',
    'location_id' => '',
    'cus_name' => '',
    'email' => '',
    'address' => '',
    'dob' => '',
    'mobile' => '',
    'phone' => '',
    'remark' => '',
    'created_by'=>'',
    'is_active' => false,
];


public function edit($id)
{
    $this->updateMode = true;

    $this->customer['id'] = $id;

    $customer = Customer::findOrFail($this->customer['id']);

    if ($customer) {
        # code...

        $this->customer = [
            'id' => $customer->id,
            'location_id' => $customer->location_id,
            'cus_name' => $customer->cus_name,
            'email' => $customer->email,
            'address' => $customer->address,
            'dob' =>$customer->dob,
            'mobile' =>$customer->mobile,
            'phone' => $customer->phone,
            'remark' => $customer->remark,
            'created_by' => $customer->created_by,
            'is_active' => $customer->is_active,
        ];
    } else {
        $this->dispatch('alert', ['type' => 'error', 'message' => 'Customer Not Found']);
    }
}


public function save()
{

    // Debugbar::info($this->location['id']);


    if (isset($this->location['id'])) {
        # code...
        $this->validate(
            [
                'customer.location_id' => 'required|string|max:50',
                'customer.cus_name' => 'nullable|string|max:255',
                'customer.email' => 'nullable|string|max:20',
                'customer.address' => 'nullable|string|max:20',
                'customer.dob' => 'nullable|max:255',
                'customer.mobile' => 'nullable|max:255',
            ],
            [
                'customer.cus_name.required' => 'The Customer Name is a required.',
            ]
        );
    } else {
        $this->validate(
            [
                'customer.cus_name' => 'required',
            ],
            [
                'customer.cus_name.required' => 'The Customer Name is a required.',
            ]
        );
    }

    try {

        $customer = $this->customer['id'] ? Customer::findOrFail($this->customer['id'])  : new Customer;
        $customer->location_id = $this->customer['location_id'];
        $customer->cus_name = $this->customer['cus_name'];
        $customer->email = $this->customer['email'];
        $customer->address = $this->customer['address'];
        $customer->dob = $this->customer['dob'];
        $customer->mobile = $this->customer['mobile'];
        $customer->phone = $this->customer['phone'];
        $customer->remark = $this->customer['remark'];
        $customer->created_by = $this->customer['created_by'] ? $this->customer['created_by'] : userID();
        $customer->is_active = $this->customer['is_active'];

        // Save the customer data here
        $customer->save();

        $this->clear();
        $this->dispatch('alert', ['type' => 'success', 'message' => 'Customer Successfully Saved']);
    } catch (\Throwable $th) {
        // Handle the exception
        $error_message = $th->getMessage();
        // Log::error("Customer Saving Failed", ['process' => '[Customer]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__, 'error_message' => $error_message]);
       
        $this->dispatch('alert',['type'=>'error','message'=>$error_message]);
    }
}


public function delete($id)
{
    $customer = Customer::find($id);
    if ($customer) {
        $customer->delete();
        $this->dispatch('alert', ['type' => 'success', 'message' => 'Customer Successfully Deleted']);
    }
}

public function deleteConfirm($id)
{
    $this->dispatch('swal:confirm', [
        'type' => 'warning',
        'title' => 'Are you sure?',
        'text' => 'If you Delete, Related Items also will delete',
        'id' => $id,
    ]);
}

public function clear()
{

    $this->updateMode = false;
    $this->dispatch('modalHide');

    $this->customer = [
        'id' => '',
        'location_id' => '',
        'cus_name' => '',
        'email' => '',
        'address' => '',
        'dob' => '',
        'mobile' => '',
        'phone' => '',
        'remark' => '',
        'created_by'=>'',
        'is_active' => false,
    ];
}




}
