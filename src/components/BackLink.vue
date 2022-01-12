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
import { _RouteLocationBase } from 'vue-router'

export default defineComponent({
  name: 'BackLink',

  props: {
    toRoute: {
      type: Object as PropType<_RouteLocationBase>,
      required: true
    }
  }
})
</script>
