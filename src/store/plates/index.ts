import { Module } from 'vuex'
import { StateInterface } from '../index'
import state, { PlatesStateInterface } from './state'
import actions from './actions'
import getters from './getters'
import mutations from './mutations'

const plateModule: Module<PlatesStateInterface, StateInterface> = {
  namespaced: true,
  actions,
  getters,
  mutations,
  state
}

export default plateModule
