<main>
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title"> Manage Jobs </div>
                    <div class="d-flex">
                        @can('add_job')
                        <a href="{{ route('jobs.add') }}" class="btn btn-sm btn-primary btn-wave waves-light waves-effect waves-light"><i class="ri-add-line fw-semibold align-middle me-1"></i> Create Jobs</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered  table-striped table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">job_no </th>
                                    <th scope="col">prescription_id</th>
                                    <th scope="col">frame_id</th>
                                    <th scope="col">frame_amount</th>
                                    <th scope="col">lens_amount </th>
                                    <th scope="col">balance_amount</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jobs as $job)
                                <tr>
                                    <td>{{ $job->job_no }}</td>
                                    <td>
                                        @forelse($prescriptions as $prescription)
                                        @if($prescription->job_order_id==$job->id)
                                        <span class="badge bg-secondary">{{$prescription->id}}</span>
                                        @endif
                                        @empty
                                        @endforelse
                                    </td>
                                    <td>
                                        @forelse($frames as $frame)
                                        @if($frame->job_id==$job->id)
                                        <span class="badge bg-primary">{{$frame->id}}</span>
                                        @endif
                                        @empty
                                        @endforelse
                                    </td>
                                    <td>{{ $job->frame_amount }}</td>
                                    <td>{{ $job->lens_amount }}</td>
                                    <td> {{ $job->balance_amount }}</td>
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            {{-- <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-success"><i
                                                    class="ri-eye-line"></i></a> --}}
                                            <a href="{{ route('jobs.edit',$job->id) }}" class="btn btn-icon btn-sm btn-info"><i class="ri-edit-line"></i></a>
                                            <span class="btn btn-icon btn-sm btn-danger" wire:click.prevent="deleteConfirm({{ $job->id }})"><i class="ri-delete-bin-6-line"></i></span>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                @endforelse
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