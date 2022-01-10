import { axiosInstance } from '@/config/axios'
import { ActionTree } from 'vuex'
import { StateInterface } from '../index'
import { OrdersStateInterface } from './state'

const actions: ActionTree<OrdersStateInterface, StateInterface> = {
  async dispatch_getOrders ({ commit }) {
    try {
      const { data } = await axiosInstance.get('orders')

      commit('SET_ORDERS', data)

      return data
    } catch (error) {
      return Promise.reject(error)
    }
  },

  dispatch_getByCodeDateOrder (_, { code_date }) {
    return axiosInstance.get(`orders/code_date/${code_date}`)
  },

  dispatch_deleteOrder (_, { orderId }) {
    return axiosInstance.delete(`detail_orders/${orderId}`)
  }
}

export default actions
