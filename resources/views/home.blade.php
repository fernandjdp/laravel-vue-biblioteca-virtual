@extends('layouts.app')

@section('content')
<nav-lateral></nav-lateral>
<div class="container-fluid mt-5">
    <router-view></router-view>
</div>
@endsection
