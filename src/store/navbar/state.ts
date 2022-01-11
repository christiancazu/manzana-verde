export interface ExampleStateInterface {
  app: string;
}

function state (): ExampleStateInterface {
  return {
    app: 'Manzana Verde'
  }
}

export default state
