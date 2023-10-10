<script setup>
    import {ref} from 'vue';
    const postits = ref([]);
    function mostrar(){
      axios.get('/api/postit').then(response=>{
      postits.value = response.data
      console.log('cargado',postits.value)
      }).catch(error=>{ postits.value = []})
    }
    mostrar()
    function borrarPost(id){
      if(confirm('¿Eliminar?')){
        axios.delete('/api/postit/'+id+'}').then(response => {
          mostrar();
        })
      }
    }
</script>
<template>
    <ol class="list-group list-group-numbered">
      <b>{{postits.value}}</b>
        <li v-for="postit in postits" :key='postit.id' class="list-group-item d-flex justify-content-between align-items-start">
          <div class="ms-2 me-auto">
            <div class="fw-bold">{{postit.tarea}}</div>
            {{ postit.descripcion }}
          </div>
          <router-link :to="{ name: 'Editar', params: { id: postit.id }}" class="btn btn-info m-1"><i class="fa-solid fa-pen"></i></router-link>
          <a type="button" @click="borrarPost(postit.id)" class="btn btn-danger m-1"><i class="fa fa-trash" aria-hidden="true"></i></a>
          <span class="badge bg-primary rounded-pill">{{postit.id}}</span>
        </li>
      </ol>
</template>