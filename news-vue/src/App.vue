<template>
  <div id="app" class="container mx-auto">
    <radio-category
      :categories="$store.state.categories"
      v-on:change-category="this.$store.dispatch('changeCategory')"
    ></radio-category>
    <br>
      <pagination :articles="$store.state.articles" :pageSize="$store.state.pageSize" :currentPage="$store.state.currentPage"> </pagination>
    <br>
    
      <news-card
        v-for="(article, index) in $store.state.visibleArticles"
        :article="article"
        :key="index"
      />
    <br>
      <pagination :articles="$store.state.articles" :pageSize="$store.state.pageSize" :currentPage="$store.state.currentPage"> </pagination>
    <br>
  </div>
</template>

<script>
import "./assets/css/app.css";
import NewsCard from "./components/NewsCard.vue";
import RadioCategory from "./components/RadioCategory.vue";
import Pagination from "./components/Pagination.vue";
// import VuePaginate from "vue-paginate";

export default {
  name: "app",
  components: {
    "news-card": NewsCard,
    "radio-category": RadioCategory,
    pagination: Pagination
  },
  created() {
    this.$store.dispatch("populateArticles");
    this.$store.dispatch("populateCategories");
  }
};
</script>

<style>
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  margin-top: 60px;
}
</style>
