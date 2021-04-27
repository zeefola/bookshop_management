{{-- <body class="hold-transition sidebar-mini"> --}}
@extends('layouts.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Suppliers</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <button type="button" class="btn btn-block btn-success btn-sm"> <a href="/create-supplier"
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
            @if ($suppliers->count() > 0)
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Supplier Info</h3>

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
                                    <th style="width: 10%">
                                        First Name
                                    </th>
                                    <th style="width: 10%">
                                        Last Name
                                    </th>
                                    <th style="width: 15%">
                                        Book ID
                                    </th>
                                    <th style="width: 15%">
                                        Phone Number
                                    </th>
                                    <th style="width: 20%">
                                        Address
                                    </th>
                                    <th style="width: 10%">
                                        Email
                                    </th>
                                    <th style="width: 20%">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $supplier)
                                    <tr>
                                        <td>
                                            {{ $supplier->id }}
                                        </td>
                                        <td>
                                            {{ $supplier->first_name }}
                                        </td>
                                        <td>
                                            {{ $supplier->last_name }}
                                        </td>
                                        <td>
                                            {{ $supplier->book_id }}
                                        </td>
                                        <td>
                                            {{ $supplier->phone_number }}
                                        </td>
                                        <td>
                                            {{ $supplier->address }}
                                        </td>
                                        <td>
                                            {{ $supplier->email }}
                                        </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-info btn-sm" href="/edit-supplier/{{ $supplier->id }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="/delete-supplier/{{ $supplier->id }}">
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
                    {{ $suppliers->links() }}
                    <!-- /.card-body -->
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
