@extends('layouts.app')

@section('content')
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Blog Hemmara</h1>
            <span class="subheading">Walka o lepszą sylwetkę</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @if (!empty($tag))
          <h2>
            <a href="/posts/tag/{{$tag->tag_id}}">{{$tag->name}}</a>
          </h2>
        @endif
        @foreach($posts as $post)
        <div class="post-preview">
            <h2 class="post-title">
              {{$post->title}}
            </h2>
            <h3 class="post-subtitle">
              {{$post->subtitle}}
            </h3>
          </a>
          <p class="post-meta">Tagi <br>
            @foreach($post->tags as $tag)
              <a href="/posts/tag/{{$tag->tag_id}}">{{$tag->name}}</a>
            @endforeach
          </p>
          <p class="post-meta">Posted by
            <a href="/contact">{{$post->user->name}}</a>
            on September 24, 2019</p>
        </div>
        <hr>
        @endforeach
        <!-- Pager -->
        <div class="clearfix">
          <div class="float-right">
            {{ $posts->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr>
@endsection
