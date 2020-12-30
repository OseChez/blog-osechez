  <template>
   <div class="col-md-10">
            <div class="card">
                <div class="card-header">Escribe tu Post </div>
                <div class="card-body">
                      <form action="" method="post" v-on:submit.prevent="newPost()">
                      <div class="form-group">
                        <select name="topic_id" id="" class="form-control"
                                v-model="topic_id"> 
                          <option v-for="topic in topics" v-bind:value="topic.id"
                                  :key="topic.id">{{ topic.title_topic }}
                          </option>
                        </select>
                      </div>
                      <div class="form-group">
                        <div class="row">
                         <div class="col-sm-3">
                           <label for="post_preview">Post previo</label>
                           <input type="number" name="next" v-model="preview" id="post_preview" class="form-control"/>
                         </div>
                         <div class="col-sm-3">
                           <label for="post_next">Próximo Post</label>
                           <input type="number" name="preview" v-model="next" id="post_next" class="form-control"/>
                         </div>
                         <div class="col-sm-3">
                          <label>	
		           <input type="checkbox" v-model="isserie"/>
		             Es un Post en Serie
                           </label>
                         </div>
                        </div>
                      </div>
                      <div class="form-group">
                       <input type="text" name="titulo" v-model="titulo" class="form-control"/>
                      </div>
                      <div class="form-group">
                        <textarea class="form-control"  name="contenido" 
                                  id="contenido"  placeholder="Escribe tu post..." 
                                  required="required"
                                  style="height:350px" 
                                  v-model="contenido">
                        </textarea>
                      </div>
                          
                       <div class="form-group">
                         <button type="submit" class="btn btn-info">Publicar post</button>
                        </div>
                      </form>
                   
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        props:['topics'],
        data(){
          return{
           topic_id:0, 
           titulo:'',
           contenido:'',
           isserie:false,
           preview:0,
           next:0
          }
        },
        mounted(){
          
        },
        methods:{
            newPost(){//
              const params ={
               'id':0,
               'topic_id':this.topic_id,
               'titulo':this.titulo,
               'contenido':this.contenido,
               'isserie':this.isserie,
               'preview':this.preview,
               'next':this.next
              };
              axios.post('/posts',params)
                    .then((response)=>{
                      const message = response.data.original.message;
                      const id  = response.data.original.data;
                       if(message === "El Post ha sido Registrado éxitosamente."){
                        params.id=id;
                        const post    = params;
                        this.$emit('new',post);
                      }else{}
                      });
                    
              this.titulo='';
              this.contenido='';
            }
        }
    }
</script>