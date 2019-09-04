@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Latest Posts</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($posts as $post)
                        <div class="card">
                            <div class="card-header">
                                <div class="float-left">
                                    <b>{{ $post->title }}</b>
                                </div>
                                <div class="float-right">
                                    {{ $post->created_at->format('Y-m-d H:i') }}
                                </div>
                            </div>
                            <div class="card-body">
                                {!! $post->getBody() !!}
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>

                <div class="card-footer">
                    <div class="row justify-content-md-center">
                        <div class="col- col-md-6">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
