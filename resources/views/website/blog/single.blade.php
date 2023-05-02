@extends('layouts.website')
@section('content')

<section class="page-title bg-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block">
            <h1>Blog</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="page-wrapper">
      <div class="container">
          <div class="row">
              <div class="col-md-12 ">
                  <div class="post post-single">
                      <h2 class="post-title">{{$post ? $post->title : ''}}</h2>
                      <div class="post-meta">
                          <ul>
                            <li>
                              <i class="ion-calendar"></i> {{date('d M Y',strtotime($post->created_at))}}
                            </li>

                            <li>
                              <a href=""> {{ucfirst($post->category->name)}}</a>
                            </li>

                          </ul>
                        </div>
                      <div class="post-thumb">
                          <img class="img-responsive" src="{{$post->gallary->image_url}}" alt="">
                      </div>
                      <div class="post-content post-excerpt">
                          <p><b>Description:</b> {!! $post->description !!}</p>
                      </div>




                  </div>

              </div>
          </div>
      </div>
  </section>



@endsection
