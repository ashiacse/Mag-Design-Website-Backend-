
@extends('backend.layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category List</h1>
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
                            <a href="{{route('category.create')}}" class="btn btn-success mb-2"><i
                                    class="mdi mdi-format-list-bulleted me-1"></i>Add Category</a>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-md-12">

                            <div class="table-responsive">
                                <table class="table table-centered w-100 dt-responsive nowrap table table-bordered table-sm " id="basic-datatable"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead class="table table-bordered table-sm">
                                        <tr class="text-center">
                                            <th class="all">SN</th>
                                            <th class="all">Category Name</th>
                                            <th class="all"> Category Slug</th>
                                            <th class="all">Description</th>
                                            <th class="all">Image</th>

                                            <th style="width: 85px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php
                                            $serial = 1;
                                        @endphp
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>
                                                    {{ $serial++ }}
                                                </td>
                                                <td>
                                                    {{ $category->name }}

                                                </td>
                                                <td>
                                                    {{ $category->slug }}

                                                </td>
                                                <td>
                                                    {{ $category->description }}
                                                </td>

                                                <td>
                                                    <img src="{{asset('storage/photos/'.$category->image)}}" style="height: 50px; width: 80px;">
                                              </td>

                                                <td  style="width: 20%;">

                                                    <a href="{{route('category.edit', $category->id)}}"
                                                        class="btn  btn-info  py-1 mx-2" ><i
                                                            class="mdi mdi-square-edit-outline"></i> Edit </a>

                                                           <a href="{{ route('category.destroy', $category->id) }}"
                                                    onclick=" return confirm('Are you  shure to delete?')"
                                                    class="btn btn-sm btn-danger
                                        icon-trash">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                </div>
            </div>
        </div>

    </div>
    </div>
</div>

@endsection
