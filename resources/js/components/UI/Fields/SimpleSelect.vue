<template>
  <div class="custom-select" :tabindex="tabindex" @blur="open = false">

    <div class="selected" :class="{ open: open }" @click="open = !open">
      {{ selected }}
    </div>
    <div class="items" :class="{ selectHide: !open }">
      <div
          v-for="(option, i) of options"
          :key="i"
          @click="
          selected = option;
          open = false;
          $emit('input', option);
        "
      >
        {{ option }}
      </div>
    </div>
  </div>

</template>

<script>
export default {
  name:'simple-select',

  props: {
    options: {
      type: Array,
      required: true,
    },
    default: {
      type: String,
      required: false,
      default: null,
    },
    tabindex: {
      type: Number,
      required: false,
      default: 0,
    },
  },
  data() {
    return {
      selected: this.default
          ? this.default
          : this.options.length > 0
              ? this.options[0]
              : null,
      open: false,
    };
  },
  mounted() {
    this.$emit("input", this.selected);
  },
};
</script>

<style scoped>
.custom-select {
  position: relative;
  width: 100%;
  text-align: left;
  outline: none;
  height: 47px;
  line-height: 47px;
}

.custom-select .selected {
  background-color: #f9fafb;
  border-radius: 6px;
  border: 1px solid #d1d5db;
  color: #1f2937;
  padding-left: 1em;
  cursor: pointer;
  user-select: none;
}

.custom-select .selected.open {
  border: 1px solid purple;
  border-radius: 6px 6px 0px 0px;
}

.custom-select .selected:after {
  position: absolute;
  content: "";
  top: 22px;
  right: 1em;
  width: 0;
  height: 0;
  border: 5px solid transparent;
  border-color: #7e22ce transparent transparent transparent;
}

.custom-select .items {
  color: #1f2937;
  border-radius: 0px 0px 6px 6px;
  overflow: hidden;
  border-right: 1px solid purple;
  border-left: 1px solid purple;
  border-bottom: 1px solid purple;
  position: absolute;
  background-color: #f9fafb;
  left: 0;
  right: 0;
  z-index: 1;
}

.custom-select .items div {
  color: #1f2937;
  padding-left: 1em;
  cursor: pointer;
  user-select: none;
}

.custom-select .items div:hover {
  background-color: #e5e7eb;
}

.selectHide {
  display: none;
}
</style>
