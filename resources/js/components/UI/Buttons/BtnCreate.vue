<template>
  <button type="submit"
          id="btn-submit"
          class=" mb-4 text-white bg-purple-700 hover:bg-purple-800 hover:text-white focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-l px-8 py-3 text-center ">
    <slot></slot>
  </button>
</template>

<script>
export default {
  name:'btn-create'
}
</script>

<style lang="scss" scoped>

</style>
