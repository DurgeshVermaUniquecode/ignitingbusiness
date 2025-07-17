@extends('layouts.app')

@section('title', 'User List')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">




        <div class="accordion mt-4 mb-4" id="accordionFilter">
            <div class="accordion-item active">
                <h2 class="accordion-header" id="headingOne">
                    <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#filterAccordian"
                        aria-expanded="false" aria-controls="filterAccordian">
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

        <div class="card">
            <div class="card-header border-bottom d-flex justify-content-between">
                <h5 class="card-title mb-0">User List ({{ ucfirst($type) }})</h5>

                <a href="{{ route('add_user', $type) }}" class="btn add-new btn-primary"><span><span
                            class="d-flex align-items-center gap-2"><i class="icon-base ti tabler-plus icon-xs"></i> <span
                                class="d-none d-sm-inline-block">Add {{ ucfirst($type) }}</span></span></span></a>
            </div>

            <div class="card-datatable">
                <table class="table" id="data-table">
                    <thead class="border-top">
                        <tr>
                            <th>S.No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>


    </div>
    <!--/ Content -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

            const datatable = document.querySelector('#data-table');
            let table;

            if (datatable) {

                table = new DataTable(datatable, {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('user_list', $type) }}',
                        data: function(d) {
                            d.name = $('#search-name').val();
                            d.email = $('#search-email').val();
                        }
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                         {
                            data: 'code',
                            name: 'code'
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
                            data: 'gender',
                            name: 'gender'
                        },
                        {
                            data: 'dob',
                            name: 'dob'
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
                    ],


                    layout: {
                        topStart: {
                            rowClass: 'row m-3 my-0 justify-content-between',
                            features: [{
                                pageLength: {
                                    menu: [10, 25, 50, 100],
                                    text: '_MENU_'
                                }
                            }]
                        },
                        topEnd: {
                            features: [{
                                    search: {
                                        placeholder: 'Search here',
                                        text: '_INPUT_'
                                    }
                                },
                                {
                                    buttons: [{
                                        extend: 'collection',
                                        className: 'btn btn-label-secondary dropdown-toggle',
                                        text: '<span class="d-flex align-items-center gap-2"><i class="icon-base ti tabler-upload icon-xs"></i> <span class="d-none d-sm-inline-block">Export</span></span>',
                                        buttons: [{
                                                extend: 'print',
                                                text: `<span class="d-flex align-items-center"><i class="icon-base ti tabler-printer me-1"></i>Print</span>`,
                                                className: 'dropdown-item',
                                                exportOptions: {
                                                    columns: [0, 1, 2, 3, 4],

                                                },

                                            },
                                            {
                                                extend: 'csv',
                                                text: `<span class="d-flex align-items-center"><i class="icon-base ti tabler-file-text me-1"></i>Csv</span>`,
                                                className: 'dropdown-item',
                                                exportOptions: {
                                                    columns: [0, 1, 2, 3, 4],

                                                }
                                            },
                                            {
                                                extend: 'excel',
                                                text: `<span class="d-flex align-items-center"><i class="icon-base ti tabler-file-spreadsheet me-1"></i>Excel</span>`,
                                                className: 'dropdown-item',
                                                exportOptions: {
                                                    columns: [0, 1, 2, 3, 4],

                                                }
                                            },
                                            {
                                                extend: 'pdf',
                                                text: `<span class="d-flex align-items-center"><i class="icon-base ti tabler-file-description me-1"></i>Pdf</span>`,
                                                className: 'dropdown-item',
                                                exportOptions: {
                                                    columns: [0, 1, 2, 3, 4],

                                                }
                                            },
                                            {
                                                extend: 'copy',
                                                text: `<i class="icon-base ti tabler-copy me-1"></i>Copy`,
                                                className: 'dropdown-item',
                                                exportOptions: {
                                                    columns: [0, 1, 2, 3, 4],

                                                }
                                            }
                                        ]
                                    }, ]
                                }
                            ]
                        },
                        bottomStart: {
                            rowClass: 'row mx-3 justify-content-between',
                            features: ['info']
                        },
                        bottomEnd: 'paging'
                    },
                    language: {
                        paginate: {
                            next: '<i class="icon-base ti tabler-chevron-right scaleX-n1-rtl icon-18px"></i>',
                            previous: '<i class="icon-base ti tabler-chevron-left scaleX-n1-rtl icon-18px"></i>',
                            first: '<i class="icon-base ti tabler-chevrons-left scaleX-n1-rtl icon-18px"></i>',
                            last: '<i class="icon-base ti tabler-chevrons-right scaleX-n1-rtl icon-18px"></i>'
                        }
                    },

                });


                $('#search-name, #search-email').on('keyup', function() {
                    table.draw();
                });


            }

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
@endpush
