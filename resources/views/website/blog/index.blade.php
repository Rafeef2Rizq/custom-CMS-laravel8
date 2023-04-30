@extends('layouts.website')


@section('content')
<section class="page-title bg-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block">
            <h1>Blog</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, quibusdam.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="page-wrapper">
      <div class="container">
          <div class="row">
              <div class="col-md-8">
        @foreach ($posts as $post)
        <div class="post">
            <div class="post-media post-thumb">
                <a href="{{route('website.posts.show',$post->id)}}">
                    <img src="{{$post->gallary->image_url}}" style="width:100%; height:350px" alt="">
                </a>
            </div>
            <h3 class="post-title"><a href="blog-single.html">{{$post->title}}</a></h3>
            <div class="post-meta">
                <ul>
                    <li>
                    <i class="ion-calendar"></i> {{date('d M Y',strtotime($post->created_at))}}
                    {{-- comment format time with nice way --}}
                    </li>

                    <li>
                    <a href=""> {{ucfirst($post->category->name)}}</a></a>
                    </li>

                </ul>
            </div>
            <div class="post-content">
                <p>{!! $post->description !!} </p>
                <a href="{{route('website.posts.show',$post->id)}}" class="btn btn-main">Continue Reading</a>
            </div>

   </div>
        @endforeach

  {{-- <div class="text-center">
      <ul class="pagination post-pagination">
          <li><a href="#">Prev</a>
          </li>
          <li class="active"><a href="#">1</a>
          </li>
          <li><a href="#">2</a>
          </li>
          <li><a href="#">3</a>
          </li>
          <li><a href="#">4</a>
          </li>
          <li><a href="#">5</a>
          </li>
          <li><a href="#">Next</a>
          </li>
      </ul>
  </div> --}}
  {{$posts->links()}}
                </div>
                <div class="col-md-4">
                  <aside class="sidebar">
      <!-- Widget Latest Posts -->
      <div class="widget widget-latest-post">
          <h4 class="widget-title">Latest Posts</h4>
        @if (count($latestPost)>0)
        @foreach ($latestPost as $latest )
        <div class="media">
          <a class="pull-left" href="{{route('website.posts.show',$post->id)}}">
              <img class="media-object" src="{{$latest->gallary->image_url}}"style="width:50px"" alt="Image">
          </a>
          <div class="media-body">
              <h4 class="media-heading"><a href="{{route('website.posts.show',$post->id)}}">{{$latest->title}}</a></h4>
              <p>{!! Str::limit($latest->description ,25)!!}</p>
          </div>
      </div>
        @endforeach

        @else
        <h4 class="text-center text-danger">No posts added yet</h4>
        @endif


      </div>
      <!-- End Latest Posts -->

      <!-- Widget Category -->
      <div class="widget widget-category">
          <h4 class="widget-title">Categories</h4>

          <ul class="widget-category-list">
         @if (count($categories) >0)
         @foreach ($categories as $category )
         <li><a href="#">{{ucfirst($category->name)}}</a>
         </li>
         @endforeach
         @else
         <h6 class="text-center text-danger">No posts added yet</h6>

         @endif
          </ul>

      </div> <!-- End category  -->









  </aside>
                </div>
          </div>
      </div>
  </div>

@endsection
