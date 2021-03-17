@extends('layouts.vertical', ['title' => 'Datatables'])

@section('css')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Datatables</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Data tables</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 
        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD POST</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <section style="padding-top:60px">
            <div class="container">
            <div class="row">
            <div class="col-md-6 offset-md-3">
            <div class="card">
            <div class="card-header">Add post</div>
            <div class="card-body">
            @if(Session::has('post_created'))
            <div class="alert alert-success" role="alert">
            {{Session::get('post_created')}}
            </div>
            @endif
            <form action="{{route('post.create')}}" method="POST">
            @csrf
            <div class="form-group">
            <label for="title">{{ __('labels.post.title') }}</label>
            <input type="text" name="title" class="form-control" placeholder="Enter post title">
            </div>
            <div class="form-group">
            <label for="body">Post description</label>
            <textarea name="body" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Add post</button>
            </form>
            </div>
            </div>
            </div>

            </div>
            </div>
            </section>
      </div>
      
    </div>
  </div>
</div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> Data Table</h4>
                        <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Post</button>
                        
                        </p>

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                        <th>ID</th>
                        <th>Post Title</th>
                        <th>Post Description </th>
                        <th>Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                        <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td><a href="" class="btn btn-info">Details</a>
                        <a href="{{route('edit-post',$post->id)}}" class="btn btn-success">Edit</a>
                        <a href="{{route('delete-post',$post->id)}}" class="btn btn-danger">Delete</a>
                        
                        
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                                                
                          
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
        
    </div> <!-- container -->
@endsection

@section('script')
    <!-- Plugins js-->
    <script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Page js-->
    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
@endsection