<template>
<section>
  <AlterNavbar>
    <template #header>
      <div class="alter-navbar__left">
        <BackLink :to-route="{name: 'Orders'}" />
      </div>
      <div class="alter-navbar__center">
        Almuerzo
      </div>
      <div class="alter-navbar__right">
        <div class="alter-navbar__right--day-name">
          {{ availableDay.name }}
        </div>
        <div class="alter-navbar__right--day-number">
          {{ availableDay.number }}
        </div>
      </div>
    </template>
  </AlterNavbar>

  <div class="page-content--alter">
    <Plates
      :plates="plates"
      @plate:view-detail="handleViewDetailPlate"
    />
  </div>
</section>
</template>

<script lang="ts">
import { defineAsyncComponent, defineComponent } from 'vue'
import { useRoute, useRouter } from 'vue-router'

import { dataDays } from '@/data'
import { usePlatesStore } from '@/composables'
import { Plate } from '@/models'

export default defineComponent({
  name: 'LunchsView',

  components: {
    AlterNavbar: defineAsyncComponent(() => import('@/components/AlterNavbar.vue')),
    BackLink: defineAsyncComponent(() => import('@/components/BackLink.vue')),
    Plates: defineAsyncComponent(() => import('@/components/plates/Plates.vue'))
  },

  setup () {
    const route = useRoute()
    const router = useRouter()

    const { plates, dispatch_getPlates } = usePlatesStore()

    const availableDay = dataDays.find(d => d.code_date === route.params.codeDate)

    async function init () {
      try {
        await dispatch_getPlates({ type: 'LUNCH' })
      } catch (error) {
        console.error(error)
      }
    }

    function handleViewDetailPlate (plate: Plate) {
      console.warn(plate)
    }

    // redirect if not exists a available day
    if (!availableDay) {
      router.push({ name: 'Orders' })
    } else {
      init()
    }

    return {
      availableDay,
      plates,
      handleViewDetailPlate
    }
  }
})
</script>

<style lang="scss">
.alter-navbar {
  & > {
    @apply text-sm;
  }
  &__center {
    @apply font-semibold text-xl;
  }
  &__right {
    @apply flex flex-col text-center;

    &--day-number {
      @apply font-semibold text-xl;
    }
  }
}
</style>
