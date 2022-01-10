import { Detail, Order } from '@/models'
import { MutationTree } from 'vuex'
import { OrdersStateInterface } from './state'

const mutation: MutationTree<OrdersStateInterface> = {
  SET_ORDERS (state, orders: Order[]) {
    state.orders = orders
  },

  SET_SELECTED_DAY_ORDERS (state, selectedDayOrders: Detail[]) {
    state.selectedDayOrders = selectedDayOrders
  }
}

export default mutation
