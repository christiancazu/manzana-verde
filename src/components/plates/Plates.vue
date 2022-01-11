<template>
<div>
  qweqweqw
</div>
</template>

<script lang="ts">
import { defineComponent, PropType } from 'vue'

import { Plate } from '@/models'

export default defineComponent({
  name: 'PlatesComponent',

  props: {
    plates: {
      type: Array as PropType<Plate[]>,
      default: () => []
    }
  }
})
</script>

<style scoped>

</style>
