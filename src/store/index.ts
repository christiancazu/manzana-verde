import { createStore } from 'vuex'
import { ExampleStateInterface } from './module-example/state'

import example from './module-example'
export interface StateInterface {
  // Define your own store structure, using submodules if needed
  example: ExampleStateInterface;
}

export default createStore<StateInterface>({
  modules: {
    example
  }
})
