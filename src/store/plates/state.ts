import { Plate } from '@/models'

export interface PlatesStateInterface {
  plates: Plate[];
}

function state (): PlatesStateInterface {
  return {
    plates: []
  }
}

export default state
