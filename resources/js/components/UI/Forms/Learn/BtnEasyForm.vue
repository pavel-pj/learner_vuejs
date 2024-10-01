<template>
  <!--
          class="bg-rose-600 border-rose-800  border-2 hover:bg-rose-700  focus:ring-rose-300 text-white
          cursor-pointer font-medium rounded-full text-m px-8 py-3 text-center me-5 mb-4 ">
          -->
  <button type="submit" @click="clickBtn"

  class="text-blue-700 text-base px-4 py-4 " >
  <slot>

 </slot>

  </button>
</template>

<script>
export default {
  name:'btn-easy-form',

  props:{
    item:{type:Array,required:true}
  },
  methods: {
    clickBtn() {
      this.$emit('checkId',this.item.id)
    }
  }


}
</script>
