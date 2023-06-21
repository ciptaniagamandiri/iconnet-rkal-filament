@extends('landing.layouts.default')
@section('content')
<x-carousel />
<!-- about -->
<div class="max-w-7xl mx-auto px-6 pb-10">
    <div class="py-10 max-w-4xl mx-auto text-center space-y-4 border-b-2 border-dotted">
        <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Keunggulan Icon NET</h1>
        <p class="md:text-lg leading-relaxed text-gray-600">Dengan pesatnya perkembangan teknologi mempengaruhi berbagai aspek kehidupan kita yang semakin bergantung pada Internet.
            Kualitas dan kecepatan yang terus bertambah menjadi kebutuhan baik di rumah, kantor, dan banyak tempat lainnya membuat kami memberikan layanan terbaik untuk anda.</p>
    </div>
    <!-- features -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 py-10 border-b-2 border-dotted">
        <div class="space-y-4">
            <div class="flex space-x-2 items-center">
                <x-icon name="map" class="w-10 h-10 text-brands-primary" outline />
                <p class="text-2xl font-bold text-brands-primary">Reliable</p>
            </div>
            <p class="text-gray-600">ICONNET memiliki kecepatan internet yang tinggi dan stabil karena menggunakan jaringan Fiber.</p>
        </div>
        <div class="space-y-4">
            <div class="flex space-x-2 items-center">
                <x-icon name="chart-bar" class="w-10 h-10 text-brands-primary" outline />
                <p class="text-2xl font-bold text-brands-primary">Affordable</p>
            </div>
            <p class="text-gray-600">Koneksi ICONNET sangat stabil karena menggunakan jaringan fiber optic yang tercanggih.</p>
        </div>
        <div class="space-y-4">
            <div class="flex space-x-2 items-center">
                <x-icon name="cursor-arrow-ripple" class="w-10 h-10 text-brands-primary" outline />
                <p class="text-2xl font-bold text-brands-primary">Unlimited</p>
            </div>
            <p class="text-gray-600">ICONNET saat ini mempunyai coverage area yang paling luas jangkauannya.</p>
        </div>
    </div>
</div>
<!-- pricing -->
{{-- <x-landing.pricing /> --}}

<div class="bg-white py-8 sm:py-10 ">
    <div class="mx-auto max-w-7xl px-6 border-b-2 border-dotted pb-10 lg:px-8">
        <div class="mx-auto max-w-4xl sm:text-center">
            <h2 class="text-base font-semibold leading-7 text-brands-secondary">Paket Internet</h2>
            <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Paket ICONNET</p>
        </div>
        <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-gray-600 sm:text-center">
            Berbagai paket yang dapat sesuai dengan layanan kebutuhan internet dan multimedia anda.
        </p>
        <div class="mt-20 flow-root">
            <div class="isolate -mt-16 grid max-w-sm grid-cols-1 gap-y-16 divide-y divide-gray-100 sm:mx-auto lg:-mx-8 lg:mt-0 lg:max-w-none lg:grid-cols-3 lg:divide-x lg:divide-y-0 xl:-mx-4">
                @foreach ($products as $product)
                    <x-CardProduct :product="$product"/>
                @endforeach
            </div>
        </div
    </div>
</div>
<!-- testimonial -->
<x-landing.testimonial />  
@endsection