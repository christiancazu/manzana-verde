import { Module } from 'vuex'
import { StateInterface } from '../index'
import state, { OrdersStateInterface } from './state'
import actions from './actions'
import getters from './getters'
import mutations from './mutations'

const ordersModule: Module<OrdersStateInterface, StateInterface> = {
  namespaced: true,
  actions,
  getters,
  mutations,
  state
}

export default ordersModule
