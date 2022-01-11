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
import { defineComponent, ref, watch } from 'vue'

import { useOrdersStore } from '@/composables'

import { dataDays, Day } from '@/data'

export default defineComponent({
  name: 'DaysComponent',

  props: {
    value: {
      type: Number,
      default: 0
    }
  },

  emits: ['day:select'],

  setup (_, { emit }) {
    const { orders } = useOrdersStore()

    const days = ref<Day[]>(dataDays)

    function setActiveDay (day: Day) {
      days.value.forEach(d => {
        d.isActive = false
      })

      day.isActive = true

      emit('day:select', orders.value.find(o => o.code_date === day.code_date) || {
        code_date: day.code_date,
        details: []
      })
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

    // set first day as active
    setActiveDay(days.value[0])

    return {
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
      border-radius: 12px;
      background-color: $yellow;
      color: $text-black;
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
