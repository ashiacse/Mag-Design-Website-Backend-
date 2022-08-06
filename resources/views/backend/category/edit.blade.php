
@extends('backend.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Post</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v2</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <a href="{{ route('category.index') }}" class="btn btn-success mb-2"><i
                                            class="mdi mdi-format-list-bulleted me-1"></i> Product List</a>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-md-12">

                                    <form action="{{ route('category.update',$category->id) }}" method="POST"
                                        enctype="multipart/form-data" class="form-horizontal" role="form">
                                        @csrf

                                        {{-- title-area start --}}
                                        <div class="mb-3">
                                            <label for="post_title" class="form-label">Category Name</label>
                                            <input type="text" name="name" value="{{ $category->name }}"
                                                class="form-control @error('category') is-invalid @enderror" id="post_title">

                                            @error('category')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>


                                        {{-- title-area end --}}

                                        {{-- desciption-area start --}}
                                        <div class="mb-3">
                                            <label for="post_description" class="form-label">Description</label>
                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="post_description"
                                                cols="30" rows="10">{{ $category->description }}</textarea>

                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        {{-- image start --}}
                                        <div class="mb-3">
                                            <label for="post_image" class="form-label">Image</label>
                                            <input type="file" name="image"
                                                class="form-control @error('image') is-invalid @enderror" id="post_image"
                                                value="{{ $category->image }}">

                                            <div class="text-danger">
                                                <img src="{{ asset('storage/photos/' . $category->image) }}" width="100px"
                                                    height="50px">
                                            </div>
                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                        {{-- image end --}}


                                        <button type="submit" class="btn btn-success">Update</button>
                                    </form>

                                </div><!-- end col -->
                            </div>
                            <!-- end row -->

                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->
@endsection
