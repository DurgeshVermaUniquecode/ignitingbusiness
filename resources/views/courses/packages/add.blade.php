@extends('layouts.app')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout -->
        <div class="row mb-6 gy-6">

            <div class="col-xl">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add Package</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('add_package')}}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label class="form-label" for="name">Name <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span id="name2" class="input-group-text"><i
                                                    class="icon-base ti tabler-package"></i></span>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="First Package" aria-label="First Package"
                                                value="{{ old('name') }}" aria-describedby="name2" />
                                        </div>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label class="form-label" for="gst">GST %<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span id="gst2" class="input-group-text"><i
                                                    class="icon-base ti tabler-coin-rupee"></i></span>
                                            <input type="number" id="gst" name="gst"
                                                class="form-control gst-mask" placeholder="12"
                                                aria-label="12" aria-describedby="gst2" required
                                                value="{{ old('gst') }}" />
                                        </div>
                                        @error('gst')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label class="form-label" for="amount">Amount %<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span id="amount2" class="input-group-text"><i
                                                    class="icon-base ti tabler-coin-rupee"></i></span>
                                            <input type="number" id="amount" name="amount"
                                                class="form-control amount-mask" placeholder="12"
                                                aria-label="12" aria-describedby="amount2" required
                                                value="{{ old('amount') }}" />
                                        </div>
                                        @error('amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label for="image" class="form-label">Image</label>
                                        <input class="form-control" type="file" id="image"
                                            name="image" accept="image/*" />
                                    </div>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>




                                <div class="col-sm-12">
                                    <div class="mb-6">
                                        <label class="form-label" for="description">Description<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <textarea id="description" name="description" class="form-control" placeholder="description" aria-label="description"
                                                aria-describedby="description2">{{ old('description') }}</textarea>
                                        </div>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>


                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!--/ Content -->


@endsection
