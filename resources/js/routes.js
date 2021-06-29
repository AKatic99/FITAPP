import home from './components/home';
import login from './components/login';
import register from './components/register';
import onama from './components/onama';
import plan from './components/plan';
import axios from 'axios';
import dodajVjezbu from './components/dodajVjezbu';
import vjezbeM from './components/vjezbeM';
import vjezbeW from './components/vjezbeW';
import viewPost from './components/viewPost';
import edit from './components/edit';
import notFound from './components/notFound';

export default{
    mode: 'history',
    routes: [
        
        {
            path: '/',
            component: home,
            name: 'home',
        },
        {
            path: '*',
            component: notFound,
            name: 'notFound',
        },
        {
            path: '/onama',
            component: onama,
            name: 'onama',
        },
        {
            path: '/viewPost/:id',
            component: viewPost,
            name: 'viewPost',
            props: true,
            beforeEnter: (to, form, next) => {
                //Check if user is logged in
                axios.get('/api/authenticated').then(()=>{
                    next()                    
                }).catch(()=>{
                    return next({ name: 'home'})
                })
            }
        },
        {
            path: '/edit/:id',
            component: edit,
            name: 'edit',
            props: true,
            beforeEnter: (to, form, next) => {
                //Check if user is logged in
                axios.get('/api/authenticated').then(()=>{
                    next()                    
                }).catch(()=>{
                    return next({ name: 'home'})
                })
            }
        },
        
        {
            path: '/dodajVjezbu',
            component: dodajVjezbu,
            name: 'dodajVjezbu',
            props: true,
            beforeEnter: (to, form, next) => {
                //Check if user is logged in
                axios.get('/api/authenticated').then(()=>{
                    next()                    
                }).catch(()=>{
                    return next({ name: 'home'})
                })
            }
        },
        
        {
            path: '/vjezbeM',
            component: vjezbeM,
            name: 'vjezbeM',
            props: true,
            beforeEnter: (to, form, next) => {
                //Check if user is logged in
                axios.get('/api/authenticated').then(()=>{
                    next()                    
                }).catch(()=>{
                    return next({ name: 'home'})
                })
            }
        },

        {
            path: '/vjezbeW',
            component: vjezbeW,
            name: 'vjezbew',
             props: true,
            beforeEnter: (to, form, next) => {
                //Check if user is logged in
                axios.get('/api/authenticated').then(()=>{
                    next()                    
                }).catch(()=>{
                    return next({ name: 'home'})
                })
            }
        },
        {
            path: '/plan',
            component: plan,
            name: 'plan',
        },
        {
            path: '/login',
            component: login,
            name: 'login',
            //Checks if user is already logged in. If they are, then redirects them to home
            
            beforeEnter: (to, form, next) => {
                axios.get('api/authenticated').then(()=>{
                    return next({name: 'vjezbeM'})
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