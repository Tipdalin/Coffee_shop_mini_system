@extends('layouts.app') 

@section('title', 'Perk Up Coffee - Order')

@section('content')
<div class="container-fluid py-4 page-wrapper">
    <div class="row g-4">
        {{-- Left Side: Menu (9 columns on desktop) --}}
        <div class="col-lg-8 menu-col">
            <div class="p-3 menu-container">
                {{-- Category Tabs --}}
                @include('order.partials.category-tabs') 

                {{-- Product Grid --}}
                @include('order.partials.product-grid') 
            </div>
        </div>

        {{-- Right Side: Order Summary (4 columns on desktop) --}}
        <div class="col-lg-4 order-col">
            @include('order.partials.order-sidebar')
        </div>
    </div>
</div>
@endsection