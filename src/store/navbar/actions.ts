import { axiosInstance } from '@/config/axios'
import { ActionTree } from 'vuex'
import { StateInterface } from '../index'
import { ExampleStateInterface } from './state'

const actions: ActionTree<ExampleStateInterface, StateInterface> = {
  async dispatch_getOrders ({ commit }) {
    try {
      const data = await axiosInstance.get('orders')

      return data
    } catch (error) {
      return Promise.reject(error)
    }
  }
}

export default actions
