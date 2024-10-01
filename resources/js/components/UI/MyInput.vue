<template>
  <input type="text"
         :value="value"  @input="updateInput"
         class=" block px-2.5 pb-4 pt-6 w-full text-xl text-gray-800 bg-stone-50  rounded-t-lg border-l border-t border-r border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-purple-600 peer" />
</template>

<script>
export default {

  name:'my-input',

  props: {
    value: {
      type:[String,Number]
    }
  },

  methods: {

    updateInput(event) {
      this.$emit('update:value',event.target.value)
    }

  }

}
</script>

<style  >

</style>