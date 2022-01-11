import { createStore } from 'vuex'

import orders from './orders'
import plates from './plates'

import { OrdersStateInterface } from './orders/state'
import { PlatesStateInterface } from './plates/state'
export interface StateInterface {
  // Define your own store structure, using submodules if needed
  orders: OrdersStateInterface;
  plates: PlatesStateInterface;
}

export default createStore<StateInterface>({
  modules: {
    orders,
    plates
  }
})
