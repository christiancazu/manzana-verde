<template>
<div class="auto-btn">
  <div class="auto-btn__circle" />
  <div class="auto-btn__text">
    Auto
  </div>
</div>
</template>

<script lang="ts">
import { defineComponent } from '@vue/runtime-core'

export default defineComponent({
  name: 'AutoBtn'
})
</script>

<style lang="scss" scoped>
.auto-btn {
  @apply flex cursor-pointer rounded-2xl px-1;
  border: 2px solid $gray;

  &__circle{
    @apply w-4 h-4 self-center mr-1;
    border-radius: 50%;
    background-color: $gray;
  }
}
</style>
