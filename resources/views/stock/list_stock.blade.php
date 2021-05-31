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
                            <button type="button" class="btn btn-block btn-success btn-sm"> <a
                                    href="{{ route('stock.create') }}" style="color:white;">
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
            @if ($stocks->count() > 0)
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Book Stock Information</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="stocks" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Book ID
                                                </th>
                                                <th>
                                                    Quantity
                                                </th>
                                                <th>
                                                    Price
                                                </th>
                                                <th>
                                                    Stock Date
                                                </th>
                                                <th>
                                                    Action
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
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('stock.edit', $stock->id) }}">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <form style="display: inline-block;" method="POST"
                                                            action="{{ route('stock.destroy', $stock->id) }}">
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
                                {{-- {{ $stocks->links() }} --}}
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
