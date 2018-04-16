<template>
  <div>
    <button class="button is-small" @click="parseNews">Загрузить с рбк</button>
    <div v-for="loadedNews in news">
      <news-block :news="loadedNews"/>
    </div>
  </div>

</template>

<script>
  import NewsBlock from './components/NewsBlock'

  export default {
    components: {
      NewsBlock
    },
    data () {
      return {
        news: []
      }
    },
    methods: {
      loadNews () {
        let that = this
        this.$http.get('/api/get').then(function (response) {
          if (response.data.status === 'success') {
            that.news = response.data.data
          }
        })
      },
      parseNews () {
        let that = this
        this.$http.get('/api/load').then(function (response) {
          if (response.data.status === 'success') {
            window.alert('loaded')
            that.loadNews()
          }
        })
      }
    },
    beforeMount () {
      this.loadNews()
    }
  }
</script>
