@extends('layouts.frontend')

@section('title')
    KODEIN | Sekolah Developer Indonesia
@endsection

@section('content')
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <img class="masthead-avatar mb-5" src="{{ asset('assets/img/avataaars.svg') }}" alt="..." />
        <h1 class="masthead-heading text-uppercase mb-0">Freelancer</h1>
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <p class="masthead-subheading font-weight-light mb-0">Designer - UI/UX - Web and Mobile</p>
    </div>
</header>
    @section('css')
        <style>
            .page-section {
                margin-top: 2rem;
            }
        </style>
    @endsection
@endsection