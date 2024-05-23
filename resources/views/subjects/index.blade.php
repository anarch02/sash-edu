@extends('layouts.app')

@section('title', 'dashboard')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">{{ __('app.subjects') }}
                <a href="{{ route('subjects.create') }}" class="btn text-primary btn-sm"
                    data-bs-toggle="tooltip"
                    data-bs-original-title="{{ __('app.create') }}"><span
                        class="fe fe-plus fs-14"></span></a>
            </h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('app.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('app.subjects') }}</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">{{ __('app.subjects') }}</h3>
                    </div>
                    <div class="card-body pt-4">
                        <div class="grid-margin">
                            <div class="">
                                <div class="panel panel-primary">
                                    <div class="tab-menu-heading border-0 p-0">
                                        <div class="tabs-menu1">
                                            <!-- Tabs -->
                                            <ul class="nav panel-tabs product-sale">
                                                <li><a href="#tab5" class="active"
                                                       data-bs-toggle="tab">{{ __('app.all_subjects') }}</a></li>
                                                <li><a href="#tab__1" data-bs-toggle="tab"
                                                       class="text-dark">{{ __('app.active') }}</a></li>
                                                <li><a href="#tab__0" data-bs-toggle="tab"
                                                       class="text-dark">{{ __('app.inactive') }}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body tabs-menu-body border-0 pt-0">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab5">
                                                <div class="table-responsive">
                                                    <table id="data-table"
                                                           class="table table-bordered text-nowrap mb-0">
                                                        <thead class="border-top">
                                                        <tr>
                                                            <th class="bg-transparent border-bottom-0"
                                                                style="width: 5%;">Id</th>
                                                            <th
                                                                class="bg-transparent border-bottom-0">
                                                                {{ __('app.name') }}</th>

                                                            <th
                                                                class="bg-transparent border-bottom-0">
                                                                {{ __('app.created_at') }}</th>
                                                            <th class="bg-transparent border-bottom-0"
                                                                style="width: 5%;">{{ __('app.actions') }}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($subjects as $subject)
                                                            <tr class="border-bottom">
                                                                <td class="text-center">
                                                                    <div class="mt-0 mt-sm-2 d-block">
                                                                        <h6
                                                                            class="mb-0 fs-14 fw-semibold">
                                                                            #{{ $subject->id }}</h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div
                                                                            class="ms-3 mt-0 mt-sm-2 d-block">
                                                                            <h6
                                                                                class="mb-0 fs-14 fw-semibold">
                                                                                {{ $subject->name }}</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><span class="mt-sm-2 d-block"> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $subject->created_at)->format('d F Y') }} </span></td>
                                                                <td>
                                                                    <div class="g-2">
                                                                        <a href="{{ route('subjects.edit', $subject->id) }}" class="btn text-primary btn-sm"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-original-title="{{ __('app.edit') }}"><span
                                                                                class="fe fe-edit fs-14"></span></a>
                                                                        <a id="delete_btn" onclick="event.preventDefault();
                                                                        document.getElementById('delete-branch-{{ $subject->id }}').submit();" class="btn text-danger btn-sm"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-original-title="{{ __('app.delete') }}"><span
                                                                                class="fe fe-trash-2 fs-14"></span></a>
                                                                                <form action="{{ route('subjects.destroy', $subject->id) }}" id="delete-branch-{{ $subject->id }}" method="post">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab__1">
                                                <div class="table-responsive">
                                                    <table id="data-table"
                                                           class="table table-bordered text-nowrap mb-0">
                                                        <thead class="border-top">
                                                        <tr>
                                                            <th class="bg-transparent border-bottom-0"
                                                                style="width: 5%;">Id</th>
                                                            <th
                                                                class="bg-transparent border-bottom-0">
                                                                {{ __('app.name') }}</th>
                                                            <th
                                                                class="bg-transparent border-bottom-0">
                                                                {{ __('app.address') }}</th>
                                                            <th
                                                                class="bg-transparent border-bottom-0">
                                                                {{ __('app.created_at') }}</th>
                                                            <th class="bg-transparent border-bottom-0"
                                                                style="width: 5%;">{{ __('app.actions') }}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($subjects as $subject)
                                                            @if ($subject->is_active)
                                                            <tr class="border-bottom">
                                                                <td class="text-center">
                                                                    <div class="mt-0 mt-sm-2 d-block">
                                                                        <h6
                                                                            class="mb-0 fs-14 fw-semibold">
                                                                            #{{ $subject->id }}</h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div
                                                                            class="ms-3 mt-0 mt-sm-2 d-block">
                                                                            <h6
                                                                                class="mb-0 fs-14 fw-semibold">
                                                                                {{ $subject->name }}</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><span class="mt-sm-2 d-block"> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $subject->created_at)->format('d F Y') }} </span></td>
                                                                <td>
                                                                    <div class="g-2">
                                                                        <a href="{{ route('subjects.edit', $subject->id) }}" class="btn text-primary btn-sm"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-original-title="{{ __('app.edit') }}"><span
                                                                                class="fe fe-edit fs-14"></span></a>
                                                                        <a class="btn text-danger btn-sm"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-original-title="{{ __('app.delete') }}"><span
                                                                                class="fe fe-trash-2 fs-14"></span></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab__0">
                                                <div class="table-responsive">
                                                    <table id="data-table"
                                                           class="table table-bordered text-nowrap mb-0">
                                                        <thead class="border-top">
                                                        <tr>
                                                            <th class="bg-transparent border-bottom-0"
                                                                style="width: 5%;">Id</th>
                                                            <th
                                                                class="bg-transparent border-bottom-0">
                                                                {{ __('app.name') }}</th>
                                                            <th
                                                                class="bg-transparent border-bottom-0">
                                                                {{ __('app.address') }}</th>
                                                            <th
                                                                class="bg-transparent border-bottom-0">
                                                                {{ __('app.created_at') }}</th>
                                                            <th class="bg-transparent border-bottom-0"
                                                                style="width: 5%;">{{ __('app.actions') }}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($subjects as $subject)
                                                            @if ($subject->is_active == false)
                                                            <tr class="border-bottom">
                                                                <td class="text-center">
                                                                    <div class="mt-0 mt-sm-2 d-block">
                                                                        <h6
                                                                            class="mb-0 fs-14 fw-semibold">
                                                                            #{{ $subject->id }}</h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div
                                                                            class="ms-3 mt-0 mt-sm-2 d-block">
                                                                            <h6
                                                                                class="mb-0 fs-14 fw-semibold">
                                                                                {{ $subject->name }}</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><span class="mt-sm-2 d-block"> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $subject->created_at)->format('d F Y') }} </span></td>
                                                                <td>
                                                                    <div class="g-2">
                                                                        <a href="{{ route('subjects.edit', $subject->id) }}" class="btn text-primary btn-sm"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-original-title="{{ __('app.edit') }}"><span
                                                                                class="fe fe-edit fs-14"></span></a>
                                                                        <a class="btn text-danger btn-sm"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-original-title="{{ __('app.delete') }}"><span
                                                                                class="fe fe-trash-2 fs-14"></span></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTAINER END -->
@endsection