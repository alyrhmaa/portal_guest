@extends('layouts.guest.main')

@section('content')
<div class="container text-center py-5">
    <h2>Selamat Datang di Profil Anda 🎉</h2>
    @if(Session::has('user'))
        <p>Halo, <strong>{{ Session::get('user')->name }}</strong>!</p>
    @endif
    <a href="{{ route('logout') }}" class="btn btn-danger mt-3">Logout</a>
</div>
@endsection
