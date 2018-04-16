import Vue from 'vue'
import Vuex from 'vuex'
import pkg from 'package'
import * as actions from './actions'
import * as getters from './getters'

import app from './modules/app'
import menu from './modules/menu'

Vue.use(Vuex)

const store = new Vuex.Store({
  strict: true,  // process.env.NODE_ENV !== 'production',
  actions,
  getters,
  modules: {
    app,
    menu
  },
  state: {
    pkg,
    goods: [],
    course: 0,
    bucket: {
      goods: [],
      total: 0
    }
  },
  mutations: {
    updateGoods (state, goods) {
      this.state.goods = goods
    },
    addGoodsToBucket (state, goodsId) {
      let goods = state.goods.find(item => {
        return item.id === goodsId
      })
      if (!goods.count) {
        return
      }
      let addedGoods = state.bucket.goods.find(item => {
        return goods.id === item.id
      })
      this.state.bucket.total = Number(Number(this.state.bucket.total) + Number(goods.price)).toFixed(2)

      goods.count--
      if (typeof addedGoods !== 'undefined') {
        let newState = []
        let that = this
        this.state.bucket.goods.forEach(function (goods, index, array) {
          if (goods.id === addedGoods.id) {
            goods.inBucketCount++
          }
          newState.push(goods)
          if (index === array.length - 1) {
            that.state.bucket.goods = newState
          }
        })
      } else {
        goods.inBucketCount++
        this.state.bucket.goods.push(goods)
      }
    },
    removeGoodsFromBucket (state, goodsId) {
      let goods = state.bucket.goods.find(item => {
        return item.id === goodsId
      })
      if (typeof goods === 'undefined') {
        return
      }
      this.state.bucket.total = Number(Number(this.state.bucket.total) - Number(goods.price)).toFixed(2)
      goods.count ++
      let newState = []
      let that = this
      this.state.bucket.goods.forEach(function (item, index, array) {
        if (item.id === goodsId) {
          item.inBucketCount--
        }
        if (item.inBucketCount > 0) {
          newState.push(item)
        }
        if (index === array.length - 1) {
          that.state.bucket.goods = newState
        }
      })
    },
    updateCurse (state, course) {
      let updatedGoods = []
      let that = this
      this.state.goods.forEach(function (goods, index, array) {
        let oldPrice = goods.price
        goods.price = Math.round(goods.originalPrice * course * 100) / 100
        if (oldPrice > goods.price) {
          goods.priceStatus = 'down'
        } else {
          goods.priceStatus = 'up'
        }
        updatedGoods.push(goods)
        if (index === array.length - 1) {
          that.state.goods = updatedGoods
        }
      })
      let newTotal = 0
      this.state.bucket.goods.forEach(function (goods, index, array) {
        let calculated = Number(goods.price * goods.inBucketCount).toFixed(2)
        newTotal = Number(parseFloat(newTotal) + parseFloat(calculated)).toFixed(2)
        if (index === array.length - 1) {
          that.state.bucket.total = newTotal
        }
      })
    }
  }
})

export default store
