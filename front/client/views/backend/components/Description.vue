<template>
  <div>
    <div class="message-body">
      {{message}}
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
