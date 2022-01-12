<template>
<section class="lunch-wrap">
  <template
    v-for="(extra, i) in plate.extras"
    :key="i"
  >
    <div class="lunch-order">
      <div class="lunch-order__left">
        <img
          :src="`${$mediaUrl}/${extra.image_url}`"
          @click="handleViewPlateOpenModal(extra)"
        >
        <div>
          <div class="lunch-order__left--name">
            {{ extra.name }}
          </div>
          <div
            v-if="extra.is_recommended"
            class="flex"
          >
            <Recommended />
          </div>
          <div class="lunch-order__left--calories">
            {{ extra.calories }}kcal
            <img
              class="ml-2"
              src="@/assets/icons/tip.svg"
            >
          </div>
        </div>
      </div>
      <div class="lunch-order__right">
        <img
          v-if="extrasIncludes[i].isAdded"
          src="@/assets/icons/delete.svg"
          @click="handleAddExtra(i)"
        >
        <button
          v-else
          class="lunch-order__right--btn"
          @click="handleAddExtra(i)"
        >
          Agregar
        </button>
      </div>
    </div>
    <hr>
  </template>

  <PreviewImageModal
    v-if="imgUrl"
    v-model:isActive="modal.isActivePreviewImage"
    :img-url="imgUrl"
  />

  <ConfirmDeleteModal
    v-if="plateName"
    v-model:isActive="modal.isActiveConfirmDelete"
    :plate-name="plateName"
    @confirm:delete="handleConfirmDelete"
  />
</section>
</template>

<script lang="ts">
import { defineAsyncComponent, defineComponent, PropType, reactive, ref, watch } from 'vue'

import { Plate } from '@/models'

interface ExtrasAdded {
  isAdded: boolean
}

export default defineComponent({
  name: 'ExtrasComponent',

  components: {
    PreviewImageModal: defineAsyncComponent(() => import('@/components/PreviewImageModal.vue')),
    ConfirmDeleteModal: defineAsyncComponent(() => import('@/components/ConfirmDeleteModal.vue')),
    Recommended: defineAsyncComponent(() => import('@/components/Recommended.vue'))
  },

  props: {
    plate: {
      type: Object as PropType<Plate>,
      required: true
    }
  },

  emits: ['extra-ids:selected'],

  setup (props, { emit }) {
    const extrasIncludes = ref<ExtrasAdded[]>(props.plate.extras.map(() => ({ isAdded: false })))
    const currentExtraIndex = ref<number|null>(null)

    const modal = reactive<{isActivePreviewImage: boolean, isActiveConfirmDelete: boolean}>({
      isActivePreviewImage: false,
      isActiveConfirmDelete: false
    })

    const imgUrl = ref<string>('')
    const plateName = ref<string>('')

    watch(extrasIncludes.value, () => {
      emit('extra-ids:selected', props.plate.extras.reduce<string[]>((acc, { id }, index) => {
        if (extrasIncludes.value[index].isAdded) {
          acc.push(id)
        }
        return acc
      }, []))
    })

    function handleViewPlateOpenModal (extra: Plate) {
      imgUrl.value = extra.image_url
      modal.isActivePreviewImage = true
    }

    function handleConfirmDeleteOpenModal (extra: Plate) {
      plateName.value = extra.name
      modal.isActiveConfirmDelete = true
    }

    function handleAddExtra (index: number) {
      currentExtraIndex.value = index

      if (extrasIncludes.value[index].isAdded) {
        plateName.value = props.plate.extras[index].name
        modal.isActiveConfirmDelete = true
      } else {
        extrasIncludes.value[index].isAdded = !extrasIncludes.value[index].isAdded
      }
    }

    async function handleConfirmDelete () {
      extrasIncludes.value[currentExtraIndex.value!].isAdded = false
      modal.isActiveConfirmDelete = false
    }

    return {
      modal,
      imgUrl,
      plateName,
      handleViewPlateOpenModal,
      handleConfirmDeleteOpenModal,
      handleConfirmDelete,
      handleAddExtra,
      extrasIncludes
    }
  }
})
</script>

<style lang="scss" scoped>
.lunch-wrap {
  border: 1px solid $gray;
  border-radius: 9px;
  padding: 0 15px;
}

.lunch-order {
  @apply flex justify-between items-center my-2;
  color: $text-gray-2;

  &__left {
    @apply flex items-center;

    img {
      @apply rounded-lg cursor-pointer;
      max-height: 64px;
      max-width: 92px;
    }

    div {
      @apply ml-2;
    }

    &--name {
      @apply cursor-pointer;
      color: $green;

    }
    &--calories {
      @apply flex pt-2;
      color: $text-gray-2;
    }
  }

  &__right {
    @apply cursor-pointer;

    &--btn {
      @apply py-2 px-4 rounded-lg;
      color: $text-black;
      background-color: $yellow;
      &:hover {
        filter: brightness(0.95);
      }
    }
  }
}
</style>
