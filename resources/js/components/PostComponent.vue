<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                   <p style="padding:1em; font-size:1.235rem">
                     {{ post.created_at }}
                   </p>
                   <div class="panel-body">
                   <div v-if="editMode" class="form-group">
                     <input type="text" name="editTitulo" class="form-control" v-model="post.titulo">
                    </div>
                    <textarea v-if="editMode" class="form-control"  name="editContenido" 
                            style="height:290px"
                            id="contenido"  placeholder="Edita tu post..." 
                            required="required" 
                            v-model="post.contenido">
                    </textarea>
                    <div v-else class="panel-body">
                      <p style="padding:12px">
                         {{post.titulo}}
                      </p>
                      </br>
                      <p style="padding:1em">
                         {{post.contenido}}
                      </p>
                  </div>
                </div>
                 </br>
                   <div class="panel-footer">
                     <button v-if="editMode" class="btn btn-success" v-on:click="onClickUpdate()">Guardar Cambios</button>
                     <button v-else class="btn btn-default" v-on:click="onClickEdit()">Editar</button>
                     <button  class="btn btn-danger" v-on:click="onClickDelete()">Eliminar</button>
                  </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {//
       props:['post'],
        data() {
           return {
             editMode:false
           };          
        },
       methods:{ 
         onClickDelete(){
            axios.delete(`/posts/${this.post.id}`).then(()=>{
               this.$emit('delete');
            });
           },
         onClickEdit(){
             this.editMode = true;
          },
         onClickUpdate(){
            const params={
              'id':this.post.id,
              'topic_id':this.post.topic_id,
              'titulo':this.post.titulo,
              'contenido':this.post.contenido,
              'created_at':this.post.created_at,
              'updated_at':this.post.updated_at,
              'published':this.post.published,
              'views':this.post.views
            };
             axios.put(`/posts/${this.post.id}`,params).then((response)=>{
               this.editMode = false;
               console.log(response);
               const post = response.data;
               this.$emit('update',post);
             });
          }
         }
    }
</script>
