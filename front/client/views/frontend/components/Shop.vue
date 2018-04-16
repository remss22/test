<template>
  <div>
    <div v-for="group in groupsForRender" :key="group.id">
      <div v-if="group.goods.length">
        <div class="tile is-ancestor">
          <div class="tile is-parent">
            <article class="tile is-child box">
              <h1 class="title">{{group.title}}</h1>
              <goods :group="group"/>
            </article>
          </div>
        </div>
      </div>
    </div>
    <div>
      <bucket/>
    </div>
  </div>
</template>
<script>
  import Goods from './Goods'
  import Bucket from './Bucket'
  export default {
    components: {
      Goods,
      Bucket
    },
    props: {
      goods: Array,
      names: Array
    },
    data () {
      return {
        goodsGroups: [],
        groupsForRender: []
      }
    },
    methods: {
      makeGroup () {
        let that = this
        this.names.forEach(function (names) {
          let renderGroup = {}
          renderGroup.goods = []
          renderGroup.title = names.G
          renderGroup.id = names.groupId
          that.goods.forEach(function (goods, index, array) {
            if (goods.groupId === names.groupId) {
              renderGroup.goods.push(goods)
            }
            if (index === array.length - 1) {
              that.pushToRender(renderGroup)
            }
          })
        })
      },
      pushToRender (renderGroup) {
        this.groupsForRender.push(renderGroup)
      }
    },
    beforeMount () {
      this.makeGroup()
    }
  }
</script>

<style scoped>

</style>
