import {createRouter} from 'vue-router'
import CategoryComponent from './components/CategoryComponent.vue';
import ExampleComponent from './components/ExampleComponent.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: ExampleComponent
  },
  {
    path: '/category/:id',
    name: 'category',
    component: CategoryComponent,
    props: (route) => ({
        id: Number(route.params.id),
        news: route.params.category ? JSON.parse(route.params.category) : null
    }),
  }
]

export default function (history) {
  return createRouter({
    history,
    routes
  })
}
