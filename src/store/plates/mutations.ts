import { Plate } from '@/models'
import { MutationTree } from 'vuex'
import { PlatesStateInterface } from './state'

const mutation: MutationTree<PlatesStateInterface> = {
  SET_PLATES (state: PlatesStateInterface, plates: Plate[]) {
    state.plates = plates
  }
}

export default mutation
