import { GetterTree } from 'vuex'
import { StateInterface } from '../index'
import { PlatesStateInterface } from './state'

const getters: GetterTree<PlatesStateInterface, StateInterface> = {
  someAction (/* context */) {
    // your code
  }
}

export default getters
