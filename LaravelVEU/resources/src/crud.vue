<script setup>
import {ref,computed, reactive} from 'vue'
    const postits = ref([]);
    const edit = ref(true)
    const create = ref(false)
    const id = ref(0)
    function mostrar(){
      axios.get('/api/postit').then(response=>{
      postits.value = response.data
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
    const postit = reactive({tarea:"",descripcion:""});
    const crear = computed( () => {
        axios.post('/api/postit',postit).then(response=>{
          mostrar()
        }).catch(error=>{
            console.log(error)
        })
    })
    const editar = computed(() => { return edit.value })
    const creator = computed(() => { return create.value })
    const actualizar = computed(() => {
      axios.put(`/api/postit/${id.value}`,postit).then(response=>{
              mostrar()
              edit.value = true
              create.value = false
        }).catch(error=>{
            console.log(error)
        })
    })
    const posEditar = computed(() => {
      postit.tarea = document.getElementById('tarea').value
      postit.descripcion = document.getElementById('descripcion').value 
      edit.value = false
      create.value = true
      //reiniciarForm
      return true
    })
    /* En proceso xd
    const reiniciarForm = computed(() => {
      postit.tarea = ''
      postit.descripcion = ''
      return true
    })*/
    function cargarEditor(tarea,descripcion,id_){
      document.getElementById('tarea').value = tarea
      document.getElementById('descripcion').value = descripcion
      id.value = id_
    }
    //-----------------------------
    function mostrarGroup(relation = ''){
      axios.get('/api/group/'+relation).then(response=>{
      console.log(response.data) 
      }).catch(error=>{ console.error(error)})
    }
</script>
<template>
      <div class="mx-auto p-2 gap-3 crud-vue">
        <div class="input-group flex-nowrap p-2">
            <span class="input-group-text">Tarea</span>
            <input type="text" v-model="postit.tarea" name="tarea" id="tarea" class="form-control" placeholder="Tarea a guardar" aria-label="tarea" aria-describedby="addon-wrapping-tarea">
        </div>
        <div class="input-group flex-nowrap p-2">
            <span class="input-group-text">Descripcion</span>
            <input type="text" v-model="postit.descripcion" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion de la tarea" aria-label="tarea" aria-describedby="addon-wrapping-descripcion">
        </div>
        <button :disabled="creator" @click='crear' class="btn btn-success position-relative top-0 start-50top-0 start-50"><i class="fa-solid fa-floppy-disk"></i></button>
        <button :disabled="editar" @click="actualizar" class="btn btn-info">Actualizar</button>
    </div>
    <div>
        <ol class="list-group list-group-numbered">
            <b>{{postits.value}}</b>
              <li v-for="postitCharged in postits" :key='postitCharged.id' class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">{{postitCharged.tarea}}</div>
                  {{ postitCharged.descripcion }}
                </div>
                <button @click="cargarEditor(postitCharged.tarea,postitCharged.descripcion,postitCharged.id), posEditar" class="btn btn-info m-1"><i class="fa-solid fa-pen"></i></button>
                <a type="button" @click="borrarPost(postitCharged.id)" class="btn btn-danger m-1"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <span class="badge bg-primary rounded-pill">{{postitCharged.id}}</span>
              </li>
            </ol>
    </div>
    <div>
      <div class="btn btn-danger" @click="mostrarGroup()">mostrar solo</div>
      <div class="btn btn-danger" @click="mostrarGroup('?included=postit&filter[name]=X')">mostrar completo</div>
    </div>
</template>
<style>
    .crud-vue{
        width: 500px;
    }
</style>
