import axios from 'axios'
import { result } from 'lodash'

export const register = ({ dispatch }, { payload }) => {
    return axios
        .post('/api/auth/register', payload)
        .then(result => {
            console.log(result.data)
        })
        .catch(err => {
            console.log(err.response.data.errors)
        })
}
