<template>
<div>
  <Plates :plates="plates" />
  <pre>
    {{ $store.state.orders.selectedDayOrder }}
  </pre>
</div>
</template>

<script lang="ts">
import { defineAsyncComponent, defineComponent } from 'vue'
import { useRouter } from 'vue-router'
import { usePlatesStore } from '@/composables'

import store from '@/store'

export default defineComponent({
  name: 'ListLunchs',

  components: {
    Plates: defineAsyncComponent(() => import('@/components/plates/Plates.vue'))
  },

  setup () {
    const router = useRouter()

    const { plates, dispatch_getPlates } = usePlatesStore()

    async function init () {
      try {
        await dispatch_getPlates({ type: 'LUNCH' })
      } catch (error) {
        console.error(error)
      }
    }

    // redirect if code_date isn't set
    if (!store.state.orders.selectedDayOrder) {
      router.push('/orders')
    } else {
      init()
    }

    return {
      plates
    }
  }
})
</script>
