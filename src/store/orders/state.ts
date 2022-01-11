import { Order } from '@/models'

export interface OrdersStateInterface {
  orders: Order[];
  selectedDayOrder: Order|null
}

function state (): OrdersStateInterface {
  return {
    orders: [],
    selectedDayOrder: null
  }
}

export default state
