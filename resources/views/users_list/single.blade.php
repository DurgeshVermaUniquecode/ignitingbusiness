@extends('layouts.app')
@section('content')

  <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Header -->
              <div class="row">
                <div class="col-12">
                  <div class="card mb-6">

                    <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-5">
                      <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img

                            @if($user->image != null)
 src="{{asset('profile_images/'.$user->image)}}"

                            @else
src="{{asset('assets/img/avatars/1.png')}}"
                            @endif

                          alt="user image"
                          class="d-block h-auto ms-0 ms-sm-6 rounded user-profile-img" />
                      </div>
                      <div class="flex-grow-1 mt-3 mt-lg-5">
                        <div
                          class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                          <div class="user-profile-info">
                            <h4 class="mb-2 mt-lg-6">{{$user->name}}</h4>
                            <ul
                              class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 my-2">
                              <li class="list-inline-item d-flex gap-2 align-items-center">
                                <i class="icon-base ti tabler-mail icon-lg"></i
                                ><span class="fw-medium">{{$user->email}}</span>
                              </li>
                              <li class="list-inline-item d-flex gap-2 align-items-center">
                                <i class="icon-base ti tabler-phone icon-lg"></i
                                ><span class="fw-medium">{{$user->phone_number}}</span>
                              </li>
                              <li class="list-inline-item d-flex gap-2 align-items-center">
                                <i class="icon-base ti tabler-calendar icon-lg"></i
                                ><span class="fw-medium"> Joined {{$user->created_at}}</span>
                              </li>
                            </ul>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Header -->



              <!-- User Profile Content -->
              <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                  <!-- About User -->
                  <div class="card mb-6">
                    <div class="card-body">
                      <p class="card-text text-uppercase text-body-secondary small mb-0">About</p>
                      <ul class="list-unstyled my-3 py-1">
                        <li class="d-flex align-items-center mb-4">
                          <i class="icon-base ti tabler-user icon-lg"></i
                          ><span class="fw-medium mx-2">Full Name:</span> <span>{{$user->name}}</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                          <i class="icon-base ti tabler-check icon-lg"></i><span class="fw-medium mx-2">Status:</span>
                          <span>{{$user->status}}</span>
                        </li>

                        <li class="d-flex align-items-center mb-4">
                          <i class="icon-base ti tabler-world icon-lg"></i><span class="fw-medium mx-2">Country:</span>
                          <span>{{$user->address->country->name}}</span>
                        </li>

                        <li class="d-flex align-items-center mb-4">
                          <i class="icon-base ti tabler-world icon-lg"></i><span class="fw-medium mx-2">State:</span>
                          <span>{{$user->address->state->name}}</span>
                        </li>


                        <li class="d-flex align-items-center mb-4">
                          <i class="icon-base ti tabler-world icon-lg"></i><span class="fw-medium mx-2">City:</span>
                          <span>{{$user->address->city->name}}</span>
                        </li>


                        <li class="d-flex align-items-center mb-2">
                          <i class="icon-base ti tabler-world icon-lg"></i
                          ><span class="fw-medium mx-2">Address:</span> <span>{{$user->address->address}},{{$user->address->zip}}</span>
                        </li>
                      </ul>
                      <p class="card-text text-uppercase text-body-secondary small mb-0">Contacts</p>
                      <ul class="list-unstyled my-3 py-1">
                        <li class="d-flex align-items-center mb-4">
                          <i class="icon-base ti tabler-phone-call icon-lg"></i
                          ><span class="fw-medium mx-2">Contact:</span>
                          <span>{{$user->phone_number}}</span>
                        </li>

                        <li class="d-flex align-items-center mb-4">
                          <i class="icon-base ti tabler-mail icon-lg"></i><span class="fw-medium mx-2">Email:</span>
                          <span>{{$user->email}}</span>
                        </li>
                      </ul>

                    </div>
                  </div>
                  <!--/ About User -->

                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                  <!-- About User -->
                  <div class="card mb-6">
                    <div class="card-body">
                      <p class="card-text text-uppercase text-body-secondary small mb-0">Bank</p>
                      <ul class="list-unstyled my-3 py-1">
                        <li class="d-flex align-items-center mb-4">
                          <i class="icon-base ti tabler-user icon-lg"></i
                          ><span class="fw-medium mx-2">Name at Bank:</span> <span>{{$user->bank->user_name_at_bank}}</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                          <i class="icon-base ti tabler-check icon-lg"></i><span class="fw-medium mx-2">Account No.:</span>
                          <span>{{$user->bank->account_number}}</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                          <i class="icon-base ti tabler-crown icon-lg"></i><span class="fw-medium mx-2">IFSC:</span>
                          <span>{{$user->bank->ifscode}}</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                          <i class="icon-base ti tabler-flag icon-lg"></i><span class="fw-medium mx-2">Bank:</span>
                          <span>{{$user->bank->bank->name}}</span>
                        </li>

                      </ul>
                      <p class="card-text text-uppercase text-body-secondary small mb-0">Identification</p>
                      <ul class="list-unstyled my-3 py-1">
                        <li class="d-flex align-items-center mb-4">
                          <i class="icon-base ti tabler-phone-call icon-lg"></i
                          ><span class="fw-medium mx-2">Identification Type:</span>
                          <span>{{$user->kyc->address_proof_type}}</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                          <i class="icon-base ti tabler-messages icon-lg"></i
                          ><span class="fw-medium mx-2">Number:</span> <span>{{$user->kyc->id_proof_no}}</span>
                        </li>

                        <li class="d-flex align-items-center mb-4">
                          <i class="icon-base ti tabler-mail icon-lg"></i><span class="fw-medium mx-2">Image:</span>
                          <br>
                          <img src="{{asset('identification_images/'.$user->kyc->id_proof_img)}}" alt="" width="100%" height="200px">
                        </li>
                      </ul>

                    </div>
                  </div>
                  <!--/ About User -->

                </div>


              </div>
              <!--/ User Profile Content -->
            </div>
            <!--/ Content -->

@endsection
