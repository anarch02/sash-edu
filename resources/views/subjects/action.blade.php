@extends('layouts.app')

@section('title', 'dashboard')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">{{ __('app.subject') }} || {{ isset($subject) ? __('app.edit') : __('app.create') }}
            </h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('app.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('subjects.index') }}">{{ __('app.subjects') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ isset($subject) ? __('app.edit') : __('app.create') }}</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <div class="row">
            <div class="col-12 col-sm-12">
                    <form action="{{ isset($subject) ? route('subjects.update', $subject->id) : route('subjects.store') }}" method="post" class="card">
                        @csrf
                        @isset($subject)
                            @method('PUT')
                        @endisset

                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">{{ __('app.name') }}</label>
                                @error('name')
                                <p class="text-danger"> {{ $message  }} </p>
                                @enderror
                                <input type="text" @isset($subject)
                                    value="{{ $subject->name }}"
                                @endisset class="form-control @error('name')
                                    mb-4 is-invalid state-invalid
                                @enderror" id="name" name="name" placeholder="{{ __('app.name') }}">

                            </div>

                            <div class="row">
                                 @isset($subject)
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <div class="form-label">{{ __('app.status')  }}</div>
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
                            <button type="submit" class="btn btn-success my-1">{{ isset($subject) ? __('app.save') : __('app.create') }}</button>
                            <a href="{{ route('subjects.index') }}" class="btn btn-danger my-1">{{ __('app.cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <!-- CONTAINER END -->
@endsection
