<template  >
  <div class='tab' v-show='isActive'>
   
    <slot></slot>
  </div>
</template>

<script>
export default {

  name:'tab',

  props: {
    title: {
      type: String,
      default: 'Tab'
    }
  },
  data () {
    return {
      isActive: true
    }
  }
}
</script>

<style lang="css">

</style>