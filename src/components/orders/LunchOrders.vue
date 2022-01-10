<template>
<section class="lunch-wrap">
  <template
    v-for="order in orders"
    :key="order.id"
  >
    <div class="lunch-order">
      <div class="lunch-order__left">
        <img
          :src="`${$mediaUrl}/${order.plate.image_url}`"
          @click="handleViewPlateOpenModal(order)"
        >
        <div>
          <div
            class="lunch-order__left--name"
            @click="$emit('lunch:view', order)"
          >
            {{ order.plate.name }}
          </div>
          <div class="lunch-order__left--calories">
            {{ order.plate.calories }}kcal
          </div>
        </div>
      </div>
      <div
        class="lunch-order__right"
        @click="handleConfirmDeleteOpenModal(order)"
      >
        <img src="@/assets/icons/delete.svg">
      </div>
    </div>
    <hr>
  </template>

  <PreviewImageModal
    v-if="imgUrl"
    v-model:isActive="modal.isActivePreviewImage"
    :img-url="imgUrl"
  />

  <ConfirmDeleteModal
    v-if="plateName"
    v-model:isActive="modal.isActiveConfirmDelete"
    :is-lunch="isLunch"
    :plate-name="plateName"
    @confirm:delete="handleConfirmDelete"
  />
</section>
</template>

<script lang="ts">
import { getCurrentInstance, defineAsyncComponent, defineComponent, PropType, reactive, ref } from 'vue'

import { Detail } from '@/models'
import { useOrdersStore } from '@/composables'

export default defineComponent({
  name: 'LunchOrders',
  components: {
    PreviewImageModal: defineAsyncComponent(() => import('@/components/PreviewImageModal.vue')),
    ConfirmDeleteModal: defineAsyncComponent(() => import('@/components/ConfirmDeleteModal.vue'))

  },

  props: {
    orders: {
      type: Array as PropType<Detail[]>,
      default: () => []
    }
  },

  emits: ['lunch:view'],

  setup (props) {
    const { dispatch_getOrders, dispatch_deleteOrder, SET_SELECTED_DAY_ORDERS } = useOrdersStore()

    const ctx = getCurrentInstance()

    const modal = reactive<{isActivePreviewImage: boolean, isActiveConfirmDelete: boolean}>({
      isActivePreviewImage: false,
      isActiveConfirmDelete: false
    })
    const imgUrl = ref<string>('')
    const plateName = ref<string>('')
    const isLunch = ref<boolean>(false)

    function handleViewPlateOpenModal (detail: Detail) {
      imgUrl.value = detail.plate.image_url
      modal.isActivePreviewImage = true
    }

    function handleConfirmDeleteOpenModal (detail: Detail) {
      plateName.value = detail.plate.name
      isLunch.value = detail.plate.type === 'LUNCH'
      modal.isActiveConfirmDelete = true
    }

    async function handleConfirmDelete () {
      const orderDetailToDelete = props.orders.findIndex(o => o.plate.name === plateName.value)

      try {
        await dispatch_deleteOrder({ orderId: props.orders[orderDetailToDelete]!.id })
        await dispatch_getOrders()

        // si es tipo almuerzo elimina todas los platos
        if (props.orders[orderDetailToDelete]!.plate.type === 'LUNCH') {
          SET_SELECTED_DAY_ORDERS([])
        } else {
          SET_SELECTED_DAY_ORDERS(props.orders.filter((o, i) => i !== orderDetailToDelete))
        }

        modal.isActiveConfirmDelete = true
        isLunch.value = false

        plateName.value = ''

        ctx?.appContext.config.globalProperties.$toast.open({
          message: 'La orden ha sido eliminada con éxito'
        })
      } catch (error) {
        ctx?.appContext.config.globalProperties.$toast.open({
          message: 'No se pudo eliminar la orden',
          type: 'error'
        })
      }
    }

    return {
      modal,
      imgUrl,
      plateName,
      isLunch,
      handleViewPlateOpenModal,
      handleConfirmDeleteOpenModal,
      handleConfirmDelete
    }
  }
})
</script>

<style lang="scss" scoped>
.lunch-wrap {
  border: 1px solid $gray;
  border-radius: 9px;
  padding: 0 15px;
}

.lunch-order {
  @apply flex justify-between items-center my-2;
  color: $text-gray-2;

  &__left {
    @apply flex items-center;

    img {
      @apply rounded-lg cursor-pointer;
      max-height: 64px;
      max-width: 92px;
    }

    div {
      @apply ml-2;
    }

    &--name {
      @apply cursor-pointer;
      color: $green;

    }
    &--calories {
      color: $text-gray-2;
    }
  }

  &__right {
    @apply cursor-pointer;
  }
}
</style>
