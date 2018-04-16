<template>
  <div>
    <div class="tile is-ancestor">
      <div class="tile is-parent">
        <article class="tile is-child box">
          <full-news :news="news"/>
        </article>
      </div>
    </div>
  </div>
</template>

<script>
  import FullNews from './components/FullNews'
  export default {
    components: {
      FullNews
    },
    data () {
      return {
        news: {}
      }
    },
    methods: {
      loadNews () {
        let that = this
        this.$http.get('/api/get/' + this.$route.params.id).then(function (response) {
          if (response.data.status === 'success') {
            that.news = response.data.data
          }
        })
      }
    },
    beforeMount () {
      this.loadNews()
    }
  }
</script>
