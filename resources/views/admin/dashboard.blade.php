@extends('admin.layouts.main')

@section('title', 'Dashboard')

@section('content')
    <!-- Isi dashboard kamu di sini -->
    <h1 class="text-3xl font-bold">Selamat Datang, {{ auth()->user()->name }}</h1>
@endsection