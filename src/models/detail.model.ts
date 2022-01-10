import { Plate } from './plate.model'

export interface Detail {
  id: string
  type: string
  order_id: string
  plate_id: string
  plate: Plate
}
