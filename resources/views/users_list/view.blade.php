@extends('layouts.app')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="d-flex justify-content-between">
            <h4 class="mb-4">User List ({{ ucfirst($type) }})</h4>

            <a href="{{ route('add_user', $type) }}" class="btn btn-primary btn-md"><i class="fa-solid fa-circle-plus"></i>
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
                                    <label class="form-label" for="basic-icon-default-email">Email</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="icon-base ti tabler-mail"></i></span>
                                        <input type="text" id="search-email" class="form-control"
                                            placeholder="Search By Email" aria-label="john.doe"
                                            aria-describedby="basic-icon-default-email2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>



        <div class="card p-4">
            <table class="table table-borderless" id="users-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
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
            let table = $('#users-table').DataTable({
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
                    url: '{{ route('user_list', $type) }}',
                    data: function(d) {
                        d.name = $('#search-name').val();
                        d.email = $('#search-email').val();
                        d.type = @json($type)
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
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number'
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

            $('#search-name, #search-email').on('keyup', function() {
                table.draw();
            });
        });


        function deleteUser(userId) {
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
                    let url = "{{ route('status_user', ':id') }}".replace(':id', userId);

                    $.ajax({
                        url: url,
                        method: 'GET',
                        success: function(response) {
                            Swal.fire('Deleted!', 'User status changed.', 'success').then(() => {
                                location.reload(); // or remove row from table dynamically
                            });
                        },
                        error: function(xhr) {
                            Swal.fire('Error', 'Failed to delete user.', 'error');
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
