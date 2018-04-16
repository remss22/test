<template>
  <div>
  <div class="tile is-ancestor">
    <div class="tile is-parent">
      <article class="tile is-child box">
        <h1 class="title">Загрузка</h1>
        <div class="block">
            <div v-for="source in sources" class="control is-one-fifth">
              <a class="button is-primary is-normal" @click="loadBySource(source)">
                Загрузить из источника {{source}}
              </a>
            </div>
        </div>
      </article>
    </div>
        <div class="tile is-parent">
          <article class="tile is-child box">
            <h1 class="title">Лог</h1>
            <div class="block">
              <div v-if="taskCount !== null">
                Количество задач: {{taskCount}}
                <div>
                  Последний источник: {{lastSource}}
                </div>
              </div>
            </div>
          </article>
        </div>
    </div>
  </div>
</template>


<script>

  export default {
    props: {
      sources: Array
    },
    data () {
      return {
        taskCount: null,
        lastSource: null
      }
    },
    methods: {
      loadBySource (source) {
        let that = this
        this.$http.get('/api/admin/attributes/load/' + source).then(function (response) {
          console.log(response)
          if (response.data.success === true) {
            that.taskCount = response.data.content.job_count
            that.lastSource = source
          }
        })
      }
    },
    watch: {
      message: function (val) {
      }
    }
  }
</script>

<style lang="scss" scoped>
  .column {
    flex-grow: 0;
  }

</style>
