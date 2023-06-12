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
                            <select name="province_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " id="grid-state">
                                <option selected disabled>Pilih Provinsi</option>
                                @foreach ($dataProvinsi as $provinsi)
                                    <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="mb-8">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="Kota">Kota</label>
                            <select name="regency_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " id="grid-state">
                                <option selected disabled>Pilih Kota/Kabupaten</option>
                                @foreach ($dataKota as $kota)
                                    <option value="{{$kota->id}}">{{$kota->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="mb-8">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="Kecamatan">Kecamatan</label>
                            <select name="district_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " id="grid-state">
                                <option selected disabled>Pilih Kecamatan</option>
                                @foreach ($dataKecamatan as $kecamatan)
                                    <option value="{{$kecamatan->id}}">{{$kecamatan->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="mb-8">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="Kelurahan">Kelurahan</label>
                            <select name="village_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " id="grid-state">
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
                <div class="grid grid-cols-2 gap-4">
                    @foreach ($areaCoverage as $provinsi => $kotas)
                    <div>
                        <div class="container mx-auto p-4 bg-gray-100 shadow-md text-gray-500 rounded-lg">
                            <h1 class="font-bold text-xl text-center"><u>{{$provinsi}}</u></h1>
                            <ul class="list-decimal p-4">
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