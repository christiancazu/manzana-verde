<template>
<div
  class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50"
  :class="{'hidden': !isActive}"
>
  <div class="bg-transparent rounded shadow-lg w-11/12">
    <div class="flex">
      <div class="flex flex-1 justify-center relative">
        <button
          class="text-white close-modal ml-auto bg-gray-500 rounded-full px-2.5 py-1 absolute right-1 top-1"
          @click="handleCloseModal"
        >
          X
        </button>
        <img
          alt="image"
          class="object-cover"
          :src="`${$mediaUrl}/${imgUrl}`"
        >
      </div>
    </div>
  </div>
</div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'PreviewImageModal',

  props: {
    isActive: Boolean,
    imgUrl: {
      type: String,
      default: ''
    }
  },

  emits: ['update:is-active'],

  setup (props, { emit }) {
    function handleCloseModal () {
      emit('update:is-active', false)
    }

    return {
      handleCloseModal
    }
  }
})
</script>
