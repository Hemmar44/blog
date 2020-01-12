@extends ('layouts.app')

@section ('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update post') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/posts/{{$post->post_id}}">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}*</label>

                                <div class="col-md-6">
                                    <input
                                            id="title"
                                            type="text"
                                            class="form-control
                                            @error('title')
                                            is-invalid
                                            @enderror"
                                            name="title"
                                            value="{{ $post->title }}"
                                            required
                                            autocomplete="title"
                                            autofocus
                                    >
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subtitle" class="col-md-4 col-form-label text-md-right">{{ __('Subtitle') }}</label>

                                <div class="col-md-6">
                                    <input
                                            id="subtitle"
                                            type="text"
                                            class="form-control
                                        @error('subtitle')
                                        is-invalid
                                        @enderror"
                                            name="subtitle"
                                            value="{{ $post->subtitle }}"
                                            autocomplete="subtitle"
                                            autofocus>
                                    @error('subtitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="body" class="col-md-4 col-form-label text-md-right">{{ __('Body') }}*</label>

                                <div class="col-md-6">
                                    <textarea
                                            id="body"
                                            class="form-control @error('body')
                                            is-invalid @enderror"
                                            name="body"
                                            required
                                            autocomplete="body"
                                            rows="10"
                                    >
                                        {{$post->body}}
                                    </textarea>

                                    @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="picture_url" class="col-md-4 col-form-label text-md-right">{{ __('Picture') }}</label>

                                <div class="col-md-6">
                                    <input
                                            id="picture_url"
                                            type="text"
                                            class="form-control
                                        @error('picture_url')
                                        is-invalid
                                        @enderror"
                                            name="picture_url"
                                            value="{{ $post->picture_url }}"
                                            autocomplete="picture_url"
                                            autofocus
                                    >
                                    @error('picture_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <input
                                            id="description"
                                            type="text"
                                            class="form-control
                                        @error('description')
                                        is-invalid
                                        @enderror"
                                            name="description"
                                            value="{{ $post->picture_description }}"
                                            autocomplete="description"
                                            autofocus
                                    >
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                    <delete-button-component :post="{{$post}}"></delete-button-component>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
