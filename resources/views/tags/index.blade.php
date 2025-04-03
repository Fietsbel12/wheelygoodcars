@extends('layouts.crud')

@section('title', 'Tag Statistieken')
@section('header', 'Tag Gebruik')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Tag</th>
                <th>Gebruikt bij niet-verkochte auto's</th>
                <th>Gebruikt bij verkochte auto's</th>
                <th>Totaal gebruikt</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->not_sold_count }}</td>
                    <td>{{ $tag->sold_count }}</td>
                    <td>{{ $tag->not_sold_count + $tag->sold_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
