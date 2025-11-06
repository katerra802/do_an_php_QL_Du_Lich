@extends('layouts.app')

@section('title', 'Home - Travel Thailand')

@section('content')
@include('homepage.components.hero')
@include('homepage.components.popular-posts')
@include('homepage.components.trending-destinations')
@include('homepage.components.why-choose-us')
@include('homepage.components.featured-tours')
@include('homepage.components.categories')
@include('homepage.components.stats')
@endsection