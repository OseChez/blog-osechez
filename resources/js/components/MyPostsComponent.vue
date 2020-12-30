<template>
   <div class="row justify-content-center">
        <formpost-component :topics="topics" @new="addPost">
        </formpost-component> 
        <post-component v-for="(post,index) in posts" 
                       :key="post.id"
                       :post="post"
                       @update="updatePost(index,...arguments)"
                       @delete="deletePost(index)">
        </post-component>
    </div>
</template>

<script>
    export default {
       data(){
         return {
           posts:[],
           topics:[]
         }
       },
       mounted(){
         axios.get('/publicaciones').then((response)=>{
           this.posts = response.data;
         });
         axios.get('/temas').then((response)=>{
           this.topics = response.data;
         });
       },
       methods:{
         addPost(post){
            this.posts.push(post)
         },
         updatePost(index,post){
          this.posts[index]=post;    
         },
         deletePost(index){
          this.posts.splice(index,1);    
         }
       }
    }
</script>