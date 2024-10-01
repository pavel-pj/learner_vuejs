<template>

<div class="mx-auto block rounded-xl">
    <div class="flex items-center -space-x-px h-22 text-xl justify-center rounded-xl">
      <button class="flex items-center rounded-l-xl justify-center px-3 h-12 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 "

            type="button"
            @click="onClickFirstPage"
            :disabled="isInFirstPage"
            :class="{ 'bg-white text-gray-200 hover:bg-white hover:text-gray-200' :isInFirstPage}"
        >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
        </svg>

      </button>


      <button class="flex items-center justify-center px-3 h-12 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"

            type="button"
            @click="onClickPreviousPage"
            :disabled="isInFirstPage"
            :class="{ 'bg-white text-gray-200 hover:bg-white hover:text-gray-200' :isInFirstPage}"
        >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
        </svg>

      </button>


      <!-- Visible Buttons Start -->

      <button class="flex items-center justify-center px-4 h-12 leading-tight text-gray-500 bg-white border  "
          v-for="page in pages"
          :key="page.name"

          :class="{

                      ' bg-purple-600 text-white ': isPageActive(page.name)  }"


            type="button"
            @click="onClickPage(page.name)"
            :disabled="page.isDisabled"


        >
          {{ page.name }}
        </button>


      <!-- Visible Buttons End -->

      <button class="flex items-center justify-center px-3 h-12 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"

            type="button"
            @click="onClickNextPage"
            :disabled="isInLastPage"
        >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>

      </button>


      <button class="flex items-center rounded-r-xl justify-center px-3 h-12 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"

            type="button"
            @click="onClickLastPage"
            :disabled="isInLastPage"
        >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
        </svg>

      </button>

    </div>
</div>
  </template>

  <script>
    export default {
      name: 'pagination-pages',


      props: {
        maxVisibleButtons: {
          type: Number,
          required: false,
          default: 3
        },
        totalPages: {
          type: Number,
          required: true
        },
         
        currentPage: {
          type: Number,
          required: true
        }
      },


      computed: {
        startPage() {
          // When on the first page
          if (this.currentPage === 1) {
            return 1;
          }

          // When on the last page
          if (this.currentPage === this.totalPages) {
            return this.totalPages - this.maxVisibleButtons;
          }

          // When inbetween
          return this.currentPage - 1;
        },
        pages() {
          const range = [];

          for (
              let i = this.startPage;
              i <= Math.min(this.startPage + this.maxVisibleButtons - 1, this.totalPages);
              i++
          ) {
            range.push({
              name: i,
              isDisabled: i === this.currentPage
            });
          }

          return range;
        },

        isInFirstPage() {
          return this.currentPage === 1;
        },
        isInLastPage() {
          return this.currentPage === this.totalPages;
        },

      },

      methods: {
        onClickFirstPage() {
          this.$emit('pagechanged', 1);
        },
        onClickPreviousPage() {
          this.$emit('pagechanged', this.currentPage - 1);
        },
        onClickPage(page) {
          this.$emit('pagechanged', page);
        },
        onClickNextPage() {
          this.$emit('pagechanged', this.currentPage + 1);
        },
        onClickLastPage() {
          this.$emit('pagechanged', this.totalPages);
        },
        isPageActive(page) {
          return this.currentPage === page;
        }
      }


    }


</script>

<style>


</style>