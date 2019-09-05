@extends('layouts.app')

@section('content')
<div class="container">
    <register-form-component route="{{ route('register') }}" errors="{{ json_encode($errors->all()) }}">
        <template v-slot:csrf>
            @csrf
        </template>
    </register-form-component>
</div>
@endsection
