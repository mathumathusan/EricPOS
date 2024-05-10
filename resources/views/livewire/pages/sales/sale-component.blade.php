 {{--<main>
    <div class="row">
        <div class="col-xl-8">
            <div class="card custom-card">
                <div class="card-body add-products p-0">
                    <h1 class="text-center">Ericanesh Sales</h1>
                    <div class="row">
                        @foreach (['sunglasses', 'cooling glasses', 'testing glasses', 'ruper glasses'] as $product)
                        <div class="col-xl-3 p-4" onclick="createProduct('{{ $product }}')">
 <div class="card custom-card" style="height: 15vh; background-color:#1c2754;">
     <h5 class="text-center text-white mt-4">{{ $product }}</h5>
 </div>
 </div>
 @endforeach
 </div>
 </div>
 </div>
 </div>
 <div class="col-xl-4">
     <div class="card custom-card p-4" style="background-color:#1c2754;">
         <h2 class="text-center text-white">Total : <span id="total" class="text-center text-white">0</span></h2>

         <span class="text-center text-white">Items: 1</span>
     </div>
     <div style="background-color: white; margin-top: -30px;">
         <div id="container"></div>


         <div class="d-flex justify-content-between mt-5">
             <button class="btn btn-success m-1">Save</button>
             <button class="btn btn-danger m-1">Cancel</button>
         </div>

     </div>

 </div>
 </div>
 </main> --}}




 <main>
     <div class="row">
         <div class="col-xl-8">
             <div class="card custom-card">
                 <div class="card-body add-products p-0">
                     <h1 class="text-center">Ericanesh Sales</h1>
                     <div class="row ">
                         <div class="cols-xl-4 px-4">
                             <label for="product-size-add" class="form-label">Customer
                                 <button class="btn btn-icon btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#customermodal"><i class='bx bx-plus'></i> </button>
                             </label>
                             <select class="form-control  w-25" wire:model="job.customer_id" id="product-size-add">
                                 <option value="">WalkingCustomer</option>
                                 @foreach ($customers as $customer)
                                 <option value="{{$customer->id}}">{{ $customer->cus_name}}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                     <div class="row">
                         @foreach ($products as $product)
                         <div class="col-xl-3 p-4" wire:click="createProduct({{ $product->id }})">
                             <div class="card custom-card" style="height: 15vh; background-color:#1c2754;">
                                 <h5 class="text-center text-white mt-4">{{ $product->product_name }}</h5>
                             </div>
                         </div>
                         @endforeach
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-xl-4">
             <div class="card custom-card p-4" style="background-color:#1c2754;">
                 <h2 class="text-center text-white">Total : <span id="total" class="text-center text-white">{{$total}}</span></h2>
                 <h2 class="text-center text-white">Discount: <span class="text-center text-white">{{$discount}}</span></h2>
                 <span class="text-center text-white">Items: <span class="text-center text-white">{{$count}}</span></span>
             </div>
             <div style="background-color: white; margin-top: -30px;">
                 <div id="container">
                     @if(is_array($selectedProducts))
                     @foreach ($selectedProducts as $productId => $product)
                     <div class="card custom-card">
                         <div style="background-color:white;">
                             <div class="p-2 d-flex justify-content-between">
                                 <h6>{{$product['name']}}</h6>
                                 <input type="text" wire:model="selectedProducts.{{ $productId }}.price" placeholder="unit_amt" class="form-control input-sm w-25">
                                 <input type="text" wire:model="selectedProducts.{{ $productId }}.discount" placeholder="discount" class="form-control input-sm w-25">
                             </div>
                             <div class="p-2 d-flex justify-content-between">
                                 <button class="btn btn-icon btn-sm btn-danger" wire:click="cancelProduct({{$product['id']}})"><i class='bx bx-trash-alt'></i></button>
                                 <div class="d-flex justify-content-between gap-3">
                                     <button class="btn btn-icon btn-sm btn-primary" wire:click="decrement({{$product['id']}})"><i class='bx bx-minus'></i></button>
                                     <span class="btn btn-icon btn-sm btn-info">{{$product['quantity']}}</span>
                                     <button class="btn btn-icon btn-sm btn-primary" wire:click="increment({{$product['id']}})"><i class='bx bx-plus'></i></button>
                                 </div>
                             </div>
                         </div>
                     </div>
                     @endforeach
                     @endif
                 </div>
                 <div class="d-flex justify-content-between mt-5">
                     <button class="btn btn-success m-1" wire:click="updateData()">Save</button>
                     <button class="btn btn-danger m-1" wire:click="cancel()">Cancel</button>
                 </div>
             </div>
         </div>
     </div>



     @include('modals.customer')
 </main>




 @push('custom-style')
 @endpush

 @push('custom-script')
 <script src="{{ asset('assets/js/add-products.js') }}"></script>



 <!-- <script>
    var amt = 0;

    function createProduct(productName) {



        const uniqueId = "productCard_" + productName;


        console.log(uniqueId);


        if (document.getElementById(uniqueId)) {

            return;
        }



        var htmlContent = `
            <div class="card custom-card" id="${uniqueId}">
                <div style="background-color:white;">
                    <div class="p-2 d-flex justify-content-between">
                        <h6>${productName}</h6>
                        <input type="text" id="${uniqueId}text" >
                    </div>
                    <div class="p-2 d-flex justify-content-between">
                        <button class="btn btn-icon btn-sm btn-danger" onclick="toggle1('${uniqueId}')"><i class='bx bx-trash-alt'></i></button>
                        <div class="d-flex justify-content-between gap-3">
                            <button class="btn btn-icon btn-sm btn-primary" onclick="decrement('${uniqueId}value','${uniqueId}text')"><i class='bx bx-minus'></i></button>
                            <span class="btn btn-icon btn-sm btn-info" id="${uniqueId}value">0</span>
                            <button class="btn btn-icon btn-sm btn-primary" onclick="increment('${uniqueId}value','${uniqueId}text')"><i class='bx bx-plus'></i></button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        var container = document.getElementById('container');
        container.innerHTML += htmlContent;
    }

    function toggle1(id) {
        var element = document.getElementById(id);
        element.style.display = 'none';
    }

    function increment(id, id2) {
        var quantityElement = document.getElementById(id);
        var priceElement = document.getElementById(id2);

        var quantity = parseInt(quantityElement.innerText);
        var price = parseFloat(priceElement.value);



        if (isNaN(price)) {
            console.error("Invalid price input");
            return;
        }

        quantity++;
        amt = amt+price;

        console.log("Amount: " + amt);
   
        var total=document.getElementById("total");
         total.innerText=amt;
         console.log(total.innerText)
        quantityElement.innerText = quantity;
    }


    function decrement(id, id2) {
        var quantityElement = document.getElementById(id);
        var priceElement = document.getElementById(id2);

        var quantity = parseInt(quantityElement.innerText);
        var price = parseFloat(priceElement.value);

        if (quantity > 0) {
            quantity--;
            amt = amt - price;

            var total=document.getElementById("total");
         total.innerText=amt;
            
            quantityElement.innerText = quantity;
        }
    }
</script> -->
 @endpush