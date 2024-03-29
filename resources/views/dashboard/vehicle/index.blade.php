@extends('dashboard.layout.app')
@section('title', 'Vehicle')
@section('content')
    @push('custom_css')
        @include('dashboard.layout.includes.data_table_css')
    @endpush
    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">
            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-1">
                <div class="">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">
                                    <ion-icon name="home-outline"></ion-icon>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Vehicle</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="d-flex justify-content-between index_title">
                <h6 class="mb-0">Vehicle List</h6>
                <a data-toggle="modal" data-bs-target="#createModal" data-bs-toggle="modal" class="btn btn-primary">Add
                    New</a>
            </div>

            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data_table" class="table table-striped table-bordered" style="width: 100%">
                            <thead class="bg-primary text-light">
                                {!! $headData = '
                                <tr>
                                    <th>SL</th>
                                    <th>Rider Name</th>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Number of Seats</th>
                                    <th>Number of Passengers</th>
                                    <th>Specification</th>
                                    <th>Photo</th>
                                    <th class="no-sort" width="60px">Action</th>
                                </tr>
                                ' !!}
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                {!! $headData !!}
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content-->
    </div>
    @can('vehicle-add')
        @include('dashboard.vehicle.create')
    @endcan
    @push('custom_scripts')
        @include('dashboard.layout.includes.data_table_js')
        <script>
            $(function() {
                $('#data_table').DataTable({
                    processing: true,
                    serverSide: true,
                    deferRender: true,
                    ordering: true,
                    responsive: true,
                    scrollY: 400,
                    ajax: "{{ route('admin.vehicle.index') }}",
                    columns: [
                        // {
                        //     data: 'check',
                        //     name: 'check',
                        //     orderable: false,
                        //     searchable: false
                        // },
                        {
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            searchable: false,
                            orderable: false,
                        },
                        {
                            data: 'rider_name',
                            name: 'rider_name'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'brand',
                            name: 'brand'
                        },
                        {
                            data: 'model',
                            name: 'model'
                        },
                        {
                            data: 'num_of_seat',
                            name: 'num_of_seat'
                        },
                        {
                            data: 'num_of_passenger',
                            name: 'num_of_passenger'
                        },
                        {
                            data: 'specification',
                            name: 'specification'
                        },
                        {
                            data: 'image',
                            name: 'image'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],
                    scroller: {
                        loadingIndicator: true
                    }
                });
            });
        </script>

    @endpush
@endsection
