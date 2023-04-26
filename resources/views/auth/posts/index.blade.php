@extends('layouts.auth')
@section('content')
@section('styles')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
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
        @if (session()->has('status'))
        <div class="alert alert-success">
            {{ session()->get('status') }}
        </div>
    @endif
 <div class="col-lg-12 grid-margin stretch-card">

          <div class="card">

            <div class="card-body">
                @if (count($post) >0 )
              <h4 class="card-title">Posts</h4>

              </p>
              <table id="example" class="table table-striped table-bordered" >

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
                      <img src="{{$list->gallary->image_url}}" style="width:60px"alt="image" />
                    </td>
                    <td> {{$list->title}}</td>
                    <td>
                        {{Str::limit($list->description,20)}}
                    </td>
                    <td>
                      {{$list->category->name}}
                  </td>
                    <td> {{$list->is_publish == 1 ?'Published':'Drafe'}}</td>
                    {{-- complete it later --}}
                    <td>
                    <a href="{{route('posts.show',$list->id)}}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                    <a href="" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                 <form action="{{route('posts.destroy',$list->id)}} " method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn  btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                 </form>

                    </td>
                  </tr>
                @endforeach

                {{-- {{ $post->links() }} --}}
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
@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function () {
    $('#example').DataTable();
});
</script>
@endsection
