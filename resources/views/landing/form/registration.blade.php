@extends('landing.layouts.default')
@section('content')
<div class="w-full h-[20rem] bg-brands-primary relative">
    <div class="absolute top-0 w-full h-full grid place-items-center bg-gradient-to-b from-brands-primary to-brands-primary/40 backdrop-blur-sm z-10">
        <div class=" text-center">
            <h1 class="font-bold text-4xl text-white">Registrasi Layanan</h1>
            <div class="max-w-4xl mx-auto px-5 mt-4">
                <p class="text-white mg:text-lg">ICONNET adalah sebuah internet provider baru yang dulunya bernama Stroomnet. ICONNET Bangkit Bersatu Untuk Indonesia, dengan menjunjung tinggi nilai-nilai Nasionalisme, ICONNET berniat memberikan yang terbaik untuk masyarakat Indonesia</p>
            </div>
        </div>
    </div>
    <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" alt="" class="h-full w-full object-cover">
</div>
<div class="max-w-7xl mx-auto px-10  lg:px-5">
    <div class="py-10 text-center">
        <h3 class="text-2xl font-bold text-gray-900">Form Pendaftaran</h3>
        <p>Isi form pendaftaran di bawah untuk mulai berlangganan</p>
    </div>
    <form action="{{route('form.store')}}" method="POST" class="max-w-4xl mx-auto space-y-6" x-data="{
      telp: '{{$params['phone']}}',
      otpReq() {
        var wa = this.telp;
        var url = '{{route('otp.request')}}'+'?phone='+this.telp;
        location.href = url+'&id={{$selectedProduct['id']}}';
      } 
    }">
      @csrf
      @include('landing.components.registration_message')
        <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900">No. Telepon </label>
            <div class="flex space-x-3">
              <div class="mt-2 flex-1">
                <input type="text" placeholder="format : 628123456" x-text="telp" x-model="telp" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <input type="text" hidden name="telp" x-bind:value="telp">
              </div>
              <div class="flex-shrink-0">
                <button type="button" @click="otpReq" class="bg-gray-800 p-2 text-[12px] mt-2 text-white rounded-lg">REQUEST OTP</button>
              </div>
            </div>
            <div class="flex justify-between py-2">
              <small >Nomer telah terdaftar di whatsapp*</small>
              @error('telp')
                <small class="text-red-400">{{ $message }}</small>
              @enderror
            </div>
        </div>
        <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900">Nama Lengkap</label>
            <div class="mt-2">
              <input type="text" name="name" value="{{old('name')}}"
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            <div class="flex justify-between py-2">
              <small >Nama lengkap sesuai KTP*</small>
              @error('name')
                <small class="text-red-400">{{ $message }}</small>
              @enderror
            </div>
        </div>
        <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900">Email</label>
            <div class="mt-2">
              <input type="text" name="email" value="{{old('email')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              @error('email')
              <div class="flex justify-end py-2">
                  <small class="text-red-400">{{ $message }}</small>
                </div>
              @enderror
            </div>
        </div>
       
        <div class="flex items-center space-x-3">
          <div class="flex-shrink-1 w-full">
              <label class="block text-sm font-medium leading-6 text-gray-900">OTP Whatsapp </label>
              <div class="mt-2">
                <input type="text" name="otp"  value="{{old('otp')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
              <div class="flex justify-between py-2">
                <small >Kirim otp melalui input nomer tlp* </small>
                @error('otp')
                  <small class="text-red-400">{{ $message }}</small>
                @enderror
              </div>
          </div>
         
        </div>
        <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900">Alamat</label>
            <div class="mt-2">
              <input type="text" name="address"  value="{{old('address')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              @error('address')
              <div class="flex justify-end py-2">
                  <small class="text-red-400">{{ $message }}</small>
                </div>
              @enderror
            </div>
        </div>
        <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900">Nomer Pelanggan PLN  </label>
            <div class="mt-2">
              <input type="text" name="idcustomer" value="{{old('idcustomer')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              @error('idcustomer')
              <div class="flex justify-end py-2">
                  <small class="text-red-400">{{ $message }}</small>
                </div>
              @enderror
            </div>
        </div>
        <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900">NIK KTP </label>
            <div class="mt-2">
              <input type="text" name="nik" value="{{old('nik')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              @error('nik')
              <div class="flex justify-end py-2">
                  <small class="text-red-400">{{ $message }}</small>
                </div>
              @enderror
            </div>
        </div>
        <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900">Foto KTP </label>
            <div class="mt-2">
              <input type="file" name="file" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              @error('file')
              <div class="flex justify-end py-2">
                  <small class="text-red-400">{{ $message }}</small>
                </div>
              @enderror
            </div>
        </div>
        <hr class="border-2 border-dotted "/>
        <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900">Pilihan Paket </label>
            <div class="mt-2">
              <select name="product_id"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                @foreach ($listProduct as $product)
                    <option value="{{$product->id}}" {{ $selectedProduct->id === $product->id ? 'selected' : '' }}>
                        {{$product->name}} - IDR {{ number_format($product->price, 2, ",", ".")}}
                    </option>
                @endforeach
              </select>
            </div>
        </div>
        <div>
          <div class="flex space-x-3">
            <input type="text" id="latitude" name="coordinate[0]" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <input type="text" id="longitude" name="coordinate[1]" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
          <div id="map" class="mt-4 w-full h-[20rem] bg-gray-300"></div>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Daftar Layanan </button>
        </div>
    </form>
</div>
@endsection
@section('script')
  <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

  <script>
    document.addEventListener('alpine:init', () => {
      // Initialize the map
      

      // ALPINE DATA 
        // Alpine.data('dropdown', () => ({
        //     open: false,
 
        //     toggle() {
        //         this.open = ! this.open
        //     }
        // }))

    })
    // Initialize the map
    // Initialize the map
    var map = L.map("map", {
      zoomControl: false 
    }).setView([-1.241659, 116.853412], 13);

      // Create the tile layer with your preferred map provider
      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: "&copy; OpenStreetMap contributors",
      }).addTo(map);

      // Create a marker with a draggable option
      var marker = L.marker([-1.241659, 116.853412], { draggable: true }).addTo(map);

      // Function to update the latitude and longitude inputs
      function updateLatLng() {
        var latLng = marker.getLatLng();
        document.getElementById("latitude").value = latLng.lat.toFixed(6);
        document.getElementById("longitude").value = latLng.lng.toFixed(6);
      }

      // Update the inputs when the marker is dragged
      marker.on("drag", updateLatLng);

      // Initialize the geocoder control
      var geocoder = L.Control.geocoder({
        collapsed: false,
        placeholder: "Cari lokasi..."
      }).addTo(map);

      // Function to handle the geocode result
      function handleResult(result) {
        if (result || result.length > 0) {
          var location = result.center;
          marker.setLatLng(location);
          map.setView(location, 13);
          console.log(result);
          updateLatLng()
        }
      }

      // Listen for geocode result event
      geocoder.on("markgeocode", function (e) {
        handleResult(e.geocode);
      });

  </script>
@endsection