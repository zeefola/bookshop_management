{{-- <body class="hold-transition sidebar-mini"> --}}
@extends('layouts.layout')

@section('title')
    Publishers | {{ config('app.name') }}
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Publishers</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <button type="button" class="btn btn-block btn-success btn-sm"> <a
                                    href="{{ route('publisher.create') }}" style="color:white;">
                                    Create </a>
                            </button>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
            @includeIf('layouts.error_template')
        </section>

        <section class="content">
            @if ($publishers->count() > 0)
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">publishers Information</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="publishers" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Publisher Name
                                                </th>
                                                <th>
                                                    Publisher Image
                                                </th>
                                                <th> Action
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($publishers as $publisher)
                                                <tr>
                                                    <td>
                                                        {{ $publisher->id }}
                                                    </td>
                                                    <td>
                                                        {{ $publisher->publisher_name }}
                                                    </td>
                                                    <td>
                                                        <img src="{{ $publisher->getFirstMediaUrl() }}" />
                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('publisher.edit', $publisher->id) }}">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <form style="display: inline-block;" method="POST"
                                                            action="{{ route('publisher.destroy', $publisher->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                style="margin-top: 5px;">
                                                                <i class="fas fa-trash">
                                                                </i>Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>

                                                </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
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
    </div>
@endsection
