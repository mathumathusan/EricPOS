<?php

namespace App\Livewire\Pages\Job;

use App\Models\Brand;
use App\Models\Customer;
use App\Models\FrameShape;
use App\Models\JobFrame;
use App\Models\JobOrder;
use App\Models\JobPrescription;
use App\Models\Location;
use App\Models\Product;
use App\Models\Sales;
use Livewire\Component;

class JobComponent extends Component
{

    public $sale = [
        'id' => '',
        'location_id' => '',
        'customer_id' => '',
        'sales_date' => '',
        'sales_by' => '',
        'created_by' => '',
        'sub_total' => '',
        'discount' => '',
        'total' => '',
        'balance' => '',
        'job_order_id' => '',
        'status' => '',
    ];

    public $saleitem = [
        'id' => '',
        'sales_id' => '',
        'product_id' => '',
        'qty' => '',
        'unit_amount' => '',
        'sub_total' => '',
        'discount' => '',
        'total' => '',
        'job_order_id' => '',
    ];

    public $job = [
        'id' => '',
        'location_id' => '',
        'customer_id' => '',
        'job_no' => '',
        'job_code' => '',
        'job_date' => '',
        'due_date' => '',
        'frame_amount' => '',
        'lens_amount' => '',
        'paid_amount' => '',
        'discount_amount' => '',
        'balance_amount' => '',
        'test_by' => '',
        'take_by' => '',
        'remarks' => '',
        'created_by' => '',
        'status' => ''
    ];


    public $prescriptions = [
        'id' => '',
        'job_order_id' => '',
        'right_sph' => '',
        'right_cyl' => '',
        'right_axis' => '',
        'right_add' => '',
        'right_pd' => '',
        'left_sph' => '',
        'left_cyl' => '',
        'left_axis' => '',
        'left_add' => '',
        'left_pd' => '',
        'of_sf' => '',
        'professional_type' => '',
        'professional_name' => '',
        'hospital_name' => '',
        'product_id' => ''
    ];

    public $frames = [
        'id' => '',
        'job_id' => '',
        'brand_id' => '',
        'model_no' => '',
        'type' => '',
        'option' => '',
        'shape_id' => '',
        'lens_variety' => '',
        'lens_index' => '',
        'lens_type' => '',
        'coating_brand' => '',
        'coating_brand_id' => '',
        'coating_option_id' => '',
        'tint' => ''
    ];

    public function savePrescription()
    {

        $prescriptions = $this->prescriptions['id'] ? JobPrescription::findOrFail($this->prescriptions['id']) : new JobPrescription();

        $prescriptions->job_order_id = $this->prescriptions['job_order_id'];
        $prescriptions->right_sph = $this->prescriptions['right_sph'];
        $prescriptions->right_cyl = $this->prescriptions['right_cyl'];
        $prescriptions->right_axis = $this->prescriptions['right_axis'];
        $prescriptions->right_add = $this->prescriptions['right_add'];
        $prescriptions->right_pd = $this->prescriptions['right_pd'];
        $prescriptions->left_sph = $this->prescriptions['left_sph'];
        $prescriptions->left_cyl = $this->prescriptions['left_cyl'];
        $prescriptions->left_axis = $this->prescriptions['left_axis'];
        $prescriptions->left_add = $this->prescriptions['left_add'];
        $prescriptions->left_pd = $this->prescriptions['left_pd'];
        $prescriptions->of_sf = $this->prescriptions['of_sf'];
        $prescriptions->professional_type = $this->prescriptions['professional_type'];
        $prescriptions->professional_name = $this->prescriptions['professional_name'];
        $prescriptions->hospital_name = $this->prescriptions['hospital_name'];
        $prescriptions->product_id = $this->prescriptions['product_id'];

        $prescriptions->save();

        return redirect()->route('jobs')->with('success', ($this->prescriptions['id'] ? 'Updated' : 'Created') . ' prescription Successfully....');
    }


