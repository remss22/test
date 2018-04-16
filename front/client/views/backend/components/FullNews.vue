<template>
  <div>
    <div class="tile is-ancestor">
      <div class="tile is-parent">
        <article class="tile is-child box">
          <article class="message">
            <NewsTitle :message="news.title"/>
            <figure class="image">
              <img :src="news.image">
            </figure>
            <description :message="news.text"/>
          </article>
        </article>
      </div>
    </div>
  </div>
</template>

<script>
  import Description from './Description'
  import NewsTitle from './NewsTitle'
  import NewsTime from './NewsTime'
  import FullNewsButton from './FullNewsButton'

  export default {
    components: {
      Description,
      NewsTitle,
      NewsTime,
      FullNewsButton
    },
    props: {
      news: Object
    }
  }
</script>
