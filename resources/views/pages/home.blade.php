@extends('layouts.masters.main')

@section('page-content')
    <div class="container">
        @include('layouts.partials.navbar')

        <div class="row justify-content-center">
            @foreach($posts as $post)
                <div class="col-md-8 pt-4">
                    <div class="card">
                        <div class="card-header">
                            <div><strong>Created By: </strong>{{ $post->user->name }}</div>

                            @if(Auth::user()->id == $post->user_id)
                            <div class="float-md-right">
                                <form action="{{ route("delete.tweet") }}" method="Post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $post->id }}"/>
                                    <button class="btn btn-dark" type="submit" name="delete">X</button>
                                </form>
                            </div>
                            @endif

                        </div>

                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-8"><strong>Title: </strong>{{ $post->title }}</div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8"><strong>Text: </strong>{{ $post->text }}</div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-5"><small><strong>Posted at:</strong> {{ $post->created_at }}</small></div>
                            </div>

                            <div>
                                @if($post->comments->count() > 0)
                                    <a class="float-md-right" href="/{{ $post->slug }}" style="color: black"><small><strong>{{ $post->comments->count() }} Comments</strong></small></a>
                                    @else
                                    <a class="float-md-right" href="/{{ $post->slug }}" style="color: black"><small><strong>No Comment Exist</strong></small></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

             <div class="col-md-8 pt-4">{!! $posts->appends(Request::all())->render() !!}</div>

        </div>
    </div>
@endsection


