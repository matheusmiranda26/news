<template>
    <div>
        <label v-for="(category, index) in this.categories" :key="index" v-on:click="$store.dispatch('changeCategory', category)">
            <input type="radio" name="category" :value="category" id="">
            <img :src="imgUrl(category)" alt="">
        </label>
    </div>
</template>

<script>
export default {
    name: 'radio-category',
    props: [
        'categories',
        'selectedCategory'
    ],
    data() {
        return {
        category: '',
        };
    },
    mounted(){
        this.category = this.$store.category;
    },
    methods: {
        imgUrl(category) {
            return `/assets/images/${category}.png`;
        },        
    }
}
</script>

<style scoped>
    label{
        padding: 0 1rem;
    }
    img {
        width: 64px;
    }
    /* HIDE RADIO */
    [type=radio] { 
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* IMAGE STYLES */
    [type=radio] + img {
        cursor: pointer;        
    }

    /* CHECKED STYLES */
    [type=radio]:checked + img {
        outline: 3px dashed #f00;
    }
</style>

