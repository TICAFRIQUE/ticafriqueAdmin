@extends('backend.layouts.master')
@section('title')
    @lang('translation.settings')
@endsection
@section('content')
    {{-- <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="{{ URL::asset('build/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">
            <div class="overlay-content">
                <div class="text-end p-3">
                    <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                        <input id="profile-foreground-img-file-input" type="file"
                            class="profile-foreground-img-file-input">
                        <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                            <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                <i class="fas fa-home"></i> Informations du site
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#privacy" role="tab">
                                <i class="far fa-envelope"></i> Application
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <form action="{{ route('setting.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <!-- ========== Start logo header ========== -->
                                    <div class="text-center col-lg-6">
                                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                            @if ($data_setting != null)
                                                <img src="{{ URL::asset($data_setting->getFirstMediaUrl('logo_header')) }}"
                                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image-header material-shadow"
                                                    alt="{{ $data_setting->getFirstMediaUrl('logo_header') }}">
                                            @else
                                                <img src="{{ URL::asset('images/avatar-1.jpg') }}"
                                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image-header material-shadow"
                                                    alt="">
                                            @endif

                                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                <input id="profile-img-file-input-header" type="file" name="logo_header"
                                                    class="profile-img-file-input-header">
                                                <label for="profile-img-file-input-header"
                                                    class="profile-photo-edit avatar-xs">
                                                    <span
                                                        class="avatar-title rounded-circle bg-light text-body material-shadow">
                                                        <i class="ri-camera-fill"></i>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <h5 class="fs-16 mb-1">Logo header</h5>
                                        <p class="text-muted mb-0">Logo du haut</p>
                                    </div>
                                    <!-- ========== End logo header ========== -->


                                    <!-- ========== Start logo footer ========== -->
                                    <div class="text-center col-lg-6">
                                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">

                                            @if ($data_setting != null)
                                                <img src="{{ URL::asset($data_setting->getFirstMediaUrl('logo_footer')) }}"
                                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image-footer material-shadow"
                                                    alt="{{ $data_setting->getFirstMediaUrl('logo_footer') }}">
                                            @else
                                                <img src="{{ URL::asset('images/avatar-1.jpg') }}"
                                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image-header material-shadow"
                                                    alt="">
                                            @endif

                                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit1">
                                                <input id="profile-img-file-input-footer" type="file" name="logo_footer"
                                                    class="profile-img-file-input-footer">
                                                <label for="profile-img-file-input-footer"
                                                    class="profile-photo-edit avatar-xs">
                                                    <span
                                                        class="avatar-title rounded-circle bg-light text-body material-shadow">
                                                        <i class="ri-camera-fill"></i>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <h5 class="fs-16 mb-1">Logo footer</h5>
                                        <p class="text-muted mb-0">Logo du pied de page</p>
                                    </div>
                                    <!-- ========== End logo footer ========== -->
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Telephone</label>
                                            <input type="text" name="phone" class="form-control" id="phonenumberInput"
                                                placeholder="Enter your phone number" value="{{ $data_setting['phone'] ?? ''}}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="emailInput"
                                                value="{{ $data_setting['email'] ?? ''}}">
                                        </div>
                                    </div>
                                    <!--end col-->


                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="countryInput" class="form-label">Siège social</label>
                                            <input type="text" name="siege_social" class="form-control" id="countryInput"
                                                value="{{ $data_setting['siege_social'] ?? '' }}" />
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="countryInput" class="form-label">Localisation</label>
                                            <input type="text" name="localisation" class="form-control"
                                                id="countryInput" value="{{ $data_setting['localisation'] ?? '' }}" />
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="countryInput" class="form-label">Google maps</label>
                                            <input type="text" name="google_maps" class="form-control"
                                                id="countryInput" value="{{ $data_setting['google_maps'] ?? '' }}" />
                                        </div>
                                    </div>

                                    <!--end col-->




                                    <!-- ========== Start social network ========== -->
                                    <div class="row mt-4">
                                        <div class="mb-3 d-flex">
                                            <div class="avatar-xs d-block flex-shrink-0 me-3">
                                                <span class="avatar-title rounded-circle fs-16 bg-primary material-shadow">
                                                    <i class=" ri-facebook-fill"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="facebook_link" class="form-control"
                                                id="websiteInput" placeholder="lien facebook"
                                                value="{{ $data_setting['facebook_link'] ?? ''}}">
                                        </div>
                                        <div class="mb-3 d-flex">
                                            <div class="avatar-xs d-block flex-shrink-0 me-3">
                                                <span class="avatar-title rounded-circle fs-16 bg-primary material-shadow">
                                                    <i class=" ri-instagram-fill"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="instagram_link" class="form-control"
                                                id="websiteInput" placeholder="lien instagram"
                                                value="{{ $data_setting['instagram_link'] ?? '' }}">
                                        </div>

                                        <div class=" mb-3 d-flex">
                                            <div class="avatar-xs d-block flex-shrink-0 me-3">
                                                <span class="avatar-title rounded-circle fs-16 bg-danger material-shadow">
                                                    <i class=" ri-tiktok-fill"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="tiktok_link" class="form-control"
                                                id="pinterestName" placeholder="Username"
                                                value="{{ $data_setting['tiktok_link'] ?? ''}}">
                                        </div>
                                        <div class="mb-3 d-flex">
                                            <div class="avatar-xs d-block flex-shrink-0 me-3">
                                                <span class="avatar-title rounded-circle fs-16 bg-danger material-shadow">
                                                    <i class=" ri-linkedin-line"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="linkedin_link" class="form-control"
                                                id="pinterestName" value="{{ $data_setting['linkedin_link'] ?? '' }}">
                                        </div>

                                        <div class="mb-3 d-flex">
                                            <div class="avatar-xs d-block flex-shrink-0 me-3">
                                                <span class="avatar-title rounded-circle fs-16 bg-danger material-shadow">
                                                    <i class=" ri-twitter-x-fill"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="twitter_link" class="form-control"
                                                id="pinterestName" placeholder="Username"
                                                value="{{ $data_setting['twitter_link'] ?? ''}}">
                                        </div>
                                    </div>
                                    <!-- ========== End social network ========== -->


                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">Valider</button>
                                            {{-- <button type="button" class="btn btn-soft-success">A</button> --}}
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>

                            </form>
                        </div>
                        <!--end tab-pane-->


                        <div class="tab-pane" id="privacy" role="tabpanel">
                            <div class="mb-4 pb-2">
                                {{-- <h5 class="card-title text-decoration-underline mb-3">Security:</h5> --}}

                                <div class="d-flex flex-column flex-sm-row mb-4 mb-sm-0">
                                    <input type="text" name="type_clear" value="cache" hidden>
                                    <div class="flex-grow-1">
                                        <h6 class="fs-14 mb-1">Cache systeme</h6>
                                        <p class="text-muted">En cliquant sur vider le cache vous allez supprimer les
                                            fichier temporaires stockés en memoire</p>
                                    </div>
                                    <div class="flex-shrink-0 ms-sm-3">
                                        <a href="#" class="btn btn-sm btn-primary btn-clear">Vider
                                            le
                                            cache</a>
                                    </div>
                                </div>



                            </div>
                            <div class="mb-3">
                                {{-- <h5 class="card-title text-decoration-underline mb-3">Application </h5> --}}
                                <ul class="list-unstyled mb-0">
                                    <li class="d-flex">
                                        <div class="flex-grow-1">
                                            <label for="directMessage" class="form-check-label fs-14">Maintenance
                                                mode</label>
                                            <p class="text-muted">Mettre l'application en mode maintenance</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            @if ($data_maintenance == null || $data_maintenance['type'] == 'up')
                                                <div class="form-check form-switch">
                                                    <a href="#"
                                                        class="btn btn-sm btn-primary btn-mode-down">Activer</a>
                                                </div>
                                            @else
                                                <div class="form-check form-switch">
                                                    <a href="#"
                                                        class="btn btn-sm btn-primary btn-mode-up">Désactiver</a>
                                                </div>
                                            @endif

                                        </div>
                                    </li>

                                </ul>
                            </div>

                        </div>
                        <!--end tab-pane-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/pages/profile-setting.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script>
        $(document).ready(function() {

            //cache clear
            $('.btn-clear').click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "get",
                    url: "{{ route('setting.cache-clear') }}",
                    // data: "data",
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 200) {
                            let timerInterval;
                            Swal.fire({
                                title: "Traitement en cour!",
                                html: "Se termine dans <b></b> milliseconds.",
                                timer: 6000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading();
                                    const timer = Swal.getPopup().querySelector(
                                        "b");
                                    timerInterval = setInterval(() => {
                                        timer.textContent =
                                            `${Swal.getTimerLeft()}`;
                                    }, 100);
                                },
                                willClose: () => {
                                    clearInterval(timerInterval);
                                }
                            }).then((result) => {
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    console.log("I was closed by the timer");
                                }
                            });
                        }
                    }
                });
            });

            // maintenance mode down
            $('.btn-mode-down').click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "get",
                    url: "{{ route('setting.maintenance-down') }}",
                    // data: "data",
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 200) {
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Mode maintenance activé",
                                showConfirmButton: false,
                                timer: 1500
                            });

                            $('btn-mode-up').html('désactivé');
                            location.reload(true);
                        }
                    }
                });
            });

            // maintenance mode up
            $('.btn-mode-up').click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "get",
                    url: "{{ route('setting.maintenance-up') }}",
                    // data: "data",
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 200) {
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Mode maintenance desactivé",
                                showConfirmButton: false,
                                timer: 1500
                            });

                            location.reload(true);
                        }
                    }
                });
            });


        });
    </script>
@endsection
