@extends('public.layouts.main')

@section('title', 'Ekstrakurikuler')

@section('content')

<h2 class="fw-bold mb-4">Ekstrakurikuler</h2>

<div class="row g-4">
    @foreach($extras as $extra)
    <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0">
            <img src="{{ $extra->image ? asset('storage/'.$extra->image) : asset('images/no-image.png') }}"
                 class="card-img-top" style="height:200px; object-fit:cover;">

            <div class="card-body">
                <h5 class="card-title">{{ $extra->name }}</h5>
                <p class="text-muted small">
                    {{ Str::limit($extra->description, 100) }}
                </p>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection