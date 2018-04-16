<template>
  <div>
    <div class="tile is-4">
      <div class="label">
        Курс
        <input class="input" placeholder="курс" v-model="course" @change="updateCourse()"/>
      </div>
    </div>

    <main-component :goods="goods" :names="names"/>
  </div>
</template>

<script>
  import Names from './data/names'

  import MainComponent from './components/Shop'
  export default {
    components: {
      MainComponent
    },
    data () {
      return {
        goods: [],
        names: {},
        data: [],
        course: 20
      }
    },
    methods: {
      updateCourse () {
        this.$store.commit('updateCurse', this.course)
      },
      readData () {
        return require('./data/data').Value.Goods
      },
      prepareDataToNormalFormat (goods, names) {
        let that = this
        let goodsForRender = []
        names.forEach(function (name, nameIndex, nameArray) {
          name.goodsInfo = Object.keys(name.B).map(function (key) {
            return {goodsId: parseInt(key), value: name.B[key]}
          })
          goods.forEach(function (goodsItem) {
            let resultGoods = {}
            if (goodsItem.G === name.groupId) {
              name.goodsInfo.forEach(function (item) {
                if (item.goodsId === goodsItem.T) {
                  resultGoods.title = item.value.N
                }
              })
              resultGoods.price = 0
              resultGoods.originalPrice = goodsItem.C
              resultGoods.groupId = goodsItem.G
              resultGoods.id = goodsItem.T
              resultGoods.count = goodsItem.P
              resultGoods.inBucketCount = 0
              resultGoods.priceStatus = null
              goodsForRender.push(resultGoods)
            }
          })
          if (nameIndex === nameArray.length - 1) {
            that.goods = goodsForRender
            that.$store.commit('updateGoods', goodsForRender)
            that.updateCourse()
          }
        })
      }
    },
    beforeMount () {
      this.names = Object.keys(Names).map(function (key) {
        Names[key].groupId = parseInt(key)
        return Names[key]
      })
      this.prepareDataToNormalFormat(this.readData(), this.names)
    }
  }
</script>
