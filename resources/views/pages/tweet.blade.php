@extends('layouts.masters.main')

@section('page-content')
    <div class="container">
        @include('layouts.partials.navbar')

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Your Tweet</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('save.tweet') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" placeholder="Type Your Title" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-md-4 col-form-label text-md-right">Text</label>

                                <div class="col-md-6">
                                    <textarea placeholder="Type Your Text" id="text" type="text" class="form-control" name="text"></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Post Tweet
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
