<template>

  <select class="form-control "
          name="choices-multiple-remove-button[]"
          id="choices-multiple-remove-button"
          placeholder=""
          multiple>
    


    <option v-for="topic in topics"   :value="topic.id"   > {{topic.name}}   </option>

  </select>

</template>

<script>
export default {
  name:'choice-multi-select',
   
  props : {
    topics: {type:Array}
  }


}
</script>

<style lang="scss" scoped>

</style>