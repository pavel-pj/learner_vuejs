<template>


  <div class="block  outline-1 outline-gray-200 outline mb-4 bg-white py-6  rounded-2xl "  >
    <div class="px-8 pb-6 text-5xl font-bold  text-fuchsia-800 ">{{ info.title }}</div>
    <div class=" border-t border-black-200"></div>
    <div class=" my-8">
      <div class="px-8  text-xl text-zinc-900   italic"> {{ info.description }}</div>
      <div class="px-4 my-2 flex flex-wrap">



        <btn-easy-form

            :class="{'bg-stone-50 text-3xl font-medium md:text-base rounded-full my-3 border mx-auto  border-stone-200 py-6 px-12': info.type==='box'  }"
            v-for="item in items" :item="item" :key="item.id" @checkId="checkId">

          <span v-if="info.type==='topic'">
             #{{item.name}} ({{item.total}})
          </span>
          <span v-if="info.type==='box'">
              Box {{item.number}} ({{item.total}})
          </span>

        </btn-easy-form>




      </div>
    </div>
  </div>

</template>

<script>

export default {
  name: 'easy-form',

  props:{
    info:{type:Array,required:true},
    items:{type:Array,required:true},

  },

  data(){
    return {

    }
  },

  methods: {

    checkId(id){

      this.$emit('checkId',{id:id,type:this.info.type})


    }

  },
 


}
</script>
