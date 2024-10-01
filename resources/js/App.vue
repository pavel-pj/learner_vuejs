<template>

  <div class="rounded-2xl bg-white  w-full  mt-12   md:w-4/12 px-4 py-8 md:p-8 mx-auto "   >


    <button
        type="button"
        @click="openDialog2"
        class="rounded-md bg-rose-600 px-4 py-2 text-sm font-medium text-white hover:bg-rose-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75"
    >
      Open dialog
    </button>





    <post-form @create="createPost"/>

   <post-list :posts="posts" :testv="testv" @remove="deletePost" @openDialog="openDialogItem" />
<!--
    <confirm-dialog  ref="childRef" :propsOpen="propsOpen" />

    <confirm-dialog ref="childRef" :val1="val1"  @confirmRemove="removeItem"  />-->

    <!--
    <my-dialog  v-model:isOpen="isModalOpen2" >
        <post-form @create="createPost"/>
    </my-dialog>
-->

  </div>

</template>

<script>
import PostList from "@/components/PostList.vue";
import PostForm from "@/components/PostForm.vue";
 


export default {
  components : {
    PostList,PostForm
  },

  data()  {
    return   {

      posts: [
         //{id:1,title: 'This is the First element',text:"How can i go there"}
      ],
      postToDelete:'',
      isModalOpen: false,
      val1:0,
      isModalOpen2:false

     }
  },

  methods: {

     createPost(post) {

      console.log(post)
      this.posts.push(post)

     },

    openDialog() {
      const childComponent = this.$refs.childRef;

      if (childComponent) {
        childComponent.openModal();
      } else {
        console.error
        ('Child component reference is undefined.');
      }
    },

      openDialogItem(id){
        this.val1=id
        this.openDialog()


      },


    openDialog2() {

       this.isModalOpen2=true



    },



    deletePost(post){
       console.log('App')
       //console.log(post)
      this.postToDelete=post.id
       //this.posts=this.posts.filter( p => p.id !==post.id)

    },

    deleter(msg) {
      this.posts=this.posts.filter( p => p.id !==this.postToDelete.id)
    },

    removeItem(val1){
       console.log('remover'+ val1)
      this.posts=this.posts.filter( p => p.id !==val1)

    }


  }




}
</script>

<style>

</style>