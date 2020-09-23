import Vue from 'vue'
import Router from 'vue-router'
import Meta from 'vue-meta'
import NotFound from '@/components/NotFound'

// Layouts
import Layout from '@/layout/Layout'

Vue.use(Router)
Vue.use(Meta)

const router = new Router({
    base: '/',
    mode: 'history',
    routes: [{
        path: '/',
        component: Layout,
        children: [
            {
                path: '',
                component: () => import('@/components/Home')
            },
            {
                path: 'add',
                component: () => import('@/components/Form')
            },
            {
                path: 'view/:userId',
                component: () => import('@/components/Usuario')
            },
            {
                path: 'edit/:userId',
                component: () => import('@/components/Form')
            }
        ]
    }, {
        // 404 Not Found page
        path: '*',
        component: NotFound
    }]
})

export default router
