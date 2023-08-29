@extends('layouts.dashboard_layout')

@section('css')
    <link href="dist/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@stop

@section('page_title')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">My Profile</h1>
@stop

@section('content')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::details View-->
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Profile Details</h3>
                    </div>
                    <!--end::Card title-->
                    {{-- <!--begin::Action-->
                    <a href="#" class="btn btn-primary align-self-center">Edit Profile</a>
                    <!--end::Action--> --}}
                </div>
                <!--begin::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9">
                    <div class="row">
                        <div class="column" style="
                        width: 70%;">
                            <!--begin::Row-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">Full Name</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bolder fs-6 text-gray-800">{{Auth::user()->name}}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Input group-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">Email</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold text-gray-800 fs-6">{{Auth::user()->email}}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">Contact Phone</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 d-flex align-items-center">
                                    <span class="fw-bolder fs-6 text-gray-800 me-2">{{Auth::user()->phone}}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="column" style="
                        width: 30%;">
                            <div class="me-7 mb-4">
                                @if (Auth::user()->image)
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    <img src="{{Auth::user()->image}}" alt="image" />
                                </div>
                                @else
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    <img src="dist/assets/media/avatars/profile.png" alt="image" />
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>

                </div>
                <!--end::Card body-->
            </div>
            <!--end::details View-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@stop
@section('js')
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="dist/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="dist/assets/js/widgets.bundle.js"></script>
    <script src="dist/assets/js/custom/widgets.js"></script>
    <script src="dist/assets/js/custom/apps/chat/chat.js"></script>
    <script src="dist/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="dist/assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="dist/assets/js/custom/utilities/modals/offer-a-deal/type.js"></script>
    <script src="dist/assets/js/custom/utilities/modals/offer-a-deal/details.js"></script>
    <script src="dist/assets/js/custom/utilities/modals/offer-a-deal/finance.js"></script>
    <script src="dist/assets/js/custom/utilities/modals/offer-a-deal/complete.js"></script>
    <script src="dist/assets/js/custom/utilities/modals/offer-a-deal/main.js"></script>
    <script src="dist/assets/js/custom/utilities/modals/users-search.js"></script>
    <!--end::Page Custom Javascript-->
@stop
