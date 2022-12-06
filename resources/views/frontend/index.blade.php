@extends('frontend.layouts.master')

@section('title')
Store Clothes For Men Pallas 
@endsection

@section('custom-css')
@endsection

@section('main-content')
<!-- Slider -->
@include('frontend.widgets.homepage-slider')
<!-- Banner -->
@include('frontend.widgets.homepage-banner', [$data = $ds_top3_newest_sanpham])
<!-- Product -->
@include('frontend.widgets.product-list', [$data = $danhsachsanpham])
@endsection

@section('custom-scripts')
@endsection