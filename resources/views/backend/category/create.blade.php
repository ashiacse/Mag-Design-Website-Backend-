@extends('backend.layouts.app')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <a href="{{route('category.index')}}" class="btn btn-success mb-2"><i
                                    class="mdi mdi-format-list-bulleted me-1"></i> Category List</a>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-md-12">

                            <form action="{{ route('category.store') }}" method="POST"
                                enctype="multipart/form-data" class="form-horizontal" role="form">
                                @csrf
                                {{-- name-area start --}}
                                <div class="mb-3">
                                    <label for="category_name" class="form-label">Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        id="category_name">

                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                {{-- name-area end --}}

                                {{-- desciption-area start --}}
                                <div class="mb-3">
                                    <label for="post_description" class="form-label">Description</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="post_description"
                                        cols="30" rows="10"></textarea>

                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                {{-- image start --}}
                                <div class="mb-3">
                                    <label for="category_image" class="form-label">Image</label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror"
                                        id="category_image">

                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                {{-- image end --}}


                                <button type="submit" class="btn btn-success" >Add
                                    Category</button>

                                    {{-- <button type="submit" class="btn btn-success" ><a href="{{route('post.index')}}" class="btn btn-success text-decoration-none">Add
                                        Post</a></button> --}}
                            </form>

                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                </div>
            </div>
        </div>

    </div>
    </div>

@endsection
