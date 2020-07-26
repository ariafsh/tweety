@extends('layouts.masters.main')

@section('page-content')
    <div class="container">
        @include('layouts.partials.navbar')

        @foreach($posts as $post)
        <div class="row justify-content-center">
            <div class="col-md-8 pt-4">
                <div class="card">
                    <div class="card-header"><strong>Created By:</strong> {{ $post->user->name }}</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-8"><strong>Title:</strong> {{ $post->title }}</div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8"><strong>Text:</strong> {{ $post->text }}</div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-5"><small><strong>Posted at:</strong> {{ $post->created_at }}</small></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @if(Auth()->user())
            <div class="col-md-8 pt-3">
                <div class="card">
                    <div class="card-header"><strong>Answer This Tweet</strong></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('save.comment') }}">
                            @csrf
                            <input type="hidden" name="slug" value="{{ $post->slug }}">
                            <div class="form-group row">
                                <label for="text" class="col-md-4 col-form-label text-md-right">Text</label>

                                <div class="col-md-6">
                                    <textarea placeholder="Type Your Text" id="body" type="text" class="form-control" name="body"></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Send Answer
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            <div class="row col-md-8 pt-3"><h2>Answer</h2></div>

            @foreach($post->comments as $comment)

                <div class="col-md-8 pt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-8"><strong>Text:</strong> {{ $comment->body }}</div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8"><strong>Posted By:</strong> {{ $comment->user->name }}</div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-5"><small><strong>Posted at:</strong> {{ $comment->created_at }}</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


