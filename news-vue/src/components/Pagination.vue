<template>
    <div class="pagination">
        <a href="#" v-if="showPrevious()" class="pagination-btn" v-on:click="previousPage()"> < </a>
        {{ $store.state.currentPage + 1 }} de {{ this.totalPages }}
        <a href="#" v-if="showNext()" class="pagination-btn" v-on:click="nextPage()"> > </a>
    </div>
</template>

<script>
export default {
    name: "pagination",
    props: ['articles', 'currentPage', 'pageSize'],
    methods: {
        updatePage(pageNumber){
            this.$emit('page:update', pageNumber)
        },
        showPrevious(){
            return this.currentPage == 0 ? false : true
        },
        showNext(){
            return this.currentPage < this.totalPages-1
        },
        previousPage(){
          this.$store.dispatch("previousPage");
        },
        nextPage(){
          this.$store.dispatch("nextPage");
        }
    },
    computed: {
         totalPages(){
            return Math.trunc((this.articles ? this.articles.length : 0) / this.pageSize);
        }
    }
}
</script>

<style>
  .pagination-btn{
    text-decoration: none;
    color: blue;
  }
</style>
