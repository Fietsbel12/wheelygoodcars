@extends('layouts.crud')

@section('title', 'Overzicht van alle auto’s')
@section('header', 'Aangeboden auto’s')

@section('content')
    @livewire('car-search')
@endsection

@section('styles')
<style>
    .card {
        display: flex;
        flex-direction: column;
        height: 100%;
        animation: fadeIn 0.8s ease-out;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-img-top {
        object-fit: cover;
        height: 300px;
        width: 100%;
        border-radius: 8px 8px 0 0;
        margin-bottom: 15px;
        object-position: center;
    }

    .card-body {
        flex-grow: 1;
        padding: 20px;
    }

    .btn {
        font-size: 0.875rem;
        padding: 5px 10px;
    }

    .d-flex {
        display: flex;
        gap: 10px;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 768px) {
        .card-img-top {
            height: 180px;
        }
    }
</style>
@endsection
