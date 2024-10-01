<template>

  <label  for="{{name}}" class="my-6 relative block bg-stone-50 ">
    <input :value="value" @input="updateInput"
        type="text"
        id="{{name}}" name="{{name}}"
        class=" block px-2.5 pb-4 pt-6 w-full text-xl text-gray-800 bg-stone-50  rounded-t-lg border-l border-t border-r border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-purple-600 peer"
        placeholder="" />

    <span class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-stone-50  px-2   text-stone-500 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-xl peer-focus:top-0 peer-focus:text-sm">
    {{ label }}
  </span>
  </label>
 
</template>

<script>
export default {
name:'input-text',

  mounted() {
    this.label= this.name.charAt(0).toUpperCase() + this.name.slice(1);
  },

  data() {
    return {
      label:''
    }
  },

  props: {
    name:{type:String,default:''},
    value:[String,Number]
  },

  methods : {
    updateInput(event) {
      this.$emit('update:value',event.target.value)
    }
  }



}
</script>

<style  >

</style>