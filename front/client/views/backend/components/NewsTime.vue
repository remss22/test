<template>
  <div>
    Время новости : <b>{{message}}</b>
  </div>
</template>

<script>
  export default {
    props: {
      message: String
    }
  }
</script>
