<template>
<nav class="navbar">
  <div class="relative flex items-center justify-between h-full">
    <slot name="header" />
  </div>
</nav>
</template>

<script lang="ts">
import { defineComponent } from '@vue/runtime-core'

export default defineComponent({
  name: 'AlterNavbar'
})
</script>

<style lang="scss" scoped>
.navbar {
  @apply bg-white fixed z-50 shadow px-3.5 w-full;
  height: 60px;
}
</style>
