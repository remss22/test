<template>
  <div>
    <div class="tile is-ancestor">
      <div class="tile is-parent">
        <article class="tile is-child box">
          <h4 class="title">Атрибуты</h4>
          <table class="table is-bordered is-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Источник</th>
                <th>Код</th>
                <th>Дата загрузки</th>
                <th>Активность</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="attribute in carAttributes" :key="attribute.id">
                <td>{{attribute.id}}</td>
                <td>{{attribute.source}}</td>
                <td>{{attribute.code}}</td>
                <td>{{attribute.created_at}}</td>
                <td>
                  <div>
                    <div v-if="attribute.is_active === 0">
                      <label class="checkbox">
                        <input type="checkbox" v-on:click="setActive(attribute)">
                      </label>
                    </div>
                    <div v-else>
                      <label class="checkbox">
                        <input type="checkbox" disabled checked>
                      </label>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </article>
      </div>
    </div>
    <div v-if="sources !== null">
      <attribute-panel :sources="sources">
      </attribute-panel>
    </div>
  </div>
</template>


<script>
  import AttributePanel from './AttributePanel'

  export default {
    components: {
      AttributePanel
    },
    data () {
      return {
        carAttributes: [],
        sources: null
      }
    },
    mounted () {
      this.getAttributes()
    },
    methods: {
      getAttributes () {
        let that = this
        let data
        this.$http.get('/api/admin/attributes').then(function (response) {
          data = response.data
          that.carAttributes = data.content
          let sources = []
          that.carAttributes.forEach(function (attribute, index, array) {
            sources.push(attribute.source)
          })
          that.setSources(sources)
        })
      },
      setActive (attribute) {
        this.$http.get('/api/admin/attribute/active/' + attribute.id).then(function (response) {
          attribute.is_active = 1
        })
      },
      setSources (array) {
        this.sources = array.filter(function (el, index, arr) {
          return index === arr.indexOf(el)
        })
      }
    },
    watch: {
      carAttributes: function (val) {
      },
      sources: function (val) {
      }
    }
  }
</script>

<style lang="scss" scoped>
  .table td, .table th {
    text-align: center;
    vertical-align: middle;
  }

</style>
