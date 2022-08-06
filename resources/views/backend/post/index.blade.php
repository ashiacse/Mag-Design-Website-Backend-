
@extends('backend.layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Products List</h1>
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
                            <a href="{{route('post.create')}}" class="btn btn-success mb-2"><i
                                    class="mdi mdi-format-list-bulleted me-1"></i>Add Product</a>
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
                                            <th class="all">Title</th>
                                            <th class="all">Category</th>
                                            <th class="all">Sub-category</th>
                                            <th class="all">Image</th>
                                            <th class="all">Date</th>

                                            <th style="width: 85px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php
                                            $serial = 1;
                                        @endphp
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>
                                                    {{ $serial++ }}
                                                </td>
                                                <td>
                                                    {{ $post->title }}

                                                </td>
                                                <td>
                                                    {{ $post->category_id }}
                                                </td>
                                                <td>
                                                    {{ $post->sub_category_id }}
                                                </td>

                                                <td>
                                                    <img src="{{asset('storage/photos/'.$post->image)}}" style="height: 50px; width: 80px;">
                                              </td>

                                                <td>
                                                    {{-- {{ $post->created_at->toFormattedDateString() }} --}}
                                                    {{-- {{ \Carbon\Carbon::now()->toDateString() }} --}}

                                                    {{-- {{ \Carbon\Carbon::parse($post->created_at)->format('d.m.Y') }} --}}

                                                    {{-- default date --}}
                                                    {{-- {{ \Carbon\Carbon::parse($post->created_at)->format('j F, Y') }} --}}

                                                    {{-- user date --}}
                                                    {{ \Carbon\Carbon::parse($post->date)->format('j F, Y') }}

                                                </td>


                                                <td  style="width: 20%;">

                                                    <a href="{{route('post.edit',$post->id)}}"
                                                        class="btn  btn-info  me-2" ><i
                                                            class="mdi mdi-square-edit-outline"></i> Edit </a>

                                                    <form action="{{route('post.destroy',$post->id)}}"
                                                        method="POST" style="display: inline-flex">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick=" return confirm('Are you  sure to delete?')"
                                                            class="btn btn-danger mx-3"> <i class="mdi mdi-delete"></i>Delete</button>
                                                    </form>
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
