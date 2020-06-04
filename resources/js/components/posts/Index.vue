<template>
  <div>

    <center>
      <h4>Posts</h4>
    </center>
    <br>

    <button type="button" class="btn btn-primary" @click="goToCreate()" style="float:right;margin-bottom: 10px">Create</button>

    <table class="table table-stripped">
      <thead>
        <th>Title</th>
        <th>Slug</th>
        <th>Status</th>
        <th>Actions</th>
      </thead>
      <tbody>
        <tr v-for="post in posts">
          <td>{{post.title}}</td>
          <td>{{post.slug}}</td>
          <td v-if="post.status">published</td>
          <td v-else>draft</td>
          <td>
            <div>

              <button type="button" class="btn btn-primary" @click="goToEdit(post.slug)"> Edit</button>

              <button type="button" class="btn btn-danger" @click="deletePost(post.id)"> Delete</button>
              
            </div>
          </td>
        </tr>
      </tbody>
    </table>
      
  </div>
</template>

<script>
  export default {

    data(){

      return{
        posts: ''

      }
    },
    mounted() {
        console.log('Component mounted.');
        this.getAllPosts();
    },

    methods: {

      getAllPosts(){

        axios.get('api/posts')
        .then((response)=>{

          console.log('');
          this.posts = response.data.data;
        })

        .catch((error)=>{

        })
      },

      goToCreate(){

        this.$router.push({name: 'create'});
      },

      goToEdit(slug){
        this.$router.push({ name: 'edit', params: {slug: slug} });
      },


      deletePost(id){

        axios.delete('api/posts/'+id)
        .then((response)=>{
          this.getAllPosts();
          
        })

        .catch((error)=>{

        })

      }
    }
  }
</script>
