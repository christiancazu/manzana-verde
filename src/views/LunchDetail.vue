<template>
<section v-if="plate">
  <AlterNavbar>
    <template #header>
      <div class="alter-navbar__left">
        <BackLink :to-route="{name: 'Lunchs', params: {codeDate: $route.query.codeDate}}" />
      </div>
      <div class="alter-navbar__center">
        Detalle
      </div>
      <div
        class="alter-navbar__right text-xl cursor-pointer"
        @click="handleSetFavorite"
      >
        <div
          v-if="plate.is_favorite"
          class="text-red-500"
        >
          ❤
        </div>
        <div v-else>
          ♡
        </div>
      </div>
    </template>
  </AlterNavbar>

  <div class="page-content--alter">
    <article class="plate">
      <img
        :alt="plate.name"
        class="plate__img"
        :src="`${$mediaUrl}/${plate.image_url}`"
        @click="handleViewPlateOpenModal(plate)"
      >
      <div class="plate__info--name">
        {{ plate.name }}
      </div>
      <div
        v-if="plate.is_recommended"
        class="flex"
      >
        <Recommended />
      </div>
      <div class="plate__info--description">
        Ingredientes {{ plate.description }}
      </div>
      <div class="plate__info--data">
        <div
          v-for="data in [
            { label: 'Kcal', weight: '', value: plate.calories },
            { label: 'Grasa', weight: 'g', value: plate.fats },
            { label: 'Carbo', weight: 'g', value: plate.carbohydrates },
            { label: 'Prote', weight: 'g', value: plate.proteines },
          ]"
          :key="data.label"
        >
          <div class="plate__info--data__content">
            <div>
              {{ data.label }}
            </div>
            <div>
              {{ data.value }}{{ data.weight }}
            </div>
          </div>
        </div>
      </div>

      <div class="plate__info--benefits">
        <Benefits :benefits="plate.benefits" />
      </div>

      <div>
        <Extras
          :plate="plate"
          @extra-ids:selected="extra_ids = $event"
        />
      </div>

      <div class="plate__info--additionals">
        <div
          v-for="(v, k) in additionals"
          :key="k"
          class="flex flex-col"
        >
          <template v-if="k === 'include_spicy'">
            <hr class="my-4">
          </template>
          <label>
            <input
              :checked="additionals[k]"
              class="form-checkbox cursor-pointer"
              type="checkbox"
              @input="additionals[k] = !additionals[k]"
            >
            <span class="ml-2 cursor-pointer">{{ $t(k) }}</span>
          </label>
        </div>
      </div>

      <button
        class="plate__info--add-order"
        @click="handleCreateOrder"
      >
        Agregar al pedido
      </button>
    </article>
  </div>

  <PreviewImageModal
    v-if="imgUrl"
    v-model:isActive="modal.isActivePreviewImage"
    :img-url="imgUrl"
  />
</section>
</template>

<script lang="ts">
import { defineAsyncComponent, defineComponent, getCurrentInstance, reactive, ref } from 'vue'
import { useRoute, useRouter } from 'vue-router'

import { useOrdersStore, usePlatesStore } from '@/composables'
import { Additional, NewOrder, Plate } from '@/models'

export default defineComponent({
  name: 'LunchDetail',

  components: {
    AlterNavbar: defineAsyncComponent(() => import('@/components/AlterNavbar.vue')),
    BackLink: defineAsyncComponent(() => import('@/components/BackLink.vue')),
    Recommended: defineAsyncComponent(() => import('@/components/Recommended.vue')),
    Benefits: defineAsyncComponent(() => import('@/components/Benefits.vue')),
    Extras: defineAsyncComponent(() => import('@/components/plates/Extras.vue')),
    PreviewImageModal: defineAsyncComponent(() => import('@/components/PreviewImageModal.vue'))
  },

  setup () {
    const route = useRoute()
    const router = useRouter()
    const ctx = getCurrentInstance()

    const { dispatch_getPlate, dispatch_updateFavoritePlate } = usePlatesStore()
    const { dispatch_createOrder } = useOrdersStore()

    const plate = ref<Plate|null>(null)

    const modal = reactive<{isActivePreviewImage: boolean}>({
      isActivePreviewImage: false
    })

    const imgUrl = ref<string>('')

    const additionals = reactive<Additional>({
      include_sweet_potato: false,
      include_potato: false,
      include_rice: false,
      include_spicy: false
    })

    const extra_ids = ref<string[]>([])

    async function handleSetFavorite () {
      try {
        await dispatch_updateFavoritePlate({
          plateId: route.params.plateId as string,
          is_favorite: !plate.value?.is_favorite
        })

        if (plate.value) {
          plate.value.is_favorite = !plate.value.is_favorite
        }
      } catch (error) {
        console.error(error)
      }
    }

    function handleViewPlateOpenModal (plate: Plate) {
      imgUrl.value = plate.image_url
      modal.isActivePreviewImage = true
    }

    async function handleCreateOrder () {
      const newOrder: NewOrder = {
        code_date: route.query.codeDate as string,
        additionals,
        plate: {
          id: route.params.plateId as string,
          type: 'LUNCH',
          extra_ids: extra_ids.value
        }
      }

      try {
        await dispatch_createOrder(newOrder)

        ctx?.appContext.config.globalProperties.$toast.open({
          message: 'La orden ha sido creada con éxito'
        })

        router.push({ name: 'Orders' })
      } catch (error) {
        ctx?.appContext.config.globalProperties.$toast.open({
          message: 'No se pudo crear la orden',
          type: 'error'
        })
      }
    }

    async function init () {
      try {
        const { data } = await dispatch_getPlate({ plateId: route.params.plateId as string })

        plate.value = data
      } catch (error) {
        console.error(error)
      }
    }

    init()

    return {
      plate,
      handleSetFavorite,
      handleViewPlateOpenModal,
      handleCreateOrder,
      //
      imgUrl,
      modal,
      //
      additionals,
      extra_ids
    }
  }
})
</script>

<style lang="scss" scoped>
.plate {
  &__img {
    @apply w-full object-cover rounded-xl cursor-pointer;
    max-height: 180px;
  }
  &__info {
    &--name {
      @apply font-bold mt-2;
      font-size: 19px;
    }
    &--description {
      @apply font-normal my-4;
      font-size: 19px;
    }
    &--data {
      @apply grid grid-cols-4 divide-x rounded-xl;
      border: 1px solid $gray;
      &__content {
        @apply flex justify-center flex-col text-center py-4;
        color: $text-gray-2;

        & div:nth-of-type(2) {
          color: $green;
        }
      }
    }
    &--benefits {
      @apply my-4;
    }

    &--additionals {
      @apply my-4;
    }

    &--add-order {
      @apply mt-8 w-full py-2 rounded-lg;
      color: $text-black;
      background-color: $yellow;
      &:hover {
        filter: brightness(0.95);
      }
    }
  }
}

input[type='checkbox'] {
  filter: hue-rotate(300deg)
}
</style>
