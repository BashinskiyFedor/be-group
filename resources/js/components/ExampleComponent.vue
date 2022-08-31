<template>
    <div class="control-container">
        <div class="d-flex">
            <label>Поиск на названию:</label>
            <input class="mr-2" type="text" v-model="name"/>
        </div>

        <div class="d-flex">
            <label>Кол-во на странице</label>
            <input class="mr-2" type="number" max="9" min="1" v-model="pageSize"/>
        </div>
        <button @click="get">Обновить</button>
    </div>
    <div class="category-container">
        <div v-for="item in categoryes" class="category" :key="item.id">
            <router-link :to="{ name: 'category', params: { id: item.id, category: JSON.stringify(item) }}">
                <div>{{item.id}}</div>
                <div>{{item.name}}</div>
                <div>{{item.description}}</div>
            </router-link>
        </div>
    </div>
</template>

<script>
import { onMounted, defineComponent, ref } from 'vue'

export default defineComponent({
  name: 'ExampleComponent',
  setup () {
    const categoryes = ref(null)
    const pageSize = ref(9)
    const name = ref('')
    const get = () => {
        axios
        .get('/back/api/categoryes', { params: {
            "pageSize": pageSize.value,
            'filter[name]': name.value
        } })
        .then((response) => {
            categoryes.value = response.data.data;
        })
    }
    onMounted(() => {
        get();
    })
    return {
        categoryes,
        pageSize,
        name,
        get
    }
  }
})
</script>

<style lang="scss">
.category {
    background-color: rgb(167, 229, 233);
    margin-top: 50px;
    margin-right: 20px;
    margin-left: 20x;
    border-radius: 10px;
    width: 600px;
    cursor: pointer;
}

.category-container {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    width: 100%;
}

input {
	width: 250px;
	height: 35px;
	border-radius: 3px;
	border: 1px solid #CCCCCC;
	font-size: 14px;
	padding-left: 10px;
	transition: .3s;
	&::-webkit-input-placeholder {
		font-size: 14px;
    }
	&:focus {
		border: 1px solid #286EFA !important;
		outline-width: 0;
    }
}

button {
    color:#CCCCCC;
    background-color: #222446;
    width: 250px;
	height: 35px;
	border-radius: 3px;
}

.control-container {
    display: flex;
    flex-direction: row;
    justify-content: end;
    align-items: end;
    margin-right: 5%;
    margin-left: 5%;
    margin-top: 50px;
}

.mr-2 {
    margin-right: 5px;
}

.d-flex {
    display: flex;
    flex-direction: column;
}
</style>
