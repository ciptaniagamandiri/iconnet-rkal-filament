@if (Session::get('otp_success'))
    <div class="w-full py-4 px-5 bg-green-50 rounded-2xl border border-green-600">
        <p class="text-green-700 text-sm">Kode Otp berhasil di kirim, check pesan pada aplikasi whatsapp anda.</p>
    </div>
@endif