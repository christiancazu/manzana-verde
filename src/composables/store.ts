import { Detail, Order } from '@/models'
import { computed } from 'vue'
import { useStore } from 'vuex'

export const useOrdersStore = () => {
  const { state, getters, dispatch, commit } = useStore()

  return {
    orders: computed<Order[]>(() => state.orders.orders),
    selectedDayOrders: computed<Detail[]>(() => state.orders.selectedDayOrders),

    getForDayTotalCal: computed<number>(() => getters['orders/getForDayTotalCal']),

    dispatch_getOrders: () => dispatch('orders/dispatch_getOrders'),
    dispatch_getByCodeDateOrder: (code_date: string) => dispatch('orders/dispatch_getByCodeDateOrder', { code_date }),
    dispatch_deleteOrder: ({ orderId }: {orderId: string}) => dispatch('orders/dispatch_deleteOrder', { orderId }),

    SET_SELECTED_DAY_ORDERS: (selectedDayOrders: Detail[]) => commit('orders/SET_SELECTED_DAY_ORDERS', selectedDayOrders)
  }
}
