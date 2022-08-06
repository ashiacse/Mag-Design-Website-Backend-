
@extends('backend.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Product</h1>
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
                                    <a href="{{ route('sub_category.index') }}" class="btn btn-success mb-2"><i
                                            class="mdi mdi-format-list-bulleted me-1"></i> Sub-Category List</a>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-md-12">

                                    <form action="{{ route('sub_category.update',$sub_category->id) }}" method="POST"
                                        enctype="multipart/form-data" class="form-horizontal" role="form">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="sub_category_name" class="form-label">Category Name</label>
                                        <select class="form-control" name="category_id">
                                            @foreach ($categories as $category )
                                            <option value="">Category name</option>
                                            <option value="{{$category->id}}" @if($category->id == $sub_category->category_id)  selected @endif>{{$category->name}}</option>
                                            @endforeach

                                        </select>

                                            @error('category_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        {{-- sub_category_name start --}}
                                        <div class="mb-3">
                                            <label for="sub_category_name" class="form-label">Sub-Category Name</label>
                                            <input type="text" name="sub_category_name" value="{{ $sub_category->sub_category_name }}"
                                                class="form-control @error('sub_category_name') is-invalid @enderror" id="sub_category_name">

                                            @error('sub_category_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>


                                        {{-- sub_category_name end --}}

                                        {{-- desciption-area start --}}
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                                                cols="30" rows="10">{{$sub_category->description }}</textarea>

                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        {{-- image start --}}
                                        <div class="mb-3">
                                            <label for="sub_category_image" class="form-label">Image</label>
                                            <input type="file" name="image"
                                                class="form-control @error('image') is-invalid @enderror" id="sub_category_image"
                                                value="{{ $sub_category->image }}">

                                            <div class="text-danger">
                                                <img src="{{ asset('storage/photos/' . $sub_category->image) }}" width="100px"
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
