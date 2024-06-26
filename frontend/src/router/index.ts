import { createRouter, createWebHistory } from 'vue-router'
import axiosInstance from '@/plugins/axios'
import { useAuthStore } from '@/stores/auth-store'
import { createAcl, defineAclRules } from 'vue-simple-acl'
const simpleAcl=createAcl()
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/admin/dashboard',
      name: 'dashboard',
      component: () => import('../views/Admin/DashboardView.vue'),
      meta: {
        requiresAuth: true,
        role: 'admin'
      }
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/Admin/Auth/LoginView.vue')
    },
    {
      path: '/landing',
      name: 'landing',
      component: () => import('../views/Web/HomeView.vue')
    },
    {
      path: '/profile',
      name: 'profile',
      component: () => import('../views/Web/ProfileView.vue')
    },
    {
      path: '/post',
      name: 'post',
      component: () => import('../views/Web/Post/ListView.vue')
    }
  ]
})

router.beforeEach(async (to, from, next) => {
  const publicPages = ['/landing','/login']
  const authRequired = !publicPages.includes(to.path)
  const store = useAuthStore()

  try {
    const { data } = await axiosInstance.get('/me')

    store.isAuthenticated = true
    store.user = data.data

    store.permissions = data.permissions.map((item: any) => item.front_name)
    store.roles = data.roles.map((item: any) => item)
    const rules = () => defineAclRules((setRule) => {
      store.permissions.forEach((permission: string) => {
        setRule(permission, () => true)
      })
    });
    simpleAcl.rules = rules()
    console.log(simpleAcl.rules)
  } catch (error) {
    /* empty */
  }
  if (authRequired && !store.isAuthenticated) {
    next('/landing')
  } else {
    next()
  }
})

export default { router,simpleAcl }
