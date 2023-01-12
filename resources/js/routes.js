import AllProcess from './components/AllProcess.vue';
import CreateProcess from './components/CreateProcess.vue';
import EditProcess from './components/EditProcess.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllProcess
    },
    {
        name: 'create',
        path: '/create',
        component: CreateProcess
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditProcess
    }
];