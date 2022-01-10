<template>
<section class="empty-order">
  <div class="empty-order__left">
    <img :src="require(`@/assets/icons/${icon}.svg`)">
    <div>
      <div :class="`empty-order__left${active ? '--active' : ''}`">
        {{ label }}
      </div>
      <div class="empty-order__left__body">
        200kcal
      </div>
    </div>
  </div>
  <div class="empty-order__right">
    <button
      v-if="addBtn"
      class="empty-order__right--btn"
      @click="$emit('order:add')"
    >
      Agregar
    </button>
    <div
      v-else
      class="empty-order__right--text"
    >
      No tiene créditos
    </div>
  </div>
</section>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'EmptyOrder',

  props: {
    icon: {
      type: String,
      required: true
    },
    label: {
      type: String,
      required: true
    },
    active: Boolean,
    addBtn: Boolean
  },

  emits: ['order:add']
})
</script>

<style lang="scss">
.empty-order {
  @apply flex justify-between items-center;
  border: 1px solid $gray;
  border-radius: 9px;
  padding: 23px 15px;
  color: $text-gray-2;

  background-color: #FAFAFA;

  &__left {
    @apply flex font-semibold;

    & div {
      @apply ml-2;
    }

    &--active {
      color: $green;
    }

    &__body {
      @apply font-light;
    }
  }

  &__right {
    &--btn {
      @apply py-2 px-8 rounded-lg;
      color: $text-black;
      background-color: $yellow;
      &:hover {
        filter: brightness(0.95);
      }
    }
  }
}
</style>
