<template>
 <div>
   <table class="table is-bordered">
     <thead>
     <tr>
       <th>Название</th>
       <th>Количество (штук)</th>
       <th>Цена (рубли)</th>
       <th>Действие</th>
     </tr>
     </thead>
     <tbody>
     <tr v-for="goods in goodsInBucket" :key="goods.id">
       <td>{{goods.title}}</td>
       <td>{{goods.inBucketCount}}</td>
       <td :class="{ upPrice: goods.priceStatus === 'up',  downPrice: goods.priceStatus === 'down' }">
         {{goods.price}}
       </td>
       <td>
         <button class="button is-small" @click="addGoodsToBucket(goods.id)">+</button>
         <div class="button is-small" @click="removeGoodsFromBucket(goods.id)">-</div>
       </td>
     </tr>
     </tbody>
   </table>
   <div>
     Итого: <b>{{total}} руб.</b>
   </div>
 </div>
</template>

<script>
  export default {
    computed: {
      goodsInBucket () {
        return this.$store.getters.bucket.goods
      },
      total () {
        return this.$store.getters.bucket.total
      }
    },
    methods: {
      addGoodsToBucket (goodsId) {
        this.$store.commit('addGoodsToBucket', goodsId)
      },
      removeGoodsFromBucket (goodsId) {
        this.$store.commit('removeGoodsFromBucket', goodsId)
      }
    }
  }
</script>
