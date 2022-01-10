<template>
<section class="my-2">
  <div class="days">
    <div
      v-for="day in days"
      :key="day.name"
      class="days__box"
      :class="{'days__active': day.isActive}"
      @click="setActiveDay(day)"
    >
      <div class="days__text">
        {{ day.name }}
      </div>
      <div class="days__number">
        {{ day.number }}
      </div>
      <div
        v-if="day.haveDetails"
        class="days__order-exists"
      />
    </div>
  </div>
</section>
</template>

<script lang="ts">
import { useOrdersStore } from '@/composables'
import { computed, defineComponent, ref, watch } from 'vue'

interface Day {
  name: string
  number: string
  // eslint-disable-next-line camelcase
  code_date: string
  isActive: boolean
  haveDetails: boolean
}

export default defineComponent({
  name: 'DaysComponent',

  props: {
    value: {
      type: Number,
      default: 0
    }
  },

  emits: ['day:select'],

  setup (props, { emit }) {
    const { orders } = useOrdersStore()

    const valueWidth = computed<number>(() => (props.value / 2200) * 100 || 0)

    const days = ref<Day[]>([
      { name: 'Lun', number: '27', code_date: '27-01-2022', isActive: true, haveDetails: false },
      { name: 'Mar', number: '30', code_date: '30-01-2022', isActive: false, haveDetails: false },
      { name: 'Mie', number: '01', code_date: '01-02-2022', isActive: false, haveDetails: false },
      { name: 'Jue', number: '02', code_date: '02-02-2022', isActive: false, haveDetails: false },
      { name: 'Vie', number: '03', code_date: '03-02-2022', isActive: false, haveDetails: false }
    ])

    function setActiveDay (day: Day) {
      days.value.forEach(d => {
        d.isActive = false
      })
      day.isActive = true

      emit('day:select', orders.value.find(o => o.code_date === day.code_date))
    }

    watch(
      orders,
      () => {
        days.value = days.value.map(order => {
          let haveDetails = false
          const orderByCodeDate = orders.value.find(o => o.code_date === order.code_date)

          if (orderByCodeDate?.details.length) {
            haveDetails = true
          }

          return {
            ...order,
            haveDetails
          }
        })
      },
      {
        immediate: true
      }
    )

    return {
      valueWidth,
      days,
      setActiveDay
    }
  }
})
</script>

<style lang="scss" scoped>
.days {
  @apply my-2;
  display: grid;
  grid-auto-columns: 1fr;
  grid-auto-flow: column;
  border-radius: 4px;

  &__box {
    @apply flex justify-center flex-col px-4 py-2 text-center relative cursor-pointer;
    color: $text-gray;
    border-radius: 4px;

    &:hover {
      background-color: $gray;
    }
  }
  &__text {
    @apply text-sm;
  }

  &__number {
    @apply text-xl font-semibold;
  }

  &__active {
    @apply rounded-xl;
    background-color: $yellow;
    color: $text-black;
  }

  &__order-exists {
    background-color: $green;
    width: 20px;
    height: 2px;
    position: absolute;
    bottom: 6px;
    left: 50%;
    border-radius: 4px;
    transform: translate(-50%, 0);
  }
}
</style>
