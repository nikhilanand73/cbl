@extends('layouts.vertical', ['title' => 'Form Wizard'])

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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Wizard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">EDIT POST</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->
        
        <section style="padding-top:60px">
        <div class="container">
        <div class="row">
        <div class="col-md-6 offset-md-3">
        <div class="card">
        <div class="card-header">Edit post</div>
        <div class="card-body">
        <!-- @if(Session::has('post_updated')) -->
        <div class="alert alert-success" role="alert">
        <!-- {{Session::get('post_updated')}} -->
        </div>
        <!-- @endif -->
        <form action="{{route('post.update')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$post->id}}"/>
        <div class="form-group">
        <label for="title">Post title</label>
        <input type="text" name="title" class="form-control" placeholder="Enter post title" value="{{$post->title}}"/>
        </div>
        <div class="form-group">
        <label for="body">Post description</label>
        <textarea name="body" class="form-control" rows="3">{{$post->body}}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update post</button>
        </form>
        </div>
        </div>
        </div>

        </div>
        </div>
        </section>
    </div> <!-- container -->
@endsection

@section('script')
    <!-- Plugins js-->
    <script src="{{asset('assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.js')}}"></script>

    <!-- Page js-->
    <script src="{{asset('assets/js/pages/form-wizard.init.js')}}"></script>
@endsection