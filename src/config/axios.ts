import axios, { AxiosInstance } from 'axios'

const axiosInstance: AxiosInstance = axios.create({
  baseURL: process.env.VUE_APP_API_URL
})

export {
  axiosInstance
}
