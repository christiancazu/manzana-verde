<template>
<section class="destine-info">
  <div class="destine-info__left">
    <img src="@/assets/icons/briefcase.svg">
    <div class="destine-info__left--text">
      <div class="destine-info__left--text--title">
        Entregar en:
      </div>
      <div class="destine-info__left--text--body">
        Av Mariscal Ramón Castilla 1155
      </div>
    </div>
  </div>
  <div class="destine-info__right">
    <img src="@/assets/icons/right-arrow.svg">
  </div>
</section>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'DestineInfo'
})
</script>

<style lang="scss" scoped>
.destine-info {
  @apply flex justify-between items-center py-2;

  &__left {
    @apply flex;
    &--text {
      @apply flex flex-col mx-4;
      &--title {
        color: $text-black;
      }
      &--body {
        color: $text-gray-2;
      }
    }
  }
}
</style>
