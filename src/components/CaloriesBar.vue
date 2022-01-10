<template>
<section class="mb-4">
  <div class="flex justify-between">
    <div class="mb-1">
      {{ value }}Kcal
    </div>
    <div>
      2200Kcal
    </div>
  </div>
  <div class="w-full bg-gray-app rounded-full h-1.5">
    <div
      class="bg-yellow-app h-1.5 rounded-full"
      :style="`width: ${valueWidth}%`"
    />
  </div>
</section>
</template>

<script lang="ts">
import { computed, defineComponent } from 'vue'

export default defineComponent({
  name: 'CaloriesBar',

  props: {
    value: {
      type: Number,
      default: 0
    }
  },

  setup (props) {
    const valueWidth = computed<number>(() => (props.value / 2200) * 100 || 0)

    return {
      valueWidth
    }
  }
})
</script>
