@extends('landing.layouts.default')
@section('content')
<div class="max-w-7xl mx-auto">
    <div class="py-10 px-5">
        <div class="grid grid-cols-3 gap-4">
            <div>
                <h1 class="font-bold text-4xl text-gray-600">CAKUPAN AREA</h1>
                <hr class="divide-blue-200">
                <div class="max-w-4xl mx-auto  mt-8">
                    <p class="text-gray-400 mg:text-lg">ICONNET merupakan jaringan Fiber Optic, menggunakan teknologi terkini sehingga dapat melayani Internet dan TV seamless pada kabel fiber optic yang sama tanpa menurunkan kecepatan dan kualitas</p>
                </div>
                <div class="max-w-4xl mx-auto  mt-4">
                    <div class="w-full max-w-xs">
                        <form action="{{route('landing.area')}}" method="GET">
                          <div class="mb-8">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="Provinsi">Provinsi</label>
                            <select name="province_id" id="provinsi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " id="grid-state">
                                <option selected disabled>Pilih Provinsi</option>
                                @foreach ($dataProvinsi as $provinsi)
                                    <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="mb-8">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="Kota">Kota</label>
                            <select name="regency_id" id="kota" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " id="grid-state">
                                <option selected disabled>Pilih Kota/Kabupaten</option>
                                @foreach ($dataKota as $kota)
                                    <option value="{{$kota->id}}">{{$kota->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="mb-8">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="Kecamatan">Kecamatan</label>
                            <select name="district_id" id="kecamatan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " id="grid-state">
                                <option selected disabled>Pilih Kecamatan</option>
                                @foreach ($dataKecamatan as $kecamatan)
                                    <option value="{{$kecamatan->id}}">{{$kecamatan->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="mb-8">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="Kelurahan">Kelurahan</label>
                            <select name="village_id" id="kelurahan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " id="grid-state">
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
                <img src="/assets/Kalimantan.png" class="mx-100 w-70 h-50" alt="">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            @foreach ($areaCoverage as $provinsi => $kotas)
            <div class="col-span-2">
                <div class="container mx-auto p-4 bg-gray-100 shadow-md text-gray-500 rounded-lg">
                    <h1 class="font-bold text-xl text-center"><u>{{$provinsi}}</u></h1>
                    <ul class="list-decimal p-4">
                        <div class="grid grid-cols-2 gap-4">
                            @foreach ($kotas as $kota => $kecamatans)
                            <div>
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
                            </div>
                            @endforeach
                        </div>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
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