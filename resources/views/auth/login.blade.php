@extends('layouts.auth_layout')

@section('body')
    <!--begin::Body-->
    <div class="d-flex flex-column flex-lg-row-fluid py-10">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
                <form class="form w-100" id="login_form" onsubmit="event.preventDefault(); performLogin();" autocomplete="off">

                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">Sign In to Metronic</h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">New Here?
                            <a href="{{ route('register') }}" class="link-primary fw-bolder">Create an Account</a>
                        </div>
                        <!--end::Link-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid" type="text" name="email"
                            autocomplete="off" id="email" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack mb-2">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                            <!--end::Label-->
                            <!--begin::Link-->
                            <a href="{{route('forgot.password')}}"
                                class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                            <!--end::Link-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid" type="password" name="password"
                            autocomplete="off" id="password" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <!--begin::Submit button-->
                        <button type="submit" class="btn btn-primary">Continue</button>
                        <!--end::Submit button-->
                        {{--
                    <!--begin::Separator-->
                    <div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div>
                    <!--end::Separator-->
                    <!--begin::Google link-->
                    <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                    <img alt="Logo" src="dist/assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Continue with Google</a>
                    <!--end::Google link-->
                    <!--begin::Google link-->
                    <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                    <img alt="Logo" src="dist/assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-3" />Continue with Facebook</a>
                    <!--end::Google link-->
                    <!--begin::Google link-->
                    <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100">
                    <img alt="Logo" src="dist/assets/media/svg/brand-logos/apple-black.svg" class="h-20px me-3" />Continue with Apple</a>
                    <!--end::Google link-->
                    --}}
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->

    @stop

    @section('js')
        <!--begin::Page Custom Javascript(used by this page)-->
        <script src="dist/assets/js/custom/authentication/sign-in/general.js"></script>
        <!--end::Page Custom Javascript-->

        <script>
            function performLogin() {
                let formData = new FormData();
                formData.append('email', document.getElementById('email').value);
                formData.append('password', document.getElementById('password').value);

                axios.post('/login', formData).then(function(response) {

                    console.log(response);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'success',
                        title: response.data.message
                    })
                    document.getElementById('login_form').reset();
                    window.location.href = "/home";

                }).catch(function(error) {
                    console.log(error);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'error',
                        title: error.response.data.message
                    })
                });
            }
        </script>
    @stop
