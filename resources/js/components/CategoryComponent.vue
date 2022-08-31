<template>
    <div class="content" v-if="category">
        <h1>{{ category.name }}</h1>
        <div>{{ category.description }}</div>
        <div>{{ category }}</div>
    </div>
    <div class="content" v-else>
        <h3>Не стал делать отдельный запрос на бэке для получения данных конкретной новости потому-что не было описано в задании, и поэтому при перезагрузке этой страницы нет данных. Просто перейдите на главную.</h3>
    </div>
</template>

<script>
import { onMounted, defineComponent, ref } from 'vue'

export default defineComponent({
  name: 'CategoryComponent',
  props: {
      id: Number,
      category: Object
  },
  setup () {
    // const news = ref(null)
    // onMounted(() => {
    //     axios
    //     .get('http://localhost/back/api/rbk-parser')
    //     .then((response) => {
    //         news.value = response.data;
    //     })
    // })
    return {
      // news
    }
  }
})
</script>

<style>
.content {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.image {
    width: 500px;
    height: 500px;
}
</style>
