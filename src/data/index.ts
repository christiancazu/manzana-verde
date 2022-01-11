export interface Day {
  name: string
  number: string
  code_date: string
  isActive: boolean
  haveDetails: boolean
}

export const dataDays: Day[] = [
  { name: 'Lun', number: '27', code_date: '27-01-2022', isActive: false, haveDetails: false },
  { name: 'Mar', number: '30', code_date: '30-01-2022', isActive: false, haveDetails: false },
  { name: 'Mie', number: '01', code_date: '01-02-2022', isActive: false, haveDetails: false },
  { name: 'Jue', number: '02', code_date: '02-02-2022', isActive: false, haveDetails: false },
  { name: 'Vie', number: '03', code_date: '03-02-2022', isActive: false, haveDetails: false }
]
