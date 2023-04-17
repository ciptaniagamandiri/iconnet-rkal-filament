@extends('landing.layouts.default')
@section('content')
    <!-- carousel -->
    <div class="relative">
        <div class="h-[80vh] w-full bg-brands-primary/80 overflow-hidden">
            <img src="https://api.stroom.id/v1/file/asset/load/jpg/fo9h2ynulu" alt="" class="w-full h-full">
            <div class="w-full h-full absolute px-10 z-10 top-0 flex flex-col justify-center">
                <div class="w-full flex justify-between items-center">
                    <button class="p-3 bg-white/50 hover:bg-white rounded-full">
                        <x-icon name="chevron-left" solid />
                    </button>
                    <button class="p-3 bg-white/50 hover:bg-white rounded-full">
                        <x-icon name="chevron-right" solid />
                    </button>
                </div>
            </div>
        </div>
        <div class="flex justify-center items-center space-x-4 py-6">
            <span class="w-8 h-3 rounded-full bg-brands-secondary"></span>
            <span class="w-8 h-3 rounded-full bg-gray-200"></span>
            <span class="w-8 h-3 rounded-full bg-gray-200"></span>
        </div>
    </div>
@endsection