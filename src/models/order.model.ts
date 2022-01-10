import { Detail } from './detail.model'
import { Additional } from './additional.model'

export interface Order {
  id: string
  code_date: string
  additional: Additional[]
  details: Detail[]
}
