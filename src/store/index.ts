import { createStore } from 'vuex'

import orders from './orders'

import { OrdersStateInterface } from './orders/state'
export interface StateInterface {
  // Define your own store structure, using submodules if needed
  orders: OrdersStateInterface;
}

export default createStore<StateInterface>({
  modules: {
    orders
  }
})
