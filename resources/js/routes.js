const Welcome = () => import('./components/Welcome.vue')
const ProcessList = () => import('./components/process/AllProcess.vue')
const ProcessCreate = () => import('./components/process/CreateProcess.vue')
const ProcessEdit = () => import('./components/process/EditProcess.vue')
export const routes = [
    {
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'processList',
        path: '/process',
        component: ProcessList
    },
    {
        name: 'processEdit',
        path: '/process/:id/edit',
        component: ProcessEdit
    },
    {
        name: 'processAdd',
        path: '/process/add',
        component: ProcessCreate
    }
]