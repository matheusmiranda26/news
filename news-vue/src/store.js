import Vue from 'vue'
import Vuex from 'vuex'
import axios from "axios"

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    articles: [],
    category: '2',
    key: 'HSHZrgisW4IelAHy3bnToEDtFKIOGG3y',
    categories: [
      '1', '2'
    ],
    currentPage: 0,
    pageSize: 4,
    visibleArticles: []
  },
  getters: {
    articles: store => store.articles,
    categories: store => store.categories
  },
  mutations: {
    async onChangeCategory(state, category) {
      state.category = category;
      state.currentPage = 0;
      state.articles = [];
      const url = `http://127.0.0.1:8000/api/news/categories/${state.category}`;
      // const url = `https://api.nytimes.com/svc/topstories/v2/${state.category}.json?api-key=${state.key}`;
      await axios.get(url).then(res => {
        state.articles = res.data;
        console.log("res.data");
        console.log(res.data);
        state.visibleArticles = state.articles.slice(state.currentPage * state.pageSize, (state.currentPage * state.pageSize) + state.pageSize)
      })
    },
    async populateArticles(state) {
      const url = `http://127.0.0.1:8000/api/news/categories/${state.id}`;
      await axios.get(url).then(res => {
        console.log(res.data);
        state.articles = res.data;
        state.visibleArticles = state.articles.slice(state.currentPage * state.pageSize, (state.currentPage * state.pageSize) + state.pageSize)
      });
    },
    async populateCategories(state) {
      const url = `http://localhost:8000/api/categories`;
      
      await axios.get(url).then(res => {
        console.log(res.data);
        state.categories = res.data.map(category => category.id);
        // state.visibleArticles = state.articles.slice(state.currentPage * state.pageSize, (state.currentPage * state.pageSize) + state.pageSize)
      });
    },
    updateVisibleArticles(state) {
      state.visibleArticles = state.articles.slice(state.currentPage * state.pageSize, (state.currentPage * state.pageSize) + state.pageSize)
    },
    async previousPage(state) {
        state.visibleArticles = state.articles.slice((state.currentPage-1) * state.pageSize, ((state.currentPage-1) * state.pageSize) + state.pageSize)
        state.currentPage--;
    },
    async nextPage(state) {
        state.visibleArticles = state.articles.slice((state.currentPage+1) * state.pageSize, ((state.currentPage+1) * state.pageSize) + state.pageSize)
        state.currentPage++;
    },
  },
  actions: {
    changeCategory: (context, category) => {
      context.commit('onChangeCategory', category)
    },
    populateArticles: (context) => {
      context.commit('populateArticles')
    },
    populateCategories: (context) => {
      context.commit('populateCategories')
    },
    updateVisibleArticles: (context) => {
      context.commit('updateVisibleArticles')
    },
    previousPage: (context) => {
      context.commit('previousPage')
    },
    nextPage: (context) => {
      context.commit('nextPage')
    },
  }
})