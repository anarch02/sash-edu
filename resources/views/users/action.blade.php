@extends('layouts.app')

@section('title', 'dashboard')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">{{ __('app.user') }} || {{ isset($user) ? __('app.edit') : __('app.create') }}
            </h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('app.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('app.users') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ isset($user) ? __('app.edit') : __('app.create') }}</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="post" class="form-horizontal">
                            @csrf
                            @isset($user)
                                @method('PUT')
                            @endisset

                            <div class=" row mb-4">
                                <label for="inputEmail3" class="col-md-3 form-label">{{ __('app.role')  }}</label>
                                <div class="col-md-9">
                                    <select name=role_id" class="form-control form-select select2" data-bs-placeholder="{{__('app.select')}}">
                                        <option label="{{__('app.select')}}">{{ __('app.role')  }}</option>
                                            <option @if($user->role == 1) selected @endif value="1">{{ __('app.admin')  }}</option>
                                            <option @if($user->role == 2) selected @endif value="1">{{ __('app.manager')  }}</option>
                                            <option @if($user->role == 3) selected @endif value="1">{{ __('app.teacher')  }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class=" row mb-4">
                                <label for="name" class="col-md-3 form-label">{{ __('app.name') }}</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control
                                    @error('name')
                                    mb-4 is-invalid state-invalid
                                    @enderror" @isset($user)
                                    value="{{ $user->name }}"
                                   @endisset id="name" placeholder="{{ __('app.name') }}">
                                    @error('name')
                                    <p class="text-danger"> {{ $message  }} </p>
                                    @enderror
                                </div>
                            </div>

                            <div class=" row mb-4">
                                <label for="name" class="col-md-3 form-label">{{ __('app.email') }}</label>
                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control
                                    @error('email')
                                    mb-4 is-invalid state-invalid
                                    @enderror" @isset($user)
                                        value="{{ $user->email }}"
                                           @endisset id="email" placeholder="{{ __('app.email') }}">
                                    @error('email')
                                    <p class="text-danger"> {{ $message  }} </p>
                                    @enderror
                                </div>
                            </div>

                            <div class=" row mb-4">
                                <label for="name" class="col-md-3 form-label">{{ __('app.password') }}</label>
                                <div class="col-md-9">
                                    <input type="password" name="password" class="form-control
                                    @error('password')
                                    mb-4 is-invalid state-invalid
                                    @enderror" @isset($user)
                                        value="{{ $user->password }}"
                                           @endisset id="password" placeholder="{{ __('app.password') }}">
                                    @error('password')
                                    <p class="text-danger"> {{ $message  }} </p>
                                    @enderror
                                </div>
                            </div>

                            <div class=" row mb-4">
                                <label for="name" class="col-md-3 form-label">{{ __('app.phone') }}</label>
                                <div class="col-md-9">
                                    <input type="text" name="phone" class="form-control
                                    @error('phone')
                                    mb-4 is-invalid state-invalid
                                    @enderror" @isset($user)
                                        value="{{ $user->phone }}"
                                           @endisset id="phone" placeholder="{{ __('app.hone') }}">
                                    @error('phone')
                                    <p class="text-danger"> {{ $message  }} </p>
                                    @enderror
                                </div>
                            </div>


                            @isset($user)
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-user">
                                        <div class="form-label">{{ __('app.status')  }}</div>
                                        <label class="custom-switch form-switch me-5">
                                            <input type="radio" name="is_active" class="custom-switch-input" @if(!$user->is_active) checked @endif>
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Inactive</span>
                                        </label>
                                    </div>
                                    <div class="form-user">
                                        <label class="custom-switch form-switch">
                                            <input type="radio" name="is_active" class="custom-switch-input" @if($user->is_active) checked @endif>
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Active</span>
                                        </label>
                                    </div>
                                </div>
                            @endisset

                            <div class="mb-0 mt-4 row justify-content-end">
                                <div class="col-md-9">
                                    <button type="submit" class="btn btn-primary">{{ isset($user) ? __('app.save') : __('app.create') }}</button>
                                    <a href="{{ route('users.index')  }}" class="btn btn-secondary">{{ __('app.cancel')  }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
    </div>
    <!-- CONTAINER END -->
@endsection

@section('js')
    <!-- SPARKLINE JS-->
    <script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>

    <!-- PIETY CHART JS-->
    <script src="{{ asset('assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/peitychart/peitychart.init.js') }}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll-1.js') }}"></script>

    <!-- INTERNAL CHARTJS CHART JS-->
    <script src="{{ asset('assets/plugins/chart/Chart.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart/rounded-barchart.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart/utils.js') }}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>

    <!-- INTERNAL Data tables js-->
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>

    <!-- INTERNAL APEXCHART JS -->
    <script src="{{ asset('assets/js/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/irregular-data-series.js') }}"></script>

    <!-- INTERNAL Flot JS -->
    <script src="{{ asset('assets/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/chart.flot.sampledata.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/dashboard.sampledata.js') }}"></script>

    <!-- INTERNAL Vector js -->
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- SIDE-MENU JS-->
    <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- TypeHead js -->
    <script src="{{ asset('assets/plugins/bootstrap5-typehead/autocomplete.js') }}"></script>
    <script src="{{ asset('assets/js/typehead.js') }}"></script>

    <!-- INTERNAL INDEX JS -->
    <script src="{{ asset('assets/js/index1.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>
@endsection
