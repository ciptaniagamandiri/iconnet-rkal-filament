<div>
    <div class="border px-10 py-10 rounded-lg">
        <div class="pb-8"> 
          <img src="/storage/{{$product->thumbnail}}" class="w-full object-cover mx-auto" >
        </div>
        <h3 id="tier-basic" class="text-2xl font-semibold text-brands-primary">{{$product->name}}</h3>
        <p class="mt-3 flex items-baseline gap-x-1">
          <span class="text-5xl font-bold tracking-tight text-gray-900">{{ number_format($product?->price, 0, '.', ',') }}</span>
          <br>
          <p class="text-sm font-semibold leading-6 text-gray-400">/Bulan</p>
        </p>
        <p class="mt-10 text-sm font-semibold leading-6 text-gray-900">{{ isset($product?->meta['note']) ? $product?->meta['note'] : '' }}</p>
        <ul role="list" class="mt-6 space-y-3 text-sm leading-6 text-gray-600">
          @foreach (Arr::except($product->meta, ['note', 'btn_label']) as $key => $meta)
            <li class="flex gap-x-3">
              <svg class="h-6 w-5 flex-none text-brands-secondary" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
              </svg>
              {{$meta}}
            </li>
          @endforeach
        </ul>
        <a href="{{route('product.registration', $product->id)}}" aria-describedby="tier-basic" class="mt-10 block rounded-md bg-brands-secondary px-3 py-2 text-center text-sm font-semibold leading-6 text-white shadow-sm hover:bg-brands-primary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brands-secondary">{{ isset($product?->meta['btn_label']) ? $product?->meta['btn_label'] : 'Pesan Sekarang' }}</a>
      </div>
</div>