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
    <form action="#" method="POST" class="max-w-lg mx-auto space-y-6" x-data="{
      phone: null,
      otpReq() {
        var wa = this.phone;
        var url = '{{route('otp.request')}}'+'?phone='+this.phone;
        location.href = url;
      }
    }">
        <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900">Nama Lengkap</label>
            <div class="mt-2">
              <input type="text" name="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            <small >Nama lengkap sesuai KTP*</small>
        </div>
        <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900">Email</label>
            <div class="mt-2">
              <input type="text" name="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900">No. Telepon </label>
            <div class="mt-2">
              <input type="text" name="telp" x-model="phone" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            <small >Nomer telah terdaftar di whatsapp*</small>
        </div>
        <div class="flex items-center space-x-3">
          <div class="flex-shrink-1 w-full">
              <label class="block text-sm font-medium leading-6 text-gray-900">OTP Whatsapp </label>
              <div class="mt-2">
                <input type="text" name="telp" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
              <small >Kirim otp melalui input nomer tlp* </small>
          </div>
          <div class="flex-shrink-0">
            <button type="button" @click="otpReq" class="bg-gray-800 p-2 text-[12px] mt-2 text-white rounded-lg">REQUEST OTP</button>
          </div>
        </div>
        <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900">Alamat</label>
            <div class="mt-2">
              <input type="text" name="address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900">Nomer Pelanggan PLN  </label>
            <div class="mt-2">
              <input type="text" name="idcustomer" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900">NIK KTP </label>
            <div class="mt-2">
              <input type="text" name="nik" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900">Foto KTP </label>
            <div class="mt-2">
              <input type="file" name="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
        <div class="flex justify-end">
            <button type="submit" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Daftar Layanan </button>
        </div>
    </form>
</div>
@endsection