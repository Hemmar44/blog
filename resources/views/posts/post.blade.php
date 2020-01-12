@extends ('layouts.app')

@section ('content')
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            @if ($is_logged)
              <a href="/posts/{{$post->post_id}}/edit">
                <h1>{{$post->title}}</h1>
              </a>
            @else
              <h1>{{$post->title}}</h1>
            @endif
            <h2 class="subheading">{{$post->subtitle}}</h2>
            <span class="meta">Posted by
              <a href="/about">{{$post->user->name}}</a>
              Tutaj datę</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>{{$post->body}}</p>
        </div>
      </div>
    </div>
  </article>

  <hr>
@endsection