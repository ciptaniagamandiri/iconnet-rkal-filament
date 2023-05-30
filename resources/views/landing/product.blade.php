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
<div class="max-w-7xl mx-auto px-5 py-10">
    <div class="grid grid-cols-1 gap-4 md:grid-cols-7 md:gap-4">
        <div class="w-full  lg:col-span-2">
            <ul class="divide-y bg-white border border-gray-300 rounded-lg overflow-hidden">
                <li class="px-3 py-4 hover:bg-gray-50 ">
                    <a href="/products" class="text-base text-gray-700 font-medium w-full flex justify-between">
                        <span>Tampikan Semua</span>
                        <x-icon class="w-5 h-5" name="plus" />
                    </a>
                </li>
                <li class="px-3 py-4 hover:bg-gray-50 ">
                    <a href="/products?type=1" class="text-base text-gray-700 font-medium w-full flex justify-between">
                        <span>Paket Internet</span>
                        <x-icon class="w-5 h-5" name="plus" />
                    </a>
                </li>
                <li class="px-3 py-4 hover:bg-gray-50 ">
                    <a href="/products?type=2" class="text-base text-gray-700 font-medium w-full flex justify-between">
                        <span>Add Ons</span>
                        <x-icon class="w-5 h-5" name="plus" />
                    </a>
                </li>
            </ul>
        </div>
        <div class="w-full lg:col-span-5">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                @foreach ($products as $product) 
                    <div class="pt-16 border rounded-lg p-6">
                        <div class="pb-8 h-20 overflow-hidden mb-10"> 
                            <img src="{{$product['thumbnail']}}" class="h-20  object-contain w-full" >
                        </div>
                        <h3 id="tier-basic" class="text-lg font-semibold text-brands-primary">{{$product['name']}}</h3>
                        <p class="mt-2 flex items-baseline gap-x-1">
                            <span class="text-xl font-bold tracking-tight text-gray-900 mb-2">{{ $product['price'] }}</span>
                            <p class="text-sm font-semibold leading-6 text-gray-400">Bulan</p>
                        </p>
                        <p class="mt-4 text-sm font-semibold leading-6 text-gray-900">
                            {{ isset($product?->meta['note']) ? $product?->meta['note'] : '' }}
                        </p>
                        <div class="h-20 overflow-hidden truncate">
                            <ul role="list" class=" space-y-3 text-sm text-gray-600">
                                @foreach (Arr::except($product['meta'], ['note', 'btn_label']) as $key => $meta)
                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-brands-secondary" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                        </svg>
                                        {{$meta}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <a href="#" aria-describedby="tier-basic" class="mt-10 block rounded-md bg-brands-secondary px-3 py-2 text-center text-sm font-semibold leading-6 text-white shadow-sm hover:bg-brands-primary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brands-secondary">
                            {{ isset($product?->meta['btn_label']) ? $product?->meta['btn_label'] : 'Pesan Sekarang' }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection