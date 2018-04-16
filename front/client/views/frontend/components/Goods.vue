<template>
  <div>
    <table class="table is-bordered">
      <thead>
      <tr>
        <th>Название</th>
        <th>Цена (рубли)</th>
        <th>Остаток</th>
        <th>Действие</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="goods in group.goods" :key="goods.id">
        <td>{{goods.title}}</td>
        <td :class="{ upPrice: goods.priceStatus === 'up',  downPrice: goods.priceStatus === 'down' }">
          {{goods.price}}
        </td>
        <td>{{goods.count}}</td>
        <th>
          <button class="button is-info" @click="addGoodsToBucket(goods.id)"> Положить в корзину </button>
        </th>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  export default {
    props: {
      group: Object
    },
    methods: {
      addGoodsToBucket (goodsId) {
        this.$store.commit('addGoodsToBucket', goodsId)
      }
    }
  }
</script>

<style scoped>
  th, td {
    text-align: center;
  }
  .upPrice {
    background-color: #ff837d;
  }
  .downPrice {
    background-color: #c3ff87;
  }
</style>
