<script setup>
import { ref, computed } from "vue";
const title = 'Using Laravel with a VEU app';
const arrayFrutas = [
    {
        name: 'Apple',
        price: '$1.90',
        description: 'An Apple'
    },{
        name: 'Orange',
        price: '$3.50',
        description: 'An Orange Orange'
    },{
        name: 'Banana',
        price: '$.50',
        description: 'A single Banana'
    }
    ];
const entero = ref(0);
const arrayFavoritos = ref([]);
const incrementar = () => (entero.value++);
const decrementar = () => (entero.value--);
const reiniciar = () => (entero.value = 0);
const fav = () => (arrayFavoritos.value.push(entero.value));
const colors = computed(() => {
    if(entero.value==0){
        return "color:black;";
    }
    if(entero.value>0){
        return "color:green;";
    }
    if(entero.value<0){
        return "color:red;";
    }
});
const ena = computed(() => {
    //console.log(arrayFavoritos.value[0]);
    return (arrayFavoritos.value.find((num) => num === entero.value) != undefined) ? true : false;
});
</script>
<template>
    <h1>Laravel 9 + Veu 3</h1>
    <hr>
    <h3>{{ title }}</h3>
    <hr>
    <ol>
        <li v-for="fruta in arrayFrutas" :key="fruta.name">OFFERT! - 3 {{fruta.name}} FOR {{fruta.price}}</li>
    </ol>
    <h1 :style="colors">{{ entero }}</h1>
    <button @click="incrementar">Aumentar</button> <br>
    <button @click="decrementar">Restar</button> <br>
    <button @click="reiniciar">Reiniciar</button> <br>
    <button :disabled="ena" @click="fav">Favorito</button> <br>
    <ul>
        <li v-for="favs in arrayFavoritos">{{ favs }}</li>
    </ul>
</template>
<style>

</style>
