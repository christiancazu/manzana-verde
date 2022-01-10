<template>
<div class="circle circle__per-50">
  <div class="circle__inner">
    {{ count }}
  </div>
</div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  props: {
    count: {
      type: Number,
      default: 0
    }
  }
})
</script>

<style lang="scss" scoped>
.circle {
  position: relative;
  width: 24px;
  height: 24px;
  border-radius: 50%;
  overflow: hidden;

  &__inner {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 20px;
    height: 20px;
    background: white;
    border-radius: 50%;
    font-size: 12px;
  }

  &__per-50 {
    background-image: conic-gradient(#35B266 50%, #E8E8E8 0);
  }
}
</style>