    public function saveFrame()
    {
        $jobFrames = $this->frames['id'] ? JobFrame::findOrFail($this->frames['id']) : new JobFrame();
        $jobFrames->job_id = $this->frames['job_id'];
        $jobFrames->brand_id = $this->frames['brand_id'];
        $jobFrames->model_no = $this->frames['model_no'];
        $jobFrames->type = $this->frames['type'];
        $jobFrames->option = $this->frames['option'];
        $jobFrames->shape_id = $this->frames['shape_id'];
        $jobFrames->lens_variety = $this->frames['lens_variety'];
        $jobFrames->lens_index = $this->frames['lens_index'];
        $jobFrames->lens_type = $this->frames['lens_type'];
        $jobFrames->coating_brand = $this->frames['coating_brand'];
        $jobFrames->coating_brand_id = $this->frames['coating_brand_id'];
        $jobFrames->coating_option_id = $this->frames['coating_option_id'];
        $jobFrames->tint = $this->frames['tint'];
        $jobFrames->save();
        return redirect()->route('jobs')->with('success', ($this->frames['id'] ? 'Updated' : 'Created') . ' frames Successfully....');
    }

    public function mount($id = null)
    {
        try {
            if ($id) {

                if ($job = JobOrder::whereId($id)->firstOrFail()) {
                    $this->job['id'] = $job->id;
                    $this->job['location_id'] = $job->location_id;
                    $this->job['customer_id'] = $job->customer_id;
                    $this->job['job_no'] = $job->job_no;
                    $this->job['job_code'] = $job->job_code;
                    $this->job['job_date'] = $job->job_date;
                    $this->job['due_date'] = $job->due_date;
                    $this->job['frame_amount'] = $job->frame_amount;
                    $this->job['lens_amount'] = $job->lens_amount;
                    $this->job['paid_amount'] = $job->paid_amount;
                    $this->job['discount_amount'] = $job->discount_amount;
                    $this->job['balance_amount'] = $job->balance_amount;
                    $this->job['test_by'] = $job->test_by;
                    $this->job['take_by'] = $job->take_by;
                    $this->job['remarks'] = $job->remarks;
                    $this->job['status'] = $job->status;
                    // dd($this->product);

                    $prescription = JobPrescription::where('job_order_id', $id)->first();

                    if ($prescription) {
                        $this->prescriptions['id'] = $prescription->id;
                        $this->prescriptions['job_order_id'] = $prescription->job_order_id;
                        $this->prescriptions['right_sph'] = $prescription->right_sph;
                        $this->prescriptions['right_cyl'] = $prescription->right_cyl;
                        $this->prescriptions['right_axis'] = $prescription->right_axis;
                        $this->prescriptions['right_add'] = $prescription->right_add;
                        $this->prescriptions['right_pd'] = $prescription->right_pd;
                        $this->prescriptions['left_sph'] = $prescription->left_sph;
                        $this->prescriptions['left_cyl'] = $prescription->left_cyl;
                        $this->prescriptions['left_axis'] = $prescription->left_axis;
                        $this->prescriptions['left_add'] = $prescription->left_add;
                        $this->prescriptions['left_pd'] = $prescription->left_pd;
                        $this->prescriptions['of_sf'] = $prescription->of_sf;
                        $this->prescriptions['professional_type'] = $prescription->professional_type;
                        $this->prescriptions['professional_name'] = $prescription->professional_name;
                        $this->prescriptions['hospital_name'] = $prescription->hospital_name;
                        $this->prescriptions['product_id'] = $prescription->product_id;
                    }

                    $frame = JobFrame::where('job_id', $id)->first();
                    if ($frame) {
                        $this->frames['id'] = $frame->id;
                        $this->frames['job_id'] = $frame->job_id;
                        $this->frames['brand_id'] = $frame->brand_id;
                        $this->frames['model_no'] = $frame->model_no;
                        $this->frames['type'] = $frame->type;
                        $this->frames['option'] = $frame->option;
                        $this->frames['shape_id'] = $frame->shape_id;
                        $this->frames['lens_variety'] = $frame->lens_variety;
                        $this->frames['lens_index'] = $frame->lens_index;
                        $this->frames['lens_type'] = $frame->lens_type;
                        $this->frames['coating_brand'] = $frame->coating_brand;
                        $this->frames['coating_brand_id'] = $frame->coating_brand_id;
                        $this->frames['coating_option_id'] = $frame->coating_option_id;
                        $this->frames['tint'] = $frame->tint;
                    }
                }
            } else {
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            abort(404, 'This Job Not Found. Please Contact Admin');
        } catch (\Throwable $exception) {
            dd($exception->getMessage());
        }
    }


    public function render()
    {
        $locations = Location::whereIsActive(true)->pluck('name', 'id');
        $customers = Customer::whereIsActive(true)->pluck('cus_name', 'cus_id');
       // $lastJob = JobOrder::latest()->first();
        $frame = JobOrder::latest()->first();
        $lastFrameJobOrderId = $frame ? $frame->id : null;
        //$lastJobOrderId = $lastJob ? $lastJob->id : null;
        //$this->frames['job_id'] = $lastFrameJobOrderId;
        //$this->prescriptions['job_order_id'] = $lastJobOrderId;
        $jobs = JobOrder::pluck('id');
        $products = Product::pluck('id', 'product_name');
        $frames = JobFrame::all();
        $brands = Brand::pluck('brand_name', 'id');
        $shapes = FrameShape::pluck('name', 'id');

        return view('livewire.pages.job.job-component', compact('locations', 'customers', 'jobs', 'products', 'brands', 'shapes'));
    }


    protected function rules()
    {
        $jobid = $this->job['id'];
        return [
            'job.job_no' => 'required',
            'job.job_code' => 'required|unique:job_orders,job_code,' . $jobid,
            'job.job_date' => 'required|date',
            'job.location_id' => 'required',
            'job.customer_id' => 'required',
            'job.due_date' => 'required|date|after_or_equal:job.job_date',
            'job.frame_amount' => 'required|numeric|min:0',
            'job.lens_amount' => 'required|numeric|min:0',
            'job.paid_amount' => 'required|numeric|min:0',
            'job.discount_amount' => 'required|numeric|min:0',
            'job.test_by' => 'required|integer',
            'job.take_by' => 'required|integer',
            'job.remarks' => 'nullable|string',
            'job.status' => 'nullable|string',
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





    public function updateData()
    {
        $this->validate();
        $job = $this->job['id'] ? JobOrder::findOrFail($this->job['id']) : new JobOrder();
        $job->location_id = $this->job['location_id'];
        $job->customer_id = $this->job['customer_id'];
        $job->job_no = $this->job['job_no'];
        $job->job_code = $this->job['job_code'];
        $job->job_date = $this->job['job_date'];
        $job->due_date = $this->job['due_date'];
        $job->frame_amount = $this->job['frame_amount'];
        $job->lens_amount = $this->job['lens_amount'];
        $job->paid_amount = $this->job['paid_amount'];
        $job->discount_amount = $this->job['discount_amount'];
        $balance = ($job->frame_amount + $job->lens_amount) - ($job->discount_amount + $job->paid_amount);
        $job->balance_amount = $balance >= 0 ? $balance : 0;
        $job->test_by = $this->job['test_by'];
        $job->take_by = $this->job['take_by'];
        $job->remarks = $this->job['remarks'];
        $job->created_by = auth()->user()->id;
        $job->status = $this->job['status'];
        $job->save();

        $prescriptions = $this->prescriptions['id'] ? JobPrescription::findOrFail($this->prescriptions['id']) : new JobPrescription();

        $prescriptions->job_order_id = $job->id;
        $prescriptions->right_sph = $this->prescriptions['right_sph'];
        $prescriptions->right_cyl = $this->prescriptions['right_cyl'];
        $prescriptions->right_axis = $this->prescriptions['right_axis'];
        $prescriptions->right_add = $this->prescriptions['right_add'];
        $prescriptions->right_pd = $this->prescriptions['right_pd'];
        $prescriptions->left_sph = $this->prescriptions['left_sph'];
        $prescriptions->left_cyl = $this->prescriptions['left_cyl'];
        $prescriptions->left_axis = $this->prescriptions['left_axis'];
        $prescriptions->left_add = $this->prescriptions['left_add'];
        $prescriptions->left_pd = $this->prescriptions['left_pd'];
        $prescriptions->of_sf = $this->prescriptions['of_sf'];
        $prescriptions->professional_type = $this->prescriptions['professional_type'];
        $prescriptions->professional_name = $this->prescriptions['professional_name'];
        $prescriptions->hospital_name = $this->prescriptions['hospital_name'];
        $prescriptions->product_id = $this->prescriptions['product_id'];

        $prescriptions->save();

        $jobFrames = $this->frames['id'] ? JobFrame::findOrFail($this->frames['id']) : new JobFrame();
        $jobFrames->job_id = $job->id;
        $jobFrames->brand_id = $this->frames['brand_id'];
        $jobFrames->model_no = $this->frames['model_no'];
        $jobFrames->type = $this->frames['type'];
        $jobFrames->option = $this->frames['option'];
        $jobFrames->shape_id = $this->frames['shape_id'];
        $jobFrames->lens_variety = $this->frames['lens_variety'];
        $jobFrames->lens_index = $this->frames['lens_index'];
        $jobFrames->lens_type = $this->frames['lens_type'];
        $jobFrames->coating_brand = $this->frames['coating_brand'];
        $jobFrames->coating_brand_id = $this->frames['coating_brand_id'];
        $jobFrames->coating_option_id = $this->frames['coating_option_id'];
        $jobFrames->tint = $this->frames['tint'];
        $jobFrames->save();

        $sale = $this->sale['id'] ? Sales::findOrFail($this->sale['id']) : new Sales();
        $sale->location_id = $job->location_id;
        $sale->customer_id = $job->customer_id;
        $sale->sales_date = $job->job_date;
        $sale->sales_by = auth()->user()->id;
        $sale->created_by = auth()->user()->id;
        $sale->job_order_id = $job->id;
        $sale->sub_total = $job->frame_amount+$job->lens_amount;

        $sale->discount = $job->discount_amount;
        $sale->total = $sale->sub_total-$sale->discount;

  
        $sale->balance = $sale->total-$job->paid_amount;

        $sale->status = $this->sale['status'];

        $sale->save();

        return redirect()->route('jobs')->with('success', 'Job' . ($this->job['id'] ? ' Updated' : ' Created') . ' Successfully');

    }


    public function updateData1()
    {
        $this->validate();
        $job = $this->job['id'] ? JobOrder::findOrFail($this->job['id']) : new JobOrder();
        $job->location_id = $this->job['location_id'];
        $job->customer_id = $this->job['customer_id'];
        $job->job_no = $this->job['job_no'];
        $job->job_code = $this->job['job_code'];
        $job->job_date = $this->job['job_date'];
        $job->due_date = $this->job['due_date'];
        $job->frame_amount = $this->job['frame_amount'];
        $job->lens_amount = $this->job['lens_amount'];
        $job->paid_amount = $this->job['paid_amount'];
        $job->discount_amount = $this->job['discount_amount'];
        $balance = ($job->frame_amount + $job->lens_amount) - ($job->discount_amount + $job->paid_amount);
        $job->balance_amount = $balance >= 0 ? $balance : 0;
        $job->test_by = $this->job['test_by'];
        $job->take_by = $this->job['take_by'];
        $job->remarks = $this->job['remarks'];
        $job->created_by = auth()->user()->id;
        $job->status = $this->job['status'];
        $job->save();
        // jobs prescriptions details below......

    }

    public function cancel()
    {
        return redirect()->route('jobs');
    }
}
