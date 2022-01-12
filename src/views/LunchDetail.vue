<template>
<section>
  <AlterNavbar>
    <template #header>
      <div class="alter-navbar__left">
        <BackLink :to-route="{name: 'Lunchs', params: {codeDate: $route.query.codeDate}}" />
      </div>
      <div class="alter-navbar__center">
        Detalle
      </div>
      <div class="alter-navbar__right">
        <div>like</div>
      </div>
    </template>
  </AlterNavbar>

  <div class="page-content--alter">
    {{ $route.params.plateId }}
  </div>
</section>
</template>

<script lang="ts">
import { defineAsyncComponent, defineComponent } from 'vue'
import { useRoute } from 'vue-router'

import { usePlatesStore } from '@/composables'

export default defineComponent({
  name: 'LunchDetail',

  components: {
    AlterNavbar: defineAsyncComponent(() => import('@/components/AlterNavbar.vue')),
    BackLink: defineAsyncComponent(() => import('@/components/BackLink.vue'))
  },

  setup () {
    const route = useRoute()

    const { dispatch_getPlate } = usePlatesStore()

    async function init () {
      try {
        await dispatch_getPlate({ plateId: route.params.plateId as string })
      } catch (error) {
        console.error(error)
      }
    }

    init()

    return {
      //
    }
  }
})
</script>
