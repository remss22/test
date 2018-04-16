<template>
  <div>
    <div class="tile is-ancestor">
      <div class="tile is-parent">
        <article class="tile is-child box">
          <div>
            <NewsTime :message="news.time"/>
            <article class="message">
              <NewsTitle :message="news.title"/>
              <description :message="news.preview + ' ...'"/>
            </article>
            <full-news-button :newsId="news.id"/>
            <a class="button is-primary is-small" :href=news.url >Оригинал</a>
          </div>
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
      'news': Object
    }
  }
</script>
