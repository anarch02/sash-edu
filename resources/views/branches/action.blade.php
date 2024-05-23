@extends('layouts.app')

@section('title', 'dashboard')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">{{ __('app.branch') }} || {{ isset($branch) ? __('app.edit') : __('app.create') }}
            </h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('app.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('branches.index') }}">{{ __('app.branches') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ isset($branch) ? __('app.edit') : __('app.create') }}</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <div class="row">
            <div class="col-12 col-sm-12">
                    <form action="{{ isset($branch) ? route('branches.update', $branch->id) : route('branches.store') }}" method="post" class="card">
                        @csrf
                        @isset($branch)
                            @method('PUT')
                        @endisset

                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">{{ __('app.name') }}</label>
                                @error('name')
                                <p class="text-danger"> {{ $message  }} </p>
                                @enderror
                                <input type="text" @isset($branch)
                                    value="{{ $branch->name }}"
                                @endisset class="form-control @error('name')
                                    mb-4 is-invalid state-invalid
                                @enderror" id="name" name="name" placeholder="{{ __('app.name') }}">

                            </div>
                            <div class="form-group">
                                <label for="address">{{ __('app.address') }}</label>
                                @error('address')
                                <p class="text-danger"> {{ $message  }} </p>
                                @enderror
                                <input type="text" @isset($branch)
                                    value="{{ $branch->address }}"
                                @endisset class="form-control @error('address')
                                    mb-4 is-invalid state-invalid
                                @enderror " id="address" name="address" placeholder="{{ __('app.address') }}">

                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="city">{{ __('app.city') }}</label>
                                        @error('city')
                                        <p class="text-danger"> {{ $message  }} </p>
                                        @enderror
                                        <input type="text" @isset($branch)
                                            value="{{ $branch->city }}"
                                        @endisset class="form-control @error('city')
                                            mb-4 is-invalid state-invalid
                                        @enderror" id="city" name="city" placeholder="{{ __('app.city') }}">

                                    </div>
                                </div>

                                 @isset($branch)
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <div class="form-label">Toggle switch</div>
                                            <label class="custom-switch form-switch me-5">
                                                <input type="radio" name="is_active" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Inactive</span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="custom-switch form-switch">
                                                <input type="radio" name="is_active" class="custom-switch-input" checked>
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Active</span>
                                            </label>
                                        </div>
                                    </div>
                                @endisset

                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-success my-1">{{ isset($branch) ? __('app.save') : __('app.create') }}</button>
                            <a href="{{ route('branches.index') }}" class="btn btn-danger my-1">{{ __('app.cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <!-- CONTAINER END -->
@endsection
