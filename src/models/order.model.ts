import { Detail } from './detail.model'
import { Additional } from './additional.model'

export interface Order {
  id: string
  code_date: string
  additional: Additional[]
  details: Detail[]
}

export interface NewOrder {
  code_date: string
  additionals: {
    include_rice: boolean
    include_sweet_potato: boolean
    include_potato: boolean
    include_spicy: boolean
  }
  plate: {
    id: string,
    type: 'LUNCH',
    extra_ids: string[]
  }
}
