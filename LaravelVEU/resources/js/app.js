import './bootstrap';
import { createApp  } from 'vue';
import VueAxios from 'vue-axios';
import axios  from 'axios';
import { createRouter, createWebHistory } from 'vue-router';
//const App = () => import('../src/App.vue')
import Crud from '../src/crud.vue'
import NavBar from '../src/navBar.vue'
import postits from '../src/postits.vue'
import Crear from '../src/Postit/Crear.vue'
import Editar from '../src/Postit/Editar.vue'
import Mostrar from '../src/Postit/Mostrar.vue'
//createApp(App).mount('#app');
export const routes = [
    {
        name : 'crud',
        path : '/',
        component : Crud 
    },
    {
        name : 'Crear',
        path : '/create',
        component : Crear 
    },
    {
        name : 'Editar',
        path : '/edit/:id',
        component : Editar
    },
    {
        name : 'Mostrar',
        path : '/showPost',
        component : Mostrar
    },
]
const VueRouter = new createRouter({
    history : createWebHistory(),
    routes: routes
});
createApp(Crud).use(VueRouter).use(VueAxios,axios).mount("#crud")
createApp(NavBar).mount('#navBar');
createApp(postits).use(VueRouter).mount('#postits');
//createApp(Editar).use(VueRouter).mount('#editar');

