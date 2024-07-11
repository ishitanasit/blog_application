@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/adminlte.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('assets/admin/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
 <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/admin/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">User</a>
        </div>
      </div>

<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('blog.show') }}" class="nav-link active">
                  <p>blog post</p>
                </a>
              </li>
            <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <i class="fa fa-check"></i>
            {{ Session::get('success') }}
        </div>
    @endif
    <!DOCTYPE html>
  <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog Post</title>
        <!-- Include CKEditor CDN -->
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-15">
                    <div class="container">
                        <h1>Edit Blog Post</h1>
                        <form action="{{ route('blog.update', ['id' => $blog->id]) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT') <!-- Use PUT method for update -->
                      
                          <div class="form-group">
                              <label for="title">Title</label>
                              <input type="text" name="title" id="title" class="form-control" value="{{ $blog->title }}" required>
                          </div>
                      
                          <div class="form-group">
                              <label for="content">Content</label>
                              <textarea name="content" id="content" class="form-control" rows="10" required>{{ $blog->content }}</textarea>
                          </div>
                      
                          <div class="form-group">
                              <label for="tags">Tags</label>
                              <input type="text" name="tags" id="tags" class="form-control" value="{{ $blog->tags }}">
                          </div>
                      
                          <div class="form-group">
                              <label for="image">Image</label>
                              <input type="file" name="image" id="image" class="form-control-file">
                              @if($blog->image)
                                  <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" width="100">
                              @endif
                          </div>
                          <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                  
<script>
        const imageInput = document.getElementById('image');
            imageInput.addEventListener('click', (event) => {
            const contentField = document.getElementById('content');
            const tagsField = document.getElementById('tags');
            const contentRect = contentField.getBoundingClientRect();
            const tagsRect = tagsField.getBoundingClientRect();
            const targetRect = contentRect.top < tagsRect.top ? contentRect : tagsRect;
            imageInput.style.top = (targetRect.top - imageInput.offsetHeight) + 'px';
            imageInput.style.left = targetRect.left + 'px';
            imageInput.style.position = 'absolute';
        });
</script>        
                    </div>
                </div>
            </div>
        </div>
        <script>
            CKEDITOR.replace('content');
        </script>
        </body>
    </html>
    
    <!-- /.content-header -->
    </div>
  </div>
</div>

<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 </strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
</footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/admin/js/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/admin/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>
</body>
</html>
<style>
  #image {
      position: absolute;
      pointer-events: auto; 
  }
</style>
@endauth
    @guest
        <p class="lead">
      @foreach($blogPosts as $post)
          <div class="card mb-3">
              <div class="card-body">
                  <h2 class="card-title">{{ $post->title }}</h2>
                  <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                  <p class="card-text"><small class="text-muted">Tags: {{ $post->tags }}</small></p>
                  @if($post->image)
                      <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                  @endif
                  <p class="card-text"><small class="text-muted">Posted by {{ $post->user->name }} on {{ $post->created_at->format('M d, Y') }}</small></p>
              </div>
          </div>
      @endforeach
        </p>
    @endguest
    </div>
@endsection
