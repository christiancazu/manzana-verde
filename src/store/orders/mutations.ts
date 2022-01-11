import { Detail, Order } from '@/models'
import { MutationTree } from 'vuex'
import { OrdersStateInterface } from './state'

const mutation: MutationTree<OrdersStateInterface> = {
  SET_ORDERS (state, orders: Order[]) {
    state.orders = orders
  },

  SET_SELECTED_DAY_ORDER (state, selectedDayOrder: Order) {
    state.selectedDayOrder = selectedDayOrder

    if (state.selectedDayOrder.details) {
      state.selectedDayOrder.details = selectedDayOrder.details.sort((a: Detail, b: Detail) => ('' + a.plate.type).localeCompare(b.plate.type))
    }
  }
}

export default mutation
