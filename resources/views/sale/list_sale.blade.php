{{-- <body class="hold-transition sidebar-mini"> --}}
@extends('layouts.layout')

@section('title')
    Sales | {{ config('app.name') }}
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sales</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <button type="button" class="btn btn-block btn-success btn-sm"> <a
                                    href="{{ route('sale.create') }}" style="color:white;">
                                    Add New </a>
                            </button>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
            @includeIf('layouts.error_template')
        </section>

        <!-- Main content -->
        <section class="content">
            @if ($sales->count() > 0)
                <!-- Default box -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Sales Information</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="sales" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Book ID
                                                </th>
                                                <th>
                                                    Customer ID
                                                </th>
                                                <th>
                                                    Employee ID
                                                </th>
                                                <th>
                                                    Quantity
                                                </th>
                                                <th>
                                                    Price
                                                </th>
                                                <th>
                                                    Sale Date
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sales as $sale)
                                                <tr>
                                                    <td>
                                                        {{ $sale->id }}
                                                    </td>
                                                    <td>
                                                        {{ $sale->book_id }}
                                                    </td>
                                                    <td>
                                                        {{ $sale->customer_id }}
                                                    </td>
                                                    <td>
                                                        {{ $sale->employee_id }}
                                                    </td>
                                                    <td>
                                                        {{ $sale->quantity }}
                                                    </td>
                                                    <td>
                                                        {{ $sale->price }}
                                                    </td>
                                                    <td>
                                                        {{ date('d-M-Y', strtotime($sale->sales_date)) }}
                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('sale.edit', $sale->id) }}">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <form style="display: inline-block;" method="POST"
                                                            action="{{ route('sale.destroy', $sale->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                style="margin-top: 5px;">
                                                                <i class="fas fa-trash">
                                                                </i>Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                {{ $sales->links() }}
                            </div>
                            <!-- /.card -->

                        @else
                            <div class="container-fluid">
                                <div class="row">
                                    <!-- /.col -->
                                    <div class="col-md-12">
                                        <div class="card card-success">
                                            <div class="card-header">
                                                <h3 class="card-title">Empty Record</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                                <!-- /.card-tools -->
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                There's no data to show, create to see the list
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
            @endif
    </div>
    <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

    </section>
    <!-- /.content -->
    </div>
@endsection
