@extends('layouts.app')

@section('title', 'Trang chủ - Du Lịch Việt Nam')

@section('content')
@include('homepage.components.hero')
@include('homepage.components.popular-posts')
@include('homepage.components.trending-destinations')
@include('homepage.components.featured-spots')
@include('homepage.components.promo-banner')
@include('homepage.components.featured-spots')
@include('homepage.components.customer-reviews')
@include('homepage.components.newsletter')
@endsection