@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <card-component title="Latest Posts">
                <alert-component>{{ session('status') }}</alert-component>

                <post-component v-for="post in {{ $jPosts }}" v-bind:post="post"></post-component>

                <template v-slot:footer>
                    <div class="row justify-content-md-center">
                        <div class="col-md-6">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </template>
            </card-component>
        </div>
    </div>
</div>
@endsection
