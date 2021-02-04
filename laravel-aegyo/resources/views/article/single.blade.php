@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="show-post">
                        <h2 class="show-post-title">{{ $article->title }}</h2>
                        <p class="show-post-meta">{{ $article->category->name }}</p>
                        <p>{{ $article->description }}</p>
                        <hr>
                        <p>{{ $article->content }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>
@endsection
