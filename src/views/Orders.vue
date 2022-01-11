<template>
<div>
  <EmptyOrder
    class="mb-4"
    icon="half-morning"
    label="Media mañana"
  />
  <LunchOrders
    v-if="selectedDayOrder?.details.length"
    class="mb-4"
    :order="selectedDayOrder"
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
import { useRouter } from 'vue-router'

import { useOrdersStore } from '@/composables'

export default defineComponent({
  name: 'OrdersView',

  components: {
    EmptyOrder: defineAsyncComponent(() => import('@/components/orders/EmptyOrder.vue')),
    LunchOrders: defineAsyncComponent(() => import('@/components/orders/LunchOrders.vue'))
  },

  setup () {
    const router = useRouter()

    const { selectedDayOrder, dispatch_getOrders } = useOrdersStore()

    function handleAddOrder () {
      router.push({ name: 'Lunchs', params: { codeDate: selectedDayOrder.value.code_date } })
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
      selectedDayOrder
    }
  }
})
</script>
