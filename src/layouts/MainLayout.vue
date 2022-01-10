<template>
<main>
  <MainNavbar />
  <div class="page-content">
    <RouterView />
  </div>
  <FooterBar />
</main>
</template>

<script lang="ts">
import { defineAsyncComponent, defineComponent } from '@vue/runtime-core'

export default defineComponent({
  name: 'MainLayout',

  components: {
    MainNavbar: defineAsyncComponent(() => import('@/components/MainNavbar.vue')),
    FooterBar: defineAsyncComponent(() => import('@/components/footer/FooterBar.vue'))
  }
})
</script>

<style scoped>
.page-content {
  padding-top: 60px;
}
</style>
