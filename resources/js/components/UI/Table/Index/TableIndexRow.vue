<template>


  <div scope="row" class="bg-white border-b py-6 md:py-6 px-6 md:px-8 md:pr-12 text-2xl md:text-base font-medium  text-stone-700
    block md:grid grid-cols-12 grid-flow-col ">


    <div class="col-span-6 pb-4 ">
      {{item.word}}

    </div>
    <dov class="col-span-4 pb-4 flex flex-wrap">


         <slot>

         </slot>


    </dov>

    <div  class="col-span-2  flex ">

         <btn-edit @click="showEditForm"/>
         <btn-delete @click="showModalDelete"   />
    </div>



  </div>


</template>

<script>
export default {
  name:'table-index-row',


  props: {
  mainColumn:{type:String,required: true},
  item:{
      type:Array,
      required:true
    },


  },
  methods:{
    showModalDelete(){
      this.$emit('showModalDelete', this.item.id )
     // console.log('Row')
     //  console.log(this.word.id)
    },

    showEditForm() {

    
      this.$emit('showEditForm', this.item.id)
    }



  }




}
</script>

<style >

</style>