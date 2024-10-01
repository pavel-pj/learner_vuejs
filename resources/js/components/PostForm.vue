<template>
  <form class="max-w-sm mx-auto" @submit.prevent>
    <div class="mb-5">

      <my-input
          v-model:value="post.title"
          id="title"
          name="title" placeholder="Title"
          />
    </div>

    <div class="mb-5">

      <my-input
             v-model:value="post.text"
             placeholder="Text"
             id="text" name="text" />

    </div>

    <btn-simple @click="createPost" >
      Создать
    </btn-simple>


  </form>
</template>

<script>

export default {



  data() {
    return {
      post: {
        title:'',
        text:'',
      }
    }
  },
  methods: {

    createPost(){
      this.post.id=Date.now()
      this.$emit('create',this.post)
      this.post = {
        title:'',
        text:'',
      }

    }


  }





}
</script>

<style >

</style>