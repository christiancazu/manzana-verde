<template>
<section class="flex">
  <div
    v-for="icon in splitBenefits"
    :key="icon"
    class="pl-4"
    :data-tooltip-target="`tooltip-default-${icon}`"
  >
    <img :src="require(`@/assets/icons/${icon}.svg`)">
  </div>
</section>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'BenefitsComponent',

  props: {
    benefits: {
      type: String,
      default: ''
    }
  },

  setup (props) {
    return {
      splitBenefits: props.benefits.split('|')
    }
  }
})
</script>

<style scoped>

</style>
