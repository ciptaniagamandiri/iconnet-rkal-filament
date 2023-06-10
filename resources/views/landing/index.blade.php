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
@foreach ($products as $item) 
<div class="bg-white py-10 sm:py-10 ">
    <div class="mx-auto max-w-7xl px-6 border-b-2 border-dotted pb-10 lg:px-8">
      <div class="mx-auto max-w-4xl sm:text-center">
        <h2 class="text-base font-semibold leading-7 text-brands-secondary">{{$item[0]['type_label']}}</h2>
        <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">{{ $item[0]['type'] == 1 ? 'Paket ICONNET' : 'ADD ON ICONNET' }}</p>
      </div>
      <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-gray-600 sm:text-center">{{ $item[0]['type'] == 1 ? 'Berbagai paket yang dapat sesuai dengan layanan kebutuhan internet dan multimedia anda.' : 'Berbagai add on yang dapat sesuai dengan layanan kebutuhan multimedia anda.'}}</p>
      <div class="mt-20 flow-root">
        <div class="isolate -mt-16 grid max-w-sm grid-cols-1 gap-y-16 divide-y divide-gray-100 sm:mx-auto lg:-mx-8 lg:mt-0 lg:max-w-none lg:grid-cols-3 lg:divide-x lg:divide-y-0 xl:-mx-4">
          {{-- start product --}}
          @foreach ($item as $product)            
          <div class="pt-16 lg:px-8 lg:pt-0 xl:px-14">
            <div class="pb-8"> 
              <img src="{{$product->thumbnail}}" class="w-full object-cover mx-auto" >
            </div>
            <h3 id="tier-basic" class="text-2xl font-semibold text-brands-primary">{{$product->name}}</h3>
            <p class="mt-6 flex items-baseline gap-x-1">
              <span class="text-5xl font-bold tracking-tight text-gray-900">{{ number_format($product?->price, 0, '.', ',') }}</span>
              <br>
              <p class="text-sm font-semibold leading-6 text-gray-400">Bulan</p>
            </p>
            <p class="mt-10 text-sm font-semibold leading-6 text-gray-900">{{ isset($product?->meta['note']) ? $product?->meta['note'] : '' }}</p>
            <ul role="list" class="mt-6 space-y-3 text-sm leading-6 text-gray-600">
              @foreach (Arr::except($product->meta, ['note', 'btn_label']) as $key => $meta)
                {{-- @if (array_key_exists(['speed', 'bandwith'], $product->meta))
                @endif --}}
                <li class="flex gap-x-3">
                  <svg class="h-6 w-5 flex-none text-brands-secondary" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                  </svg>
                  {{$meta}}
                </li>
              @endforeach
            </ul>
            <a href="#" aria-describedby="tier-basic" class="mt-10 block rounded-md bg-brands-secondary px-3 py-2 text-center text-sm font-semibold leading-6 text-white shadow-sm hover:bg-brands-primary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brands-secondary">{{ isset($product?->meta['btn_label']) ? $product?->meta['btn_label'] : 'Pesan Sekarang' }}</a>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @endforeach
<!-- testimonial -->
<x-landing.testimonial />
@endsection