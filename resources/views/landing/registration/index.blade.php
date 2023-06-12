@extends('landing.layouts.default')
@section('content')
@php
  use Illuminate\Support\Arr;
    
@endphp
<div class="w-full h-[20rem] bg-brands-primary relative">
    <div class="absolute top-0 w-full h-full grid place-items-center bg-gradient-to-b from-brands-primary to-brands-primary/40 backdrop-blur-sm z-10">
        <div class=" text-center px-5">
            <h1 class="font-bold text-3xl md:text-4xl text-white">Formulir Pendaftaran</h1>
            <div class="max-w-4xl mx-auto px-5 mt-4 bg-sky-500 py-2 rounded-full">
                <p class="text-white text-lg font-medium">{{$product['name']}}</p>
            </div>
        </div>
    </div>
    <img src="https://images.unsplash.com/photo-1556741533-974f8e62a92d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2340&q=80" alt="" class="h-full w-full object-cover object-center">
</div>
    <div class="max-w-7xl mx-auto px-5 py-1 overflow-hidden">
        <div class="w-full overflow-x-scroll">
            <div class="flex space-x-2 divide-x justify-between py-4">
                @foreach (Arr::except($product->meta, ['note', 'btn_label']) as $key => $meta)
                    <div class="flex-shrink-0 bg-gradient-to-tl from-sky-500 to-sky-700 w-full text-center text-white py-6 rounded-lg flex items-center justify-center space-x-3">
                        <svg class="h-6 w-5 flex-none text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                          </svg>
                          <span>{{$meta}}</span>
                    </div>
                @endforeach
            </div>
        </div>
        <div >
            
        </div>
    </div>
@endsection