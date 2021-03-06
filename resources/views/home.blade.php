@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <card-component title="Latest Posts">
                <alert-component type="success">{{ session('status') }}</alert-component>

                @foreach($posts as $post) 
                    <post-component :post="{{ json_encode($post) }}" :auth="{{ $isLoggedIn }}">
                        @if($isLoggedIn)
                            <template v-slot:csrf-edit> @csrf </template>
                            <template v-slot:csrf-delete> @csrf </template>
                        @endif
                    </post-component>
                @endforeach

                <template v-slot:footer>
                    <div class="row justify-content-md-center">
                        <div class="col-md-6">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </template>
            </card-component>
        </div>
        @auth
            <div class="col-md-3">
                <card-component title="Publisher Actions">
                    <btn-form-modal text="Create New Post" id="create-post" method="POST" action="{{ route('frontend_post_store') }}">
                        @csrf
                        <input-component name="title" type="text" required="true" description="Title"></input-component>
                        <txta-component name="body" required="true" description="Body"></txta-component>
                    </btn-form-modal>
                </card-component>
            </div>
        @endauth
    </div>
</div>
@endsection
