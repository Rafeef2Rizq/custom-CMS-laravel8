@extends('layouts.auth')
@section('content')
@section('styles')
<script src="https://kit.fontawesome.com/8e6b99adf7.js" crossorigin="anonymous"></script>
@endsection
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Posts </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">All posts</li>
          </ol>
        </nav>
      </div>
      <div class="row">

 <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">

            <div class="card-body">
                @if (count($post) >0 )
              <h4 class="card-title">Posts</h4>

              </p>

           <table class="table table-striped">
            <thead>
              <tr>
                <th> Image </th>
                <th> Title </th>
                <th> Description </th>
                <th> Category </th>
                <th> Status </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($post as $list )
                <tr>
                    <td class="py-1">
                      <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
                    </td>
                    <td> {{$list->title}}</td>
                    <td>
                        {{Str::limit($list->description,20)}}
                    </td>
                    <td>
                      {{$list->category->name}}
                  </td>
                    <td> {{$list->is_publish == 1 ?'Published':'Drafe'}}</td>
                    <td>
                    <a href="{{route('posts.show',$list->id)}}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                    <a href="" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                    <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>

                    </td>
                  </tr>
                @endforeach


            </tbody>
          </table>
          @else
          <h3 class="text-center text-danger">No posts found</h3>
           @endif
            </div>
          </div>
        </div>



      </div>
    </div>

@endsection
