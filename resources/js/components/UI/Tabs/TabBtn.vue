<template>
<button v-if="selected" class="text-lg text-medium text-blue-500 inline-block p-4 border-b-2 border-b-blue-500 rounded-t-lg">
     <slot></slot>
  </button>
  <button v-else class="text-lg text-medium text-stone-500 inline-block p-4 rounded-t-lg hover:text-stone-600 hover:border-gray-300">
    <slot></slot>
  </button>

</template>

<script>
export default {

  name:'tab-btn',
  props :{
    selected:{
      type:Boolean,
      default:false
    }
  }

}
</script>
