@extends('layouts.layout')

@section('style')
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" /> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
        rel="stylesheet" />
@endsection

@section('title')
    Add Book | {{ config('app.name') }}
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
                                    href="{{ route('book.index') }}" style="color:white;">
                                    Go back </a>
                            </button>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
            @includeIf('layouts.error_template')
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- Horizontal Form -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Add Book</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" action="{{ route('book.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Book Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="book_title"
                                                value="{{ old('book_title') }}" placeholder="Book Title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Author ID</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="author_id"
                                                value="{{ old('author_id') }}" placeholder="Author ID">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Publisher ID</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="publisher_id"
                                                value="{{ old('publisher_id') }}" placeholder="Publisher ID">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Book Edition</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="book_edition"
                                                value="{{ old('book_edition') }}" placeholder="Book Edition">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Book Cover</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="image"
                                                value="{{ old('image') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">ISBN Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="isbn_number"
                                                value="{{ old('isbn_number') }}" placeholder="ISBN Number">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Year of Publish</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="published_date" id="datepicker"
                                                value="{{ old('published_date') }}" />
                                            {{-- value="{{ old('published_date') }}"> --}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Published Country</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="published_country"
                                                value="{{ old('published_country') }}" placeholder="Published Country">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Add</button>
                                    <button type="reset" class="btn btn-default float-right">Cancel</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });

    </script>
@endsection
@endsection
