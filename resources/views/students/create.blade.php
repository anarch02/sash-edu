@extends('layouts.app')

@section('title', 'dashboard')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">{{ __('app.student') }} || {{ __('app.create') }}
            </h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('app.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('students.index') }}">{{ __('app.students') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('app.create') }}</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!--Row-->
        <div class="row ">
            <div class="col-md-12">
                <form action="{{ route('students.store') }}" method="POST" id="form" class="card">
                    @csrf
                    <div class="card-body">
                        <div id="wizard3">
                            <h3>{{ __('app.per_info')  }}</h3>
                            <section>
                                <div class="control-group form-group">
                                    <label class="form-label">{{ __('app.fio')  }}</label>
                                    @error('name')
                                    <p class="text-danger"> {{ $message  }} </p>
                                    @enderror
                                    <input type="text" name="name" class="form-control" placeholder="{{ __('app.fio')  }}">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">{{__('app.branch')}}</label>
                                    @error('branch_id')
                                    <p class="text-danger"> {{ $message  }} </p>
                                    @enderror
                                    <select name="branch_id" class="form-control form-select select2" data-bs-placeholder="{{__('app.select')}}">
                                        <option label="{{__('app.select')}}">{{ __('app.branch')  }}</option>
                                        @foreach($branches as $branch)
                                            <option value="{{ $branch->id  }}">{{ $branch->name  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">{{ __('app.phone')  }}</label>
                                    @error('phone')
                                    <p class="text-danger"> {{ $message  }} </p>
                                    @enderror
                                    <input type="text" name="phone" class="form-control" placeholder="{{ __('app.phone')  }}">
                                </div>
{{--                                <div class="control-group form-group mb-0">--}}
{{--                                    <label class="form-label">{{__('app.address')}}</label>--}}
{{--                                    @error('address')--}}
{{--                                    <p class="text-danger"> {{ $message  }} </p>--}}
{{--                                    @enderror--}}
{{--                                    <input type="text" name="address" class="form-control" placeholder="{{__('app.address')}}">--}}
{{--                                </div>--}}
                                <div class="control-group form-group  row">
                                    <div class="col-lg-12 col-sm-12">
                                        <label class="form-label">{{__('app.image')}}: {{__('app.not_required')}} </label>
                                        @error('image')
                                        <p class="text-danger"> {{ $message  }} </p>
                                        @enderror
                                        <input type="file" name="image" class="dropify" onchange="readURL(this);"
                                               data-height="180" />
                                    </div>
                                </div>
                            </section>
                            <h3>{{ __('app.choose_group')  }}</h3>
                            <section>
                                <div class="control-group form-group">
                                    <label class="form-label">{{__('app.group')}}</label>
                                    @error('group_id')
                                    <p class="text-danger"> {{ $message  }} </p>
                                    @enderror
                                    <select name="group_id" class="form-control form-select select2" data-bs-placeholder="{{__('app.select')}}">
                                        <option label="{{__('app.select')}}">{{ __('app.group')  }}</option>
                                        @foreach($groups as $group)
                                            <option value="{{ $group->id  }}">{{ $group->name  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </section>
                            <h3>{{__('app.creating')}}</h3>
                            <section>
                                <p class="text-center">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                </p>
                            </section>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- CONTAINER END -->
@endsection

@section('js')
    <!-- SIDE-MENU JS-->
    <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- TypeHead js -->
    <script src="{{ asset('assets/plugins/bootstrap5-typehead/autocomplete.js') }}"></script>
    <script src="{{ asset('assets/js/typehead.js') }}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}'"></script>

    <!-- FORM WIZARD JS-->
    <script src="{{ asset('assets/plugins/formwizard/jquery.smartWizard.js') }}"></script>
    <script src="{{ asset('assets/plugins/formwizard/fromwizard.js') }}"></script>

    <!-- INTERNAl Jquery.steps js -->
    <script src="{{ asset('assets/plugins/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll-1.js') }}"></script>

    <!-- INTERNAL Accordion-Wizard-Form js-->
    <script src="{{ asset('assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-wizard.js') }}"></script>

    <!-- FILE UPLOADES JS -->
    <script src="{{ asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>

    <!-- INTERNAL File-Uploads Js-->
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>
@endsection

