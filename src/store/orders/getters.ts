import { GetterTree } from 'vuex'
import { StateInterface } from '../index'
import { OrdersStateInterface } from './state'

const getters: GetterTree<OrdersStateInterface, StateInterface> = {
  getForDayTotalCal (state): number {
    if (!state.selectedDayOrder || state.selectedDayOrder.details?.length === 0) {
      return 0
    }

    return state.selectedDayOrder.details.reduce((acc, item) => {
      acc += item.plate.calories
      return acc
    }, 0)
  }
}

export default getters
