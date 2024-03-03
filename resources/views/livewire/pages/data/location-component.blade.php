<main>


    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title"> Manage Locations </div>
                    <div class="d-flex"> <button
                            class="btn btn-sm btn-primary btn-wave waves-light waves-effect waves-light"><i
                                class="ri-add-line fw-semibold align-middle me-1"></i> Create Location</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Store Name</th>
                                    <th scope="col">Store Code</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>

                                    <td>Jaffna</td>
                                    <td><span class="badge bg-primary-transparent">JAF</span></td>
                                    <td> <h6><span class="badge bg-success">Active</span></h6> </td>


                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-success"><i
                                                    class="ri-eye-line"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info"><i
                                                    class="ri-edit-line"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-danger"><i
                                                    class="ri-delete-bin-6-line"></i></a>

                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@section('title', 'Locations')
