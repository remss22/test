<template>
  <div>
      <div class="message-header">
        <b>{{message}}</b>
      </div>
  </div>
</template>

<script>
  export default {
    props: {
      message: String
    }
  }
</script>
