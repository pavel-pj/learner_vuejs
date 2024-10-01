<template>
  <button disabled type="button"
          class="text-white mx-auto text-base h-10
         mr-0 block  bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full  px-5   text-center ">
    Delete
  </button>

</template>

<script>
export default {

  name:'btn-delete',
  methods:{

    showModalDelete() {

      this.$emit('showModalDelete','id')

    }
  }


}
</script>

<style  >

</style>