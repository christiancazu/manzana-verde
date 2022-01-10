import { Detail, Order } from '@/models'

export interface OrdersStateInterface {
  orders: Order[];
  selectedDayOrders: Detail[]
}

function state (): OrdersStateInterface {
  return {
    orders: [],
    selectedDayOrders: []
  }
}

export default state
