<template>
<nav class="navbar">
  <div class="relative flex items-center justify-between">
    <div class="flex-1 flex items-center">
      <div class="flex-shrink-0 flex items-center">
        <div class="relative flex">
          <div>
            <button
              id="user-menu-button"
              aria-expanded="false"
              aria-haspopup="true"
              class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
              type="button"
            >
              <img
                alt="christian"
                class="h-8 w-8 rounded-full"
                src="https://avatars.githubusercontent.com/u/30902930?v=4"
              >
            </button>
          </div>
          <div class="navbar__title">
            Mis pedidos
          </div>
        </div>
      </div>
    </div>

    <div class="flex">
      <CircularProgressBar
        class="mx-2"
        :count="2"
      />
      <AutoBtn
        class="mx-2"
      />
      <img
        alt="plate-config"
        class="ml-2"
        src="@/assets/icons/plate-config.svg"
      >
    </div>
  </div>
</nav>
</template>

<script lang="ts">
import { defineAsyncComponent, defineComponent } from '@vue/runtime-core'

export default defineComponent({
  name: 'MainNavbar',

  components: {
    CircularProgressBar: defineAsyncComponent(() => import('@/components/navbar/CircularProgressBar.vue')),
    AutoBtn: defineAsyncComponent(() => import('@/components/navbar/AutoBtn.vue'))
  }
})
</script>

<style lang="scss" scoped>
.navbar {
  @apply bg-white fixed;
  padding: 14px;
  height: 60px;
  width: 100%;

  &__title {
    @apply text-xl font-semibold;
    padding-left: 14px;
  }
}
</style>
