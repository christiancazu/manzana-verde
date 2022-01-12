import { axiosInstance } from '@/config/axios'
import { ActionTree } from 'vuex'
import { StateInterface } from '../index'
import { PlatesStateInterface } from './state'

type PlateType = {
  type: 'LUNCH'
}

const actions: ActionTree<PlatesStateInterface, StateInterface> = {
  async dispatch_getPlates ({ commit }, { type }: PlateType) {
    try {
      const { data } = await axiosInstance.get('plates', { params: { type } })

      commit('SET_PLATES', data)

      return data
    } catch (error) {
      return Promise.reject(error)
    }
  },

  dispatch_getPlate (_, { plateId } : { plateId: string }) {
    return axiosInstance.get(`plates/${plateId}`)
  },

  dispatch_updateFavoritePlate (_, { plateId, is_favorite }: {plateId: string, is_favorite: boolean}) {
    return axiosInstance.put(`plates/${plateId}`, { is_favorite })
  }
}

export default actions
