{{-- <body class="hold-transition sidebar-mini"> --}}
@extends('layouts.layout')

@section('title')
    Employees | {{ config('app.name') }}
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Employees</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <button type="button" class="btn btn-block btn-success btn-sm"> <a
                                    href="{{ route('employee.create') }}" style="color:white;">
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
            @if ($employees->count() > 0)
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Employee Info</h3>

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
                                        Phone Number
                                    </th>
                                    <th style="width: 20%">
                                        Address
                                    </th>
                                    <th style="width: 10%">
                                        Email
                                    </th>
                                    <th style="width: 5%">
                                        Gender
                                    </th>
                                    <th style="width: 20%">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>
                                            {{ $employee->id }}
                                        </td>
                                        <td>
                                            {{ $employee->first_name }}
                                        </td>
                                        <td>
                                            {{ $employee->last_name }}
                                        </td>
                                        <td>
                                            {{ $employee->phone_number }}
                                        </td>
                                        <td>
                                            {{ $employee->address }}
                                        </td>
                                        <td>
                                            {{ $employee->email }}
                                        </td>
                                        <td>
                                            {{ $employee->gender }}
                                        </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('employee.edit', $employee->id) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <form style="display: inline-block;" method="POST"
                                                action="{{ route('employee.destroy', $employee->id) }}">
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
                    {{ $employees->links() }}
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
