{{-- <body class="hold-transition sidebar-mini"> --}}
@extends('layouts.layout')

@section('title')
    Stocks | {{ config('app.name') }}
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Stocks</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <button type="button" class="btn btn-block btn-success btn-sm"> <a href="/create-stock"
                                    style="color:white;">
                                    Add New </a>
                            </button>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            @if ($stocks->count() > 0)
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Stock Info</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th style="width: 20%">
                                        Book ID
                                    </th>
                                    <th style="width: 20%">
                                        Quantity
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th style="width: 20%">
                                        Stock Date
                                    </th>
                                    <th style="width: 20%">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stocks as $stock)
                                    <tr>
                                        <td>
                                            {{ $stock->id }}
                                        </td>
                                        <td>
                                            {{ $stock->book_id }}
                                        </td>
                                        <td>
                                            {{ $stock->quantity }}
                                        </td>
                                        <td>
                                            {{ $stock->price }}
                                        </td>
                                        <td>
                                            {{ date('d-M-Y', strtotime($stock->stock_date)) }}
                                        </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-info btn-sm" href="/edit-stock/{{ $stock->id }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="/delete-stock/{{ $stock->id }}">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    {{ $stocks->links() }}
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
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
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

        </section>
        <!-- /.content -->
    </div>
@endsection
