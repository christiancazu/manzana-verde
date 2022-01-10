<template>
<div
  class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50"
  :class="{'hidden': !isActive}"
>
  <!-- modal -->
  <div class="bg-white rounded shadow-lg w-11/12">
    <!-- modal header -->
    <div class="border-b px-4 py-2 flex justify-between items-center">
      <h3 class="font-semibold text-lg">
        Confirmación
      </h3>
      <button
        class="text-black close-modal"
        @click="handleCloseModal"
      >
        &cross;
      </button>
    </div>
    <!-- modal body -->
    <div class="p-3">
      <div class="text-lg text-green">
        {{ plateName }}
      </div>
      <div>
        ¿Está seguro de eliminar esta plato de la orden?
      </div>
      <div v-if="isLunch">
        ¡Esta acción eliminará las demás ordenes de ensalada!
      </div>
    </div>
    <div class="flex justify-end items-center w-100 border-t p-3">
      <button
        class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1 close-modal"
        @click="handleCloseModal"
      >
        Cancelar
      </button>
      <button
        class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white"
        @click="handleConfirmDelete"
      >
        Eliminar
      </button>
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
    isLunch: Boolean,
    plateName: {
      type: String,
      default: ''
    }
  },

  emits: ['update:is-active', 'confirm:delete'],

  setup (props, { emit }) {
    function handleCloseModal () {
      emit('update:is-active', false)
    }

    function handleConfirmDelete () {
      emit('confirm:delete')
    }

    return {
      handleCloseModal,
      handleConfirmDelete
    }
  }
})
</script>
