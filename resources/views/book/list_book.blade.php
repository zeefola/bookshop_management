{{-- <body class="hold-transition sidebar-mini"> --}}
@extends('layouts.layout')

@section('title')
    Books | {{ config('app.name') }}
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Books</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <button type="button" class="btn btn-block btn-success btn-sm"> <a
                                    href="{{ route('book.create') }}" style="color:white;">
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
            @if ($books->count() > 0)
                <!-- Default box -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Books Information</h3>
                                    <form method="POST" action="{{ route('books.export') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-block btn-success"
                                            style="max-width:150px; float:right; display:inline-block;">
                                            <i class="fas fa-file-download"></i>
                                            </i>Download Excel</button>
                                    </form>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="books" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Book Title
                                                </th>
                                                <th>
                                                    Author ID
                                                </th>
                                                <th>
                                                    Publisher ID
                                                </th>
                                                <th>
                                                    Book Edition
                                                </th>
                                                <th>
                                                    Book Cover
                                                </th>
                                                <th>
                                                    ISBN Number
                                                </th>
                                                <th>
                                                    Year of Publish
                                                </th>
                                                <th>
                                                    Published Country
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($books as $book)
                                                <tr>
                                                    <td>
                                                        {{ $book->id }}
                                                    </td>
                                                    <td>
                                                        {{ $book->book_title }}
                                                    </td>
                                                    <td>
                                                        {{ $book->author_id }}
                                                    </td>
                                                    <td>
                                                        {{ $book->publisher_id }}
                                                    </td>
                                                    <td>
                                                        {{ $book->book_edition }}
                                                    </td>
                                                    <td>
                                                        <img src="{{ $book->getFirstMediaUrl('images') }}" />
                                                    </td>
                                                    <td>
                                                        {{ $book->isbn_number }}
                                                    </td>
                                                    <td>
                                                        {{ $book->published_date }}
                                                    </td>
                                                    <td>
                                                        {{ $book->published_country }}
                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('book.edit', $book->id) }}">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <form style="display: inline-block;" method="POST"
                                                            action="{{ route('book.destroy', $book->id) }}">
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
                                {{ $books->links() }}
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
