import home from './components/home';
import login from './components/login';
import register from './components/register';



import axios from 'axios';

export default{
    mode: 'history',

    routes: [
        
        {
            path: '/home',
            component: home,
            name: 'home',
        },
        {
            path: '/login',
            component: login,
            name: 'login',
            //Checks if user is already logged in. If they are, then redirects them to home
            beforeEnter: (to, form, next) => {
                axios.get('api/authenticated').then(()=>{
                    return next({name: 'home'})
                }).catch(()=>{
                    next()
                })
            }
        },
        {
            path: '/register',
            component: register,
            name: 'register',
            //Checks if user is already logged in. If they are, then redirects them to home
            beforeEnter: (to, form, next) => {
                axios.get('api/authenticated').then(()=>{
                    return next({name: 'home'})
                }).catch(()=>{
                    next()
                })
            }
        }


    ]
}