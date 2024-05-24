@extends('layouts.app')

@section('title', 'dashboard')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">{{ __('app.branches') }}
                <a href="{{ route('branches.create') }}" class="btn text-primary btn-sm"
                    data-bs-toggle="tooltip"
                    data-bs-original-title="{{ __('app.create') }}"><span
                        class="fe fe-plus fs-14"></span></a>
            </h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('app.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('app.branches') }}</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">{{ __('app.branches') }}</h3>
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
                                                       data-bs-toggle="tab">{{ __('app.all_branches') }}</a></li>
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
                                                    <x-table>
                                                        <x-thead>
                                                            <x-tr>
                                                                <x-th style="width: 5%;">Id</x-th>
                                                                <x-th>
                                                                    {{ __('app.name') }}</x-th>
                                                                <x-th>
                                                                    {{ __('app.address') }}</x-th>
                                                                <x-th>
                                                                    {{ __('app.created_at') }}</x-th>
                                                                <x-th style="width: 5%;">{{ __('app.actions') }}</x-th>
                                                            </x-tr>
                                                        </x-thead>
                                                        <x-tbody>
                                                            @foreach ($branches as $branch)
                                                            <x-tr class="border-bottom">
                                                                <td class="text-center">
                                                                    <div class="mt-0 mt-sm-2 d-block">
                                                                        <h6
                                                                            class="mb-0 fs-14 fw-semibold">
                                                                            #{{ $branch->id }}</h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div
                                                                            class="ms-3 mt-0 mt-sm-2 d-block">
                                                                            <h6
                                                                                class="mb-0 fs-14 fw-semibold">
                                                                                {{ $branch->name }}</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div
                                                                            class="mt-0 mt-sm-3 d-block">
                                                                            <h6
                                                                                class="mb-0 fs-14 fw-semibold">
                                                                                {{ $branch->address }}</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><span class="mt-sm-2 d-block"> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $branch->created_at)->format('d F Y') }} </span></td>
                                                                <td>
                                                                    <div class="g-2">
                                                                        <a href="{{ route('branches.edit', $branch->id) }}" class="btn text-primary btn-sm"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-original-title="{{ __('app.edit') }}"><span
                                                                                class="fe fe-edit fs-14"></span></a>
                                                                        <a id="delete_btn" onclick="event.preventDefault();
                                                                        document.getElementById('delete-branch-{{ $branch->id }}').submit();" class="btn text-danger btn-sm"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-original-title="{{ __('app.delete') }}"><span
                                                                                class="fe fe-trash-2 fs-14"></span></a>
                                                                                <form action="{{ route('branches.destroy', $branch->id) }}" id="delete-branch-{{ $branch->id }}" method="post">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                </form>
                                                                    </div>
                                                                </td>
                                                            </x-tr>
                                                            @endforeach

                                                        </x-tbody>
                                                    </x-table>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab__1">
                                                <div class="table-responsive">
                                                    <x-table>
                                                        <x-thead>
                                                            <x-tr>
                                                                <x-th style="width: 5%;">Id</x-th>
                                                                <x-th>
                                                                    {{ __('app.name') }}</x-th>
                                                                <x-th>
                                                                    {{ __('app.address') }}</x-th>
                                                                <x-th>
                                                                    {{ __('app.created_at') }}</x-th>
                                                                <x-th style="width: 5%;">{{ __('app.actions') }}</x-th>
                                                            </x-tr>
                                                        </x-thead>
                                                        <x-tbody>
                                                            @foreach ($branches as $branch)
                                                            @if ($branch->is_active)
                                                            <x-tr class="border-bottom">
                                                                <td class="text-center">
                                                                    <div class="mt-0 mt-sm-2 d-block">
                                                                        <h6
                                                                            class="mb-0 fs-14 fw-semibold">
                                                                            #{{ $branch->id }}</h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div
                                                                            class="ms-3 mt-0 mt-sm-2 d-block">
                                                                            <h6
                                                                                class="mb-0 fs-14 fw-semibold">
                                                                                {{ $branch->name }}</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div
                                                                            class="mt-0 mt-sm-3 d-block">
                                                                            <h6
                                                                                class="mb-0 fs-14 fw-semibold">
                                                                                {{ $branch->address }}</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><span class="mt-sm-2 d-block"> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $branch->created_at)->format('d F Y') }} </span></td>
                                                                <td>
                                                                    <div class="g-2">
                                                                        <a href="{{ route('branches.edit', $branch->id) }}" class="btn text-primary btn-sm"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-original-title="{{ __('app.edit') }}"><span
                                                                                class="fe fe-edit fs-14"></span></a>
                                                                        <a class="btn text-danger btn-sm"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-original-title="{{ __('app.delete') }}"><span
                                                                                class="fe fe-trash-2 fs-14"></span></a>
                                                                    </div>
                                                                </td>
                                                            </x-tr>
                                                            @endif
                                                            @endforeach

                                                        </x-tbody>
                                                    </x-table>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab__0">
                                                <div class="table-responsive">
                                                    <x-table>
                                                        <x-thead class="border-top">
                                                        <x-tr>
                                                            <x-th
                                                                style="width: 5%;">Id</x-th>
                                                            <x-th
                                                                >
                                                                {{ __('app.name') }}</x-th>
                                                            <x-th
                                                                >
                                                                {{ __('app.address') }}</x-th>
                                                            <x-th
                                                                >
                                                                {{ __('app.created_at') }}</x-th>
                                                            <x-th
                                                                style="width: 5%;">{{ __('app.actions') }}</x-th>
                                                        </x-tr>
                                                        </x-thead>
                                                        <x-tbody>
                                                            @foreach ($branches as $branch)
                                                            @if ($branch->is_active == false)
                                                            <x-tr class="border-bottom">
                                                                <td class="text-center">
                                                                    <div class="mt-0 mt-sm-2 d-block">
                                                                        <h6
                                                                            class="mb-0 fs-14 fw-semibold">
                                                                            #{{ $branch->id }}</h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div
                                                                            class="ms-3 mt-0 mt-sm-2 d-block">
                                                                            <h6
                                                                                class="mb-0 fs-14 fw-semibold">
                                                                                {{ $branch->name }}</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div
                                                                            class="mt-0 mt-sm-3 d-block">
                                                                            <h6
                                                                                class="mb-0 fs-14 fw-semibold">
                                                                                {{ $branch->address }}</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><span class="mt-sm-2 d-block"> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $branch->created_at)->format('d F Y') }} </span></td>
                                                                <td>
                                                                    <div class="g-2">
                                                                        <a href="{{ route('branches.edit', $branch->id) }}" class="btn text-primary btn-sm"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-original-title="{{ __('app.edit') }}"><span
                                                                                class="fe fe-edit fs-14"></span></a>
                                                                        <a class="btn text-danger btn-sm"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-original-title="{{ __('app.delete') }}"><span
                                                                                class="fe fe-trash-2 fs-14"></span></a>
                                                                    </div>
                                                                </td>
                                                            </x-tr>
                                                            @endif
                                                            @endforeach

                                                        </x-tbody>
                                                    </x-table>
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

@section('js')
    <!-- SPARKLINE JS-->
    <script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>

    <!-- C3 CHART JS -->
    <script src="{{ asset('assets/plugins/charts-c3/d3.v5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/charts-c3/c3-chart.js') }}"></script>

    <!-- INPUT MASK JS-->
    <script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>

    <!-- SIDE-MENU JS -->
    <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- TypeHead js -->
    <script src="{{ asset('assets/plugins/bootstrap5-typehead/autocomplete.js') }}"></script>
    <script src="{{ asset('assets/js/typehead.js') }}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>

    <!-- DATA TABLE JS-->
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/table-data.js') }}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll-1.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>
@endsection
