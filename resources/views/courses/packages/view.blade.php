@extends('layouts.app')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="d-flex justify-content-between">
            <h4 class="mb-4">Packages List</h4>

            <a href="{{ route('add_package') }}" class="btn btn-primary btn-md"><i class="fa-solid fa-circle-plus"></i>
                &nbsp; Add </a>
        </div>

        <!-- DataTable with Buttons -->


        <div class="accordion mt-4 mb-4" id="accordionFilter">
            <div class="accordion-item active">
                <h2 class="accordion-header" id="headingOne">
                    <button type="button" class="accordion-button" data-bs-toggle="collapse"
                        data-bs-target="#filterAccordian" aria-expanded="false" aria-controls="filterAccordian">
                        <i class="fa-solid fa-filter"></i> &nbsp;Filter
                    </button>
                </h2>

                <div id="filterAccordian" class="accordion-collapse collapse hide" data-bs-parent="#accordionFilter">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="basic-icon-default-fullname">Name</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="icon-base ti tabler-user"></i></span>
                                        <input type="text" class="form-control" id="search-name"
                                            placeholder="Search By Name" aria-label="John Doe"
                                            aria-describedby="basic-icon-default-fullname2" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" id="status" name="status"
                                            aria-label="Select Status" required>
                                            <option value="" >Select Status</option>
                                            <option value="Active" >Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>

                                </div>



                        </div>
                    </div>
                </div>
            </div>


        </div>



        <div class="card p-4">
            <table class="table table-borderless" id="packages-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>GST (%)</th>
                        <th>Amount (&#8377;)</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
    <!--/ Content -->

    <script>
        $(document).ready(function() {
            let table = $('#packages-table').DataTable({
                processing: true,
                serverSide: true,
                dom: '<"row mb-3"<"col-md-6"B><"col-md-6 text-end"f>>' +
                    '<"row mb-2"<"col-md-6"l><"col-md-6 text-end"p>>' +
                    'rt' +
                    '<"row mt-2"<"col-md-6"i><"col-md-6 text-end"p>>',

                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                pageLength: 10, // default selected length
                ajax: {
                    url: '{{ route('package_list') }}',
                    data: function(d) {
                        d.name = $('#search-name').val();
                        d.status = $('#status').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'gst',
                        name: 'gst'
                    },
                    {
                        data: 'amount',
                        name: 'amount'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#search-name, #status').on('change keyup', function() {
                table.draw();
            });
        });


        function deletePackage(packageId) {
            Swal.fire({
                title: 'Are you sure to change status?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6'
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{ route('status_package', ':id') }}".replace(':id', packageId);

                    $.ajax({
                        url: url,
                        method: 'GET',
                        success: function(response) {
                            Swal.fire('Deleted!', 'Package status changed.', 'success').then(() => {
                                location.reload(); // or remove row from table dynamically
                            });
                        },
                        error: function(xhr) {
                            Swal.fire('Error', 'Failed to delete package.', 'error');
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        }
    </script>

    {{--
 dom: '<"row mb-3"<"col-md-6"B><"col-md-6 text-end"f>>' +
         '<"row mb-2"<"col-md-6"l><"col-md-6 text-end"p>>' +
         'rt' +
         '<"row mt-2"<"col-md-6"i><"col-md-6 text-end"p>>',
            // buttons: ['copy', 'csv', 'excel', 'pdf', 'print'], --}}
@endsection
