@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ $meta['page-title'] }}</h2>
            @if(isset($articles) && !$articles->isEmpty())
                @foreach($articles as $key => $value)
                    <div class="card mb-3">
                        <div class="card-body">
                            <a href="/category/{{ $value->category->id }}" class="post-cat">{{ $value->category->name }}</a>
                            <div class="post-title">
                                <a href="/article/{{ $value->id }}" class="post-title h2">{{ $value->title }}</a>
                            </div>
                            <div class="post-excerpt">
                                {{ $value->description }}
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>{{ __('No Articles Available') }}</p>
            @endif
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>
@endsection
