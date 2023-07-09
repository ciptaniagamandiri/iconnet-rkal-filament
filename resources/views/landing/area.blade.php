@extends('landing.layouts.default')
@section('content')
<div class="max-w-fit mx-auto">
    <div class="py-10 px-10">
        <div class="grid grid-cols-3 gap-24">
            <div>
                <h1 class="font-bold text-3xl text-black">CAKUPAN AREA</h1>
                <button class="bg-black text-white font-bold py-1 px-6 mt-6"></button>
                <div class="max-w-4xl mx-auto  mt-2">
                    <p class="text-gray-400 mg:text-lg">ICONNET merupakan jaringan Fiber Optic, menggunakan teknologi terkini sehingga dapat melayani Internet dan TV seamless pada kabel fiber optic yang sama tanpa menurunkan kecepatan dan kualitas</p>
                </div>
                <div class="max-w-4xl mx-auto  mt-4">
                    @if ($condition)
                        @if ($areaCoverage->count() > 0)
                            <div class="bg-teal-100 border-l-4 border-teal-500 text-teal-900 p-4 mb-4" role="alert">
                                <p class="font-bold">Tercover</p>
                                <p>ICONNET tersedia dilokasi anda</p>
                                <a href="{{route('landing.product')}}" class="bg-teal-500 text-white font-bold py-1 px-6 rounded mt-2">
                                    Daftar Sekarang
                                </a>
                            </div>               
                        @else             
                            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 mb-4" role="alert">
                                <p class="font-bold">Tidak Tercover</p>
                                <p>ICONNET belum tersedia saat ini</p>
                                <a href="https://wa.me/6281112002123" class="bg-orange-500 text-white font-bold py-1 px-6 rounded mt-2">Beri tahu kami lokasi anda</a>
                            </div>
                        @endif
                    @endif
                    <div class="max-w-4xl mx-auto ">
                        <form action="{{route('landing.area')}}" method="GET">
                          <div class="mb-8">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="Provinsi">Provinsi</label>
                            <select name="province_id" id="provinsi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " id="grid-state" required>
                                <option selected disabled>Pilih Provinsi</option>
                                @foreach ($dataProvinsi as $provinsi)
                                    <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="mb-8">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="Kota">Kota</label>
                            <select name="regency_id" id="kota" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " id="grid-state" required>
                                <option value="{{old('regency_id')}}">{{old('regency_id')}}</option>
                                <option selected disabled>Pilih Kota</option>
                                @foreach ($dataKota as $kota)
                                    <option value="{{$kota->id}}">{{$kota->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="mb-8">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="Kecamatan">Kecamatan</label>
                            <select name="district_id" id="kecamatan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " id="grid-state" required>
                                <option selected disabled>Pilih Kecamatan</option>
                                @foreach ($dataKecamatan as $kecamatan)
                                    <option value="{{$kecamatan->id}}">{{$kecamatan->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="mb-8">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="Kelurahan">Kelurahan</label>
                            <select name="village_id" id="kelurahan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " id="grid-state" required>
                                <option selected disabled>Pilih Kelurahan</option>
                                @foreach ($dataKelurahan as $kelurahan)
                                    <option value="{{$kelurahan->id}}">{{$kelurahan->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="flex items-center justify-between">
                            <button type="submit" class="w-full bg-brands-primary relative hover:text-white text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline " type="button">
                              Cek Ketersediaan
                            </button>
                          </div>
                        </form>
                      </div>
                </div>
            </div>
            <div class="col-span-2">    
                <img src="/assets/Kalimantan.png" width="750">
            </div>
        </div>
    </div>
</div>

    {{-- KALTIM --}}
    @if ($areaKaltim->count() > 0)
    <div class="py-2 px-5">
        <h1 class="font-bold text-2xl text-center pb-4 pt-4"><b>{{$areaKaltim[0]['province']['name']}}</b></h1>
        <div class="grid grid-cols-2 gap-2">
            @foreach ($areaKaltim as $kota)
                <div class="px-1 m-3 bg-gray-100 shadow-md text-black rounded-lg hover:rounded-lg">
                    <div class="container mx-auto p-4">
                        <h5 class="font-bold text-m text-left">{{$kota->name}}</h5>
                        <ul class="list-disc p-4">
                            <div class="grid grid-cols-3 gap-x-2 gap-y-2">
                                @foreach ($kota->area as $area)
                                <div class="row-span-3 ml-4">
                                    <li>{{$area->name}}</li>
                                </div>
                                @endforeach
                            </div>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- KALSEL --}}
    @if ($areaKalsel->count() > 0)
    <div class="py-2 px-5">
        <h1 class="font-bold text-2xl text-center pb-4 pt-4"><b>{{$areaKalsel[0]['province']['name']}}</b></h1>
        <div class="grid grid-cols-2 gap-2">
            @foreach ($areaKalsel as $kota)
                <div class="px-1 m-3 bg-gray-100 shadow-md text-black rounded-lg hover:rounded-lg">
                    <div class="container mx-auto p-4">
                        <h5 class="font-bold text-m text-left">{{$kota->name}}</h5>
                        <ul class="list-disc p-4">
                            <div class="grid grid-cols-3 gap-x-2 gap-y-2">
                                @foreach ($kota->area as $area)
                                <div class="row-span-3 ml-4">
                                    <li>{{$area->name}}</li>
                                </div>
                                @endforeach
                            </div>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- KALTENG --}}
    @if ($areaKalteng->count() > 0)
    <div class="py-2 px-5">
        <h1 class="font-bold text-2xl text-center pb-4 pt-4"><b>{{$areaKalteng[0]['province']['name']}}</b></h1>
        <div class="grid grid-cols-2 gap-2">
            @foreach ($areaKalteng as $kota)
                <div class="px-1 m-3 bg-gray-100 shadow-md text-black rounded-lg hover:rounded-lg">
                    <div class="container mx-auto p-4">
                        <h5 class="font-bold text-m text-left">{{$kota->name}}</h5>
                        <ul class="list-disc p-4">
                            <div class="grid grid-cols-3 gap-x-2 gap-y-2">
                                @foreach ($kota->area as $area)
                                <div class="row-span-3 ml-4">
                                    <li>{{$area->name}}</li>
                                </div>
                                @endforeach
                            </div>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- KALBAR --}}
    @if ($areaKalbar->count() > 0)
    <div class="py-2 px-5">
        <h1 class="font-bold text-2xl text-center pb-4 pt-4"><b>{{$areaKalbar[0]['province']['name']}}</b></h1>
        <div class="grid grid-cols-2 gap-2">
            @foreach ($areaKalbar as $kota)
                <div class="px-1 m-3 bg-gray-100 shadow-md text-black rounded-lg hover:rounded-lg">
                    <div class="container mx-auto p-4">
                        <h5 class="font-bold text-m text-left">{{$kota->name}}</h5>
                        <ul class="list-disc p-4">
                            <div class="grid grid-cols-3 gap-x-2 gap-y-2">
                                @foreach ($kota->area as $area)
                                <div class="row-span-3 ml-4">
                                    <li>{{$area->name}}</li>
                                </div>
                                @endforeach
                            </div>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- KALTARA --}}
    @if ($areaKaltara->count() > 0)
    <div class="py-2 px-5">
        <h1 class="font-bold text-2xl text-center pb-4 pt-4"><b>{{$areaKaltara[0]['province']['name']}}</b></h1>
        <div class="grid grid-cols-2 gap-2">
            @foreach ($areaKaltara as $kota)
                <div class="px-1 m-3 bg-gray-100 shadow-md text-black rounded-lg hover:rounded-lg">
                    <div class="container mx-auto p-4">
                        <h5 class="font-bold text-m text-left">{{$kota->name}}</h5>
                        <ul class="list-disc p-4">
                            <div class="grid grid-cols-3 gap-x-2 gap-y-2">
                                @foreach ($kota->area as $area)
                                <div class="row-span-3 ml-4">
                                    <li>{{$area->name}}</li>
                                </div>
                                @endforeach
                            </div>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('#provinsi').on('change', function() {
                    var provinsiID = $(this).val();
                    console.log(provinsiID)
                    if(provinsiID) {
                        $.ajax({
                            url: '/fetch/data/kota/'+provinsiID,
                            type: "GET",
                            data : {"_token":"{{ csrf_token() }}"},
                            dataType: "json",
                            success:function(data)
                            {
                                if(data){
                                    $('#kota').empty();
                                    $('#kota').append('<option hidden>Pilih kota/Kabupatan</option>'); 
                                    $.each(data, function(key, kota){
                                        $('select[name="regency_id"]').append('<option value="'+ kota.id +'">' + kota.name+ '</option>');
                                    });
                                }else{
                                    $('#kota').empty();
                                }
                            }
                        });
                    } else {
                        $('#kota').empty();
                    }
                });

                $('#kota').on('change', function() {
                    var kotaID = $(this).val();
                    console.log(kotaID)
                    if(kotaID) {
                        $.ajax({
                            url: '/fetch/data/kecamatan/'+kotaID,
                            type: "GET",
                            data : {"_token":"{{ csrf_token() }}"},
                            dataType: "json",
                            success:function(data)
                            {
                                if(data){
                                    $('#kecamatan').empty();
                                    $('#kecamatan').append('<option hidden>Pilih Kecamtan</option>'); 
                                    $.each(data, function(key, kecamatan){
                                        $('select[name="district_id"]').append('<option value="'+ kecamatan.id +'">' + kecamatan.name+ '</option>');
                                    });

                                    
                                }else{
                                    $('#kecamatan').empty();
                                }
                            }
                        });
                    }else{
                        $('#kecamatan').empty();
                    }
                });

                $('#kecamatan').on('change', function() {
                    var kecamatanID = $(this).val();
                    console.log(kecamatanID)
                    if(kecamatanID) {
                        $.ajax({
                            url: '/fetch/data/kelurahan/'+kecamatanID,
                            type: "GET",
                            data : {"_token":"{{ csrf_token() }}"},
                            dataType: "json",
                            success:function(data)
                            {
                                if(data){
                                    $('#kelurahan').empty();
                                    $('#kelurahan').append('<option hidden>Pilih Kecamtan</option>'); 
                                    $.each(data, function(key, kelurahan){
                                        $('select[name="village_id"]').append('<option value="'+ kelurahan.id +'">' + kelurahan.name+ '</option>');
                                    });

                                    
                                }else{
                                    $('#kelurahan').empty();
                                }
                            }
                        });
                    }else{
                        $('#kelurahan').empty();
                    }
                });
            });
        </script>