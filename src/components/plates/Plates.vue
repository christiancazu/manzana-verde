<template>
<section>
  <div
    v-for="plate in plates"
    :key="plate.id"
    class="lunch"
  >
    <img
      :alt="plate.name"
      class="lunch__img"
      :src="`${$mediaUrl}/${plate.image_url}`"
      @click="handleViewPlateOpenModal(plate)"
    >
    <div
      v-if="plate.is_favorite"
      class="lunch__favorite"
    >
      <span>❤</span>
    </div>
    <div
      class="lunch__info"
      @click="$emit('plate:view-detail', plate)"
    >
      <div class="lunch__info--top">
        <div>
          {{ plate.name }}
        </div>
        <div>
          <Recommended v-if="plate.is_recommended" />
        </div>
      </div>
      <div class="lunch__info--bottom">
        <div>
          {{ plate.calories }}Kcal
        </div>
        <Benefits :benefits="plate.benefits" />
      </div>
    </div>
  </div>

  <PreviewImageModal
    v-if="imgUrl"
    v-model:isActive="modal.isActivePreviewImage"
    :img-url="imgUrl"
  />
</section>
</template>

<script lang="ts">
import { defineAsyncComponent, defineComponent, PropType, reactive, ref } from 'vue'

import { Plate } from '@/models'

export default defineComponent({
  name: 'PlatesComponent',

  components: {
    Recommended: defineAsyncComponent(() => import('@/components/Recommended.vue')),
    Benefits: defineAsyncComponent(() => import('@/components/Benefits.vue')),
    PreviewImageModal: defineAsyncComponent(() => import('@/components/PreviewImageModal.vue'))
  },

  props: {
    plates: {
      type: Array as PropType<Plate[]>,
      default: () => []
    }
  },

  emits: ['plate:view-detail'],

  setup () {
    const imgUrl = ref<string>('')

    const modal = reactive<{isActivePreviewImage: boolean}>({
      isActivePreviewImage: false
    })

    function handleViewPlateOpenModal (plate: Plate) {
      imgUrl.value = plate.image_url
      modal.isActivePreviewImage = true
    }

    return {
      imgUrl,
      modal,
      handleViewPlateOpenModal
    }
  }
})
</script>

<style lang="scss" scoped>
.lunch {
  @apply relative rounded-xl mb-6;
  border: 1px solid $gray;

  &__img {
    @apply w-full object-cover rounded-t-xl;
    max-height: 180px;
  }

  &__favorite {
    @apply bg-white rounded-full absolute top-3 right-2 w-6 h-5 text-red-500 text-center;
    & span {
      @apply flex justify-center items-center;
    }
  }

  &__info {
    @apply p-4 font-semibold;

    &--top,
    &--bottom {
      @apply flex justify-between;
    }

    &--top {
      font-size: 17px;
      color: $green;
      & div:nth-of-type(2) {
        transform: translateY(-14px);
      }
    }
    &--bottom {
      font-size: 15px;
      color: $text-black;
    }
  }
}
</style>
