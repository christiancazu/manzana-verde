import { NewOrder, Order, Plate } from '@/models'
import { computed } from 'vue'
import { useStore } from 'vuex'

export const useOrdersStore = () => {
  const { state, getters, dispatch, commit } = useStore()

  return {
    orders: computed<Order[]>(() => state.orders.orders),
    selectedDayOrder: computed<Order>(() => state.orders.selectedDayOrder),

    getForDayTotalCal: computed<number>(() => getters['orders/getForDayTotalCal']),

    dispatch_getOrders: () => dispatch('orders/dispatch_getOrders'),
    dispatch_getByCodeDateOrder: (code_date: string) => dispatch('orders/dispatch_getByCodeDateOrder', { code_date }),
    dispatch_deleteOrder: ({ orderId }: {orderId: string}) => dispatch('orders/dispatch_deleteOrder', { orderId }),
    dispatch_createOrder: (newOrder: NewOrder) => dispatch('orders/dispatch_createOrder', newOrder),

    SET_SELECTED_DAY_ORDER: (selectedDayOrder: Order|null) => commit('orders/SET_SELECTED_DAY_ORDER', selectedDayOrder)
  }
}

export const usePlatesStore = () => {
  const { state, dispatch } = useStore()

  return {
    plates: computed<Plate[]>(() => state.plates.plates),

    dispatch_getPlate: ({ plateId }: {plateId: string}) => dispatch('plates/dispatch_getPlate', { plateId }),
    dispatch_getPlates: ({ type }: {type: string}) => dispatch('plates/dispatch_getPlates', { type }),
    dispatch_updateFavoritePlate: ({ plateId, is_favorite }: {plateId: string, is_favorite: boolean}) => dispatch('plates/dispatch_updateFavoritePlate', { plateId, is_favorite })
  }
}
