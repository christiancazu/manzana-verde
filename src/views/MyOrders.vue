<template>
<div>
  <EmptyOrder
    class="mb-4"
    icon="half-morning"
    label="Media mañana"
  />
  <LunchOrders
    v-if="selectedDayOrders.length"
    class="mb-4"
    :orders="selectedDayOrders"
  />
  <EmptyOrder
    v-else
    active
    add-btn
    class="mb-4"
    icon="lunch"
    label="Almuerzo"
    @order:add="handleAddOrder"
  />
  <EmptyOrder
    class="mb-4"
    icon="half-afternoon"
    label="Media tarde"
  />
  <EmptyOrder
    class="mb-4"
    icon="dinner"
    label="cena"
  />
</div>
</template>

<script lang="ts">
import { defineAsyncComponent, defineComponent } from 'vue'

import { useOrdersStore } from '@/composables'

export default defineComponent({
  name: 'MyOrders',

  components: {
    EmptyOrder: defineAsyncComponent(() => import('@/components/orders/EmptyOrder.vue')),
    LunchOrders: defineAsyncComponent(() => import('@/components/orders/LunchOrders.vue'))
  },

  setup () {
    const { selectedDayOrders, dispatch_getOrders } = useOrdersStore()

    function handleAddOrder () {
      //
    }

    async function init () {
      try {
        await dispatch_getOrders()
      } catch (error) {

      }
    }

    init()

    return {
      handleAddOrder,
      selectedDayOrders
    }
  }
})
</script>
