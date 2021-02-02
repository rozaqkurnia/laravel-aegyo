@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(isset($articles))
                @foreach($articles as $key => $value)
                    <div class="card mb-3">

                        <div class="card-body">
                            <a href="/" class="post-cat">{{ $value->category->name }}</a>
                            <h3>{{ $value->title }}</h3>
                            <div class="post-excerpt">
                                {{ $value->content }}
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                {{ __('No Articles Available') }}
            @endif
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>
@endsection
