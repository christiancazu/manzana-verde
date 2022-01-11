import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import('../views/Index.vue'),
    redirect: { name: 'Orders' },
    children: [
      {
        path: 'orders',
        component: () => import('../layouts/MainLayout.vue'),
        children: [
          {
            path: '',
            name: 'Orders',
            component: () => import('../views/Orders.vue')
          }
        ]
      },
      {
        path: 'lunchs',
        component: () => import('../layouts/AlterLayout.vue'),
        children: [
          // {
          //   path: '',
          //   name: 'ListLunchs',
          //   component: () => import('../views/ListLunchs.vue')
          // },
          {
            path: ':codeDate',
            name: 'Lunchs',
            component: () => import('../views/Lunchs.vue')
          }
        ]
      }
    ]
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
