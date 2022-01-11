<template>
<section class="recommended">
  Recomendado
</section>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'RecommendedComponent'
})
</script>

<style lang="scss" scoped>
.recommended {
  @apply text-sm px-4 py-1 rounded;
  color: $green;
  background-color: rgba(53, 178, 102, 0.1);
}
</style>
