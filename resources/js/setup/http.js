import axios from 'axios'

let baseDomain = 'account-task.test'
const baseURL = `http://${baseDomain}/api`

const instance = axios.create({
  baseURL,
  headers: {
    'Accept': 'application/json',
    'Content-Type': 'application/json',
    // Authorization: localStorage.getItem('token_type') + ' ' + localStorage.getItem('token')
  },
})

// apply interceptor on response
instance.interceptors.response.use(function (response) {
  // Do something with response data
  return response
}, function (error) {
  // Do something with response error
  return Promise.reject(error)
})

export default instance