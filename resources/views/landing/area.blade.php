@extends('landing.layouts.default')
@section('content')
<div class="w-full h-[20rem] bg-brands-primary relative">
    <div class="absolute top-0 w-full h-full grid place-items-center bg-gradient-to-b from-brands-primary to-brands-primary/40 backdrop-blur-sm z-10">
        <div class=" text-center">
            <h1 class="font-bold text-4xl text-white">CAKUPAN AREA</h1>
            <div class="max-w-4xl mx-auto px-5 mt-4">
                <p class="text-white mg:text-lg">ICONNET merupakan jaringan Fiber Optic, menggunakan teknologi terkini sehingga dapat melayani Internet dan TV seamless pada kabel fiber optic yang sama tanpa menurunkan kecepatan dan kualitas</p>
            </div>
        </div>
    </div>
    <img src="https://images.unsplash.com/photo-1620549146396-9024d914cd99?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2342&q=80" alt="" class="h-full w-full object-cover object-bottom">
</div>
<div class="max-w-7xl mx-auto">
    <div class="py-10 px-5">
        <div class="grid grid-cols-3 gap-4">
            <div>
                {{-- <h6>CAKUPAN AREA</h6> --}}
            </div>
            <div class="col-span-3">    
                <img src="/assets/Kalimantan.png" class="mx-100 w-100 h-100" alt="">
                <div class="grid grid-cols-2 gap-4">
                    @foreach ($areaCoverage as $provinsi => $kotas)
                    <div>
                        <div class="container mx-auto px-4 bg-gray-100 shadow-md text-gray-500 rounded-lg">
                            <h1 class="font-bold text-xl text-center"><u>{{$provinsi}}</u></h1>
                            <ul class="list-decimal ">
                                @foreach ($kotas as $kota => $kecamatans)
                                <li>{{$kota}}</li>
                                <ul class="list-disc ml-4">
                                    @foreach ($kecamatans as $kecamatan => $kelurahans)
                                        <li>{{$kecamatan}}</li>
                                        <ul class="list-disc ml-8">
                                            @foreach ($kelurahans as $kelurahan => $areas)
                                                <li>{{$kelurahan}}</li>
                                                <ul class="list-decimal ml-12">
                                                    @foreach ($areas as $area)
                                                    <li>{{$area->name}}</li>
                                                    @endforeach
                                                </ul>
                                            @endforeach
                                        </ul>
                                    @endforeach
                                </ul>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
          </div>
    </div>
</div>
@endsection