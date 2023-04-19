<div class="relative" x-data="{
    images: [
      'https://api.stroom.id/v1/file/asset/load/jpg/fo9h2ynulu',
      'https://api.stroom.id/v1/file/asset/load/jpg/u7wwwpox6y',
    ],
    active: 0,
    loop() {
        setInterval(() => {
            this.active == 0 ?  this.active = + 1 : this.active = 0
        }, 4000)
    }
}" x-init="loop">
    <div class="lg:h-[80vh] w-full bg-brands-primary/80 overflow-hidden">
        <img x-bind:src="images[active]" alt="" class="aspect-video lg:h-full lg:w-full">
        <div class="w-full h-full absolute px-5 lg:px-10 z-10 top-0 flex flex-col justify-center">
            <div class="w-full flex justify-between items-center -mt-20 lg:md-0">
                <button @click="active > 0 ? active = active - 1 : active = 0" class="p-2 md:p-3 bg-white/80 hover:bg-white rounded-full">
                    <x-icon name="chevron-left" class="w-5 h-5" solid />
                </button>
                <button @click="active == 0 ? active = active + 1 : active = 0" class="p-2 md:p-3 bg-white/80 hover:bg-white rounded-full">
                    <x-icon name="chevron-right" class="w-5 h-5" solid />
                </button>
            </div>
        </div>
    </div>
    <div  class="flex justify-center items-center space-x-4 py-6  relative z-10">
        <template x-for="(item, index) in images">
            <button 
            @click="active = index" 
            type="button" 
            :class="{'bg-brands-secondary': active == index, 'bg-gray-200': active != index}"
            class="w-8 h-3 rounded-full hover:bg-brands-primary"></button>
        </template>
    </div>
</div>