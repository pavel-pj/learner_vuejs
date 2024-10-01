<template>
  <div class="rounded-2xl bg-stone-100  w-full px-4 py-2 my-2 mx-auto "   >
    <div class="text-medium text-xl py-2 ">{{post.title}}</div>
    <div class="text-medium text-xl py-2 ">{{post.text}}</div>
<!--
    <btn-simple @click="removeItem" >
      Удалить
    </btn-simple>
-->
    <btn-simple @click="openDialog" >
      Удалить Dialog
    </btn-simple>


  </div>
</template>

<script>
 

export default {



  props: {

    post: {
      type:Object,
      required:true

    }

  },
  methods : {

    openDialog() {
      console.log('List Item id :' +this.post.id)
      console.log('List Item title :' +this.post.text)
      this.$emit('dialog',this.post.id)
    },

    removeItem() {
      console.log('Item')
      this.$emit('remove',this.post)

    }
  }

}
</script>

<style >

</style>