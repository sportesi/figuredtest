@extends('layouts.app')

@section('content')
<div class="container">
    <login-form-component route="{{ route('login') }}" errors="{{ json_encode($errors->all()) }}" passreset="{{ route('password.request') }}">
        <template v-slot:csrf>
            @csrf
        </template>
    </login-form-component>

</div>
@endsection
