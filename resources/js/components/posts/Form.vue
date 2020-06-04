<template>
    <div>

        <center>
            <h2 v-if="$route.params.slug">Update Post</h2>
            <h2 v-else>Create Post</h2>
        </center>

        <el-form :model="post" status-icon ref="ruleForm" label-width="120px" class="demo-ruleForm">
          <el-form-item label="Title" prop="pass">
            <el-input type="text" v-model="post.title" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item label="Content" prop="checkPass">
            <el-input type="textarea" v-model="post.content" :rows="4" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item label="Status" prop="age">
            <el-switch v-model="post.status"></el-switch>
          </el-form-item>
          <el-form-item>
            <el-button type="primary" v-if="$route.params.slug" @click="updatePost()">Update</el-button>
            <el-button type="primary" v-else @click="createPost()">Create</el-button>
          </el-form-item>
        </el-form>


        
    </div>
</template>

<script>
    export default {
        data(){

            return{

                post: {
                    title: '',
                    content: '',
                    status: false,
                }
            }

        },

        mounted() {

            if(this.$route.params.slug){

                this.getPost();
            }
            console.log('Component mounted.')
        },

        methods: {


            getPost(){

              axios.get('api/posts/'+this.$route.params.slug)
                .then((response)=>{
                  this.post.title = response.data.data.title;
                  this.post.content = response.data.data.content;
                  this.post.status = response.data.data.status;
                })

                .catch((error)=>{

                })
            },

            createPost(){

              let payload = this.preparePayload();

                axios.post('api/posts', payload)
                .then((response)=>{
                  this.$router.push({name: 'index'});
                })

                .catch((error)=>{

                })


            },

            updatePost(){

              let payload = this.preparePayload();

              axios.put('api/posts/'+this.$route.params.slug, payload)
              .then((response)=>{
                this.$router.push({name: 'index'});
              })

              .catch((error)=>{

              })

            },

            preparePayload(){

              let payload = {

                title: this.post.title,
                content: this.post.content,
                status: this.post.status,

              }

              return payload;

            }
        }
    }
</script>
