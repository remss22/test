<template>
  <div>
    <button @click="openFullNews" class="button is-info">Подробнее</button>
  </div>
</template>

<script>
  export default {
    props: {
      newsId: Number
    },
    methods: {
      openFullNews () {
        this.$router.push('/backend/news/' + this.newsId)
      }
    }
  }
</script>
