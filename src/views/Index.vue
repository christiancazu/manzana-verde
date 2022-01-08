<template>
<div>
  <h1 class="text-5xl text-center">
    {{ $store.state.example.app }} ~ {{ $t('challenge') }}
  </h1>
</div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'IndexView'
})
</script>
