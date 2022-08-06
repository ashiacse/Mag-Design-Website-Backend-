@extends('backend.layouts.app')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New Post</h1>
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
                            <a href="{{route('post.index')}}" class="btn btn-success mb-2"><i
                                    class="mdi mdi-format-list-bulleted me-1"></i> Products List</a>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-md-12">

                            <form action="{{ route('post.store') }}" method="POST"
                                enctype="multipart/form-data" class="form-horizontal" role="form">
                                @csrf
                                {{-- title-area start --}}
                                <div class="mb-3">
                                    <label for="post_title" class="form-label">Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        id="post_title">

                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label for="post_meta_title" class="form-label">Meta Title</label>
                                    <input type="text" name="meta_title"
                                        class="form-control @error('meta_title') is-invalid @enderror"
                                        id="post-meta-title">

                                    @error('meta_title')
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
                                        cols="30" rows="10"></textarea>

                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label for="post_meta_description" class="form-label">Meta
                                        Description</label>
                                    <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror"
                                        id="post_meta_description" cols="30" rows="10"></textarea>
                                    @error('meta_description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- desciption-area end --}}

                                {{-- category start --}}
                                <div class="mb-3">
                                    <label for="post_category" class="form-label">Category</label>
                                    <select class="form-control" name="category_id">
                                        <option value="">Category name</option>
                                        @foreach ($categories as $category )
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach

                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                 {{-- category end --}}

                                 {{-- sub_category start --}}
                                <div class="mb-3">
                                    <label for="sub_category" class="form-label">Sub-Category</label>
                                    <select class="form-control" name="sub_category_id">
                                        <option value="">Sub Category name</option>
                                        @foreach ($subcategories as $subcategory )
                                        <option value="{{$subcategory->id}}">{{$subcategory->sub_category_name}}</option>
                                        @endforeach
                                    </select>

                                    @error('sub_category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                {{-- sub_category end --}}

                                {{-- date start --}}
                                <div class="mb-3">
                                    <label for="post_date" class="form-label">Date</label>
                                    <input type="date" name="date"
                                        class="form-control @error('date') is-invalid @enderror"
                                        id="post_date">

                                    @error('date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                {{-- date end --}}

                                {{-- image start --}}
                                <div class="mb-3">
                                    <label for="post_image" class="form-label">Image</label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror"
                                        id="post_image">

                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                {{-- image end --}}


                                <button type="submit" class="btn btn-success" >Add
                                    Post</button>

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
