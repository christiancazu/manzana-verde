<template>
<section class="flex flex-wrap">
  <div
    v-for="icon in splitBenefits"
    :key="icon"
    class="flex my-2"
    :class="onlyIcons ? 'pl-4' : 'pr-4'"
    :data-tooltip-target="`tooltip-default-${icon}`"
  >
    <img :src="require(`@/assets/icons/${icon}.svg`)">
    <div
      v-if="!onlyIcons"
      class="pl-2 text-sm font-normal"
    >
      {{ $t(icon) }}
    </div>
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
    },
    onlyIcons: Boolean
  },

  setup (props) {
    return {
      splitBenefits: props.benefits.split('|')
    }
  }
})
</script>
