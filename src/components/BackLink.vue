<template>
<RouterLink
  class="underline"
  :to="toRoute"
>
  Atrás
</RouterLink>
</template>

<script lang="ts">
import { defineComponent, PropType } from 'vue'

export default defineComponent({
  name: 'BackLink',

  props: {
    toRoute: {
      type: Object as PropType<{name: string}>,
      required: true
    }
  }
})
</script>
