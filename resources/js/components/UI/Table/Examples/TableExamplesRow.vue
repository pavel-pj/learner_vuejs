<template>


  <div scope="row" class="bg-white border-b py-6 md:py-6 text-2xl md:text-base font-medium  text-stone-700
    block  ">


    <div class=" pb-4 ">
      
      {{item.example}}
    </div>

    <div  class=" flex justify-between">

      <btn-edit :class="{'inline-block ml-2 left-0 text-left ':true}" @click="showEditForm"/>
      <btn-delete @click="showModalDelete"   />
    </div>



  </div>


</template>

<script>
export default {
  name:'table-examples-row',


  props: {

    item:{
      type:Array,
      required:true
    },


  },
  methods:{
    showModalDelete(){
      this.$emit('showModalDelete', this.item.id )

    },

    showEditForm() {


      this.$emit('showEditForm', this.item.id)
    }



  }




}
</script>

<style >

</style>