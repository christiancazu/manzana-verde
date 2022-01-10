<template>
<main>
  <MainNavbar />

  <div class="pt-16">
    <CaloriesBar
      class="px-3.5"
      :value="getForDayTotalCal"
    />
    <hr>
    <Days
      class="px-3.5"
      @day:select="handleSelectDay"
    />
    <hr>
    <DestineInfo class="px-3.5" />
    <hr>

    <div class="page-content">
      <RouterView />
    </div>
  </div>
  <FooterBar />
</main>
</template>

<script lang="ts">
import { defineAsyncComponent, defineComponent } from '@vue/runtime-core'
import { useOrdersStore } from '@/composables'
import { Order } from '@/models'

export default defineComponent({
  name: 'MainLayout',

  components: {
    MainNavbar: defineAsyncComponent(() => import('@/components/MainNavbar.vue')),
    FooterBar: defineAsyncComponent(() => import('@/components/footer/FooterBar.vue')),
    CaloriesBar: defineAsyncComponent(() => import('@/components/CaloriesBar.vue')),
    Days: defineAsyncComponent(() => import('@/components/Days.vue')),
    DestineInfo: defineAsyncComponent(() => import('@/components/DestineInfo.vue'))
  },

  setup () {
    const { getForDayTotalCal, SET_SELECTED_DAY_ORDERS } = useOrdersStore()

    async function handleSelectDay (dayOrder: Order) {
      if (dayOrder?.details) {
        SET_SELECTED_DAY_ORDERS(dayOrder.details)
      } else {
        SET_SELECTED_DAY_ORDERS([])
      }
    }

    return {
      handleSelectDay,
      getForDayTotalCal
    }
  }
})
</script>

<style lang="scss" scoped>
.page-content {
  @apply px-3.5 pt-3.5 pb-16;
}
</style>
