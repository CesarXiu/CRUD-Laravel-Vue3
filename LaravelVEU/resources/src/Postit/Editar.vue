<script setup>
    import {ref} from 'vue';
    const Postit = ref[{tarea:"", descripcion:""}]
    async function mostrarBlog(){
            await axios.get(`/api/postit/${$route.params.id}`).then(response=>{
                const { tarea, descripcion } = response.data
                Postit.tarea = tarea
                Postit.descripcion = descripcion
            }).catch(error=>{
                console.log(error)
            })
        }
    async function actualizar(){
        await axios.put(`/api/postit/${$route.params.id}`,Postit).then(response=>{
            $router.push({name:"Mostrar"})
        }).catch(error=>{
            console.log(error)
        })
    }
    mostrarBlog()
</script>
<template>
    <div id="editar">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h4>Editar PostIt</h4></div>
                    <div class="card-body">
                        <form @submit.prevent="actualizar">
                             <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label>Tarea</label>
                                        <input type="text" class="form-control" v-model="Postit.tarea">
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
    
                                    <div class="form-floating">
                                    <textarea class="form-control" id="floatingTextarea2" v-model="Postit.descripcion" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Descripcion</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </div>                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>