<template>
    <div class="max-w-lg w-full lg:flex mx-auto py-2">
    <div class="h-48 lg:h-auto lg:w-64 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" title="Woman holding a mug">
    </div>
    <div class="border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
        <div class="mb-8">        
        <div class="text-black font-bold text-xl mb-2">{{ article.title }}</div>
        <p class="text-grey-darker text-base">{{ article.body }}</p>
        </div>
        <div class="flex items-center">
        <!-- <img class="w-10 h-10 rounded-full mr-4" src="https://tailwindcss.com/img/jonathan.jpg" alt="Avatar of Jonathan Reinink"> -->
        <!-- <div class="text-sm"> -->
            <!-- <p class="text-black leading-none">{{ byAythor }}</p> -->
            <!-- <p class="text-grey-dark">{{ published }}</p> -->
        <!-- </div> -->
        </div>
    </div>
    </div>    
</template>

<script>
export default {
    props: {
        article: Object,
    }//,
    // computed: {
        // backgroundImgStyle() {
            // return `background-image: url('${this.article.multimedia[2] ? this.article.multimedia[2].url: "https://user-images.githubusercontent.com/24848110/33519396-7e56363c-d79d-11e7-969b-09782f5ccbab.png"}')`;
        // },
        // byAythor() {
        //     return this.article.byline.replace('By ','');
        // },
        // published(){
        //     let published_date = new Date(this.article.published_date);
        //     return `${published_date.getDate()}/${published_date.getMonth()}/${published_date.getFullYear()}`;
        // }
    // }
}
</script>
