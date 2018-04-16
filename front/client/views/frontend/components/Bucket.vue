<template>
  <div>
    <div class="tile is-ancestor bucket">
      <div class="tile is-parent">
        <article class="tile is-child box">
          <label class="label">Корзина</label>
          <bucket-table/>
        </article>
      </div>
    </div>
  </div>
</template>

<script>
  import BucketTable from './BucketTable'
  export default {
    components: {
      BucketTable
    }
  }
</script>

<style lang="scss" scoped>
  .bucket {
    background: #ffe98e;
  }
</style>
