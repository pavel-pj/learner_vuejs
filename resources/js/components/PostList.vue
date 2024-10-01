<template>


<div v-if="posts.length>0">
        <list-item
            v-for="post in posts"
            :post="post"
            :key="post.id"

            @dialog="getDialog"
            @remove="$emit('remove',post)"
          />
        <div class="bg-lime-200">{{testv}}</div>
</div>
<div v-else class="text-rose-800 my-4 ">
  Список публикаций пуст
</div>

</template>




<script>
import ListItem from "@/components/ListItem.vue";

export default {

  components: {
    ListItem
  },

  props: {

    posts: {
      type: Array,
      required: true,

    },


  },

    methods : {
      getDialog(id){
        this.$emit('openDialog', id)
        console.log('Post List id :' +id)

      }

    }





}
</script>

<style >

</style>