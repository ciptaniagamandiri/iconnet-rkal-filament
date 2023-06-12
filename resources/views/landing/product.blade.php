@extends('landing.layouts.default')
@section('content')
<div class="w-full h-[20rem] bg-brands-primary relative">
    <div class="absolute top-0 w-full h-full grid place-items-center bg-gradient-to-b from-brands-primary to-brands-primary/40 backdrop-blur-sm z-10">
        <div class=" text-center">
            <h1 class="font-bold text-4xl text-white">PRODUK KAMI</h1>
            <div class="max-w-4xl mx-auto px-5 mt-4">
                <p class="text-white mg:text-lg">ICONNET adalah sebuah internet provider baru yang dulunya bernama Stroomnet. ICONNET Bangkit Bersatu Untuk Indonesia, dengan menjunjung tinggi nilai-nilai Nasionalisme, ICONNET berniat memberikan yang terbaik untuk masyarakat Indonesia</p>
            </div>
        </div>
    </div>
    <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" alt="" class="h-full w-full object-cover">
</div>
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
@endsection