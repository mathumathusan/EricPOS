<main>
    <div class="d-flex justify-content-end">
    <div class="input-group mb-3 " style="width:25%;">
        <input type="text" class="form-control form-control-sm" wire:model.live="search" >
        <div class="input-group-append"><button class="btn btn-primary"><i class="fas fa-search"></i></button></div>
    </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title"> Manage Sales </div>
                    <div class="d-flex">
                        @can('add_sale')
                        <a href="{{ route('sales.add2') }}" class="btn btn-sm btn-primary btn-wave waves-light waves-effect waves-light"><i class="ri-add-line fw-semibold align-middle me-1"></i> Create Sales</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered  table-striped table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">sales_id </th>
                                    
                                    <th scope="col">total</th>
                                    <th scope="col">discount</th>
                                    <th scope="col">balance</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales as $sale)
                                <tr>
                                    <td>{{$sale->id}}</td>
                                    
                                    <td> {{$sale->total}}</td>
                                    <td>{{$sale->discount}}</td>
                                    <td>{{$sale->balance}}</td>
                                    <td>
                                        <div class="hstack gap-2 fs-15 d-flex justify-content-around">
                                            <a href="{{ route('sales.edit',$sale->id) }}" class="btn btn-icon btn-sm btn-info"><i class="ri-edit-line"></i></a>
                                            <a href="{{route('print',$sale->id)}}" class="btn btn-icon  btn-sm btn-success" target="blank"><i class='bx bx-printer'></i></a>
                                            <span class="btn btn-icon btn-sm btn-danger" wire:click.prevent="deleteConfirm({{ $sale->id }})"><i class="ri-delete-bin-6-line"></i></span>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@push('custom-style')
@endpush

@push('custom-script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    document.addEventListener('livewire:initialized', () => {

        window.addEventListener('swal:modal', event => {

            swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
            });

        });

        window.addEventListener('swal:confirm', event => {
            swal({
                    title: event.detail[0].title,
                    text: event.detail[0].text,
                    icon: event.detail[0].type,
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        @this.dispatch('delete', {
                            id: event.detail[0].id
                        });
                    }
                });
        });
    });
</script>
@endpush