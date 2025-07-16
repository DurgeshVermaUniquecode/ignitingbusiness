@extends('layouts.app')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">


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
                                    <select class="form-select" id="status" name="status" aria-label="Select Status"
                                        required>
                                        <option value="">Select Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>

                            </div>



                        </div>
                    </div>
                </div>
            </div>


        </div>



        <div class="card">
            <div class="card-header border-bottom d-flex justify-content-between">
                <h5 class="card-title mb-0">Categories List</h5>

                <a href="{{ route('add_business_category') }}" class="btn add-new btn-primary"><span><span
                            class="d-flex align-items-center gap-2"><i class="icon-base ti tabler-plus icon-xs"></i> <span
                                class="d-none d-sm-inline-block">Add Category</span></span></span></a>
            </div>

            <div class="card-datatable">
                <table class="table" id="data-table">
                    <thead class="border-top">
                        <tr>
                            <th>S.No</th>
                            <th>Package Name</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>


        <!-- Bootstrap Modal -->
        <div class="modal fade" id="dynamicModal" tabindex="-1" aria-labelledby="dynamicModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dynamicModalLabel">Preview</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="dynamicModalBody">
                        <!-- Content will be inserted here -->
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!--/ Content -->

    <script>
        $(document).ready(function() {

            const datatable = document.querySelector('#data-table');
            let table;

            if (datatable) {

                table = new DataTable(datatable, {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('business_categories_list') }}',
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
                            data: 'package_name',
                            name: 'package_name'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'image',
                            name: 'image'
                        },
                        {
                            data: 'description',
                            name: 'description'
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
                                                    columns: [0, 1, 2, 5],

                                                },

                                            },
                                            {
                                                extend: 'csv',
                                                text: `<span class="d-flex align-items-center"><i class="icon-base ti tabler-file-text me-1"></i>Csv</span>`,
                                                className: 'dropdown-item',
                                                exportOptions: {
                                                    columns: [0, 1, 2, 5],

                                                }
                                            },
                                            {
                                                extend: 'excel',
                                                text: `<span class="d-flex align-items-center"><i class="icon-base ti tabler-file-spreadsheet me-1"></i>Excel</span>`,
                                                className: 'dropdown-item',
                                                exportOptions: {
                                                    columns: [0, 1, 2, 5],

                                                }
                                            },
                                            {
                                                extend: 'pdf',
                                                text: `<span class="d-flex align-items-center"><i class="icon-base ti tabler-file-description me-1"></i>Pdf</span>`,
                                                className: 'dropdown-item',
                                                exportOptions: {
                                                    columns: [0, 1, 2, 5],

                                                }
                                            },
                                            {
                                                extend: 'copy',
                                                text: `<i class="icon-base ti tabler-copy me-1"></i>Copy`,
                                                className: 'dropdown-item',
                                                exportOptions: {
                                                    columns: [0, 1, 2, 5],

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




                $('#search-name, #status').on('change keyup', function() {
                    table.draw();
                });



            }

        });



        function deleteCategory(categoryId) {
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
                    let url = "{{ route('status_business_category', ':id') }}".replace(':id', categoryId);

                    $.ajax({
                        url: url,
                        method: 'GET',
                        success: function(response) {
                            Swal.fire('Deleted!', 'Category status changed.', 'success').then(() => {
                                location.reload(); // or remove row from table dynamically
                            });
                        },
                        error: function(xhr) {
                            Swal.fire('Error', 'Failed to delete Category.', 'error');
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        }


        function openModal(type, value) {
            var content = '';

            if (type === 'image') {
                content = `<img src="{{ asset('categories_images') }}/${value}" alt="Image" class="img-fluid">`;
            } else if (type === 'description') {
                content = `<p>${value}</p>`;
            } else {
                return;
            }

            $('#dynamicModalBody').html(content);
            $('#dynamicModal').modal('show');
        }
    </script>

    {{--
 dom: '<"row mb-3"<"col-md-6"B><"col-md-6 text-end"f>>' +
         '<"row mb-2"<"col-md-6"l><"col-md-6 text-end"p>>' +
         'rt' +
         '<"row mt-2"<"col-md-6"i><"col-md-6 text-end"p>>',
            // buttons: ['copy', 'csv', 'excel', 'pdf', 'print'], --}}
@endsection
