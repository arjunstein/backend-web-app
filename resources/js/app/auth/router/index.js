import { Login, Register } from '../components'

export default [
    {
        path: '/login',
        component: Login,
        name: 'login',
        meta: {
            guest: true,
            authenticate: false
        }
    },
    {
        path: '/register',
        component: Register,
        name: 'register',
        meta: {
            guest: true,
            authenticate: false
        }
    }
]
