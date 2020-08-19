/*jshint esversion:8 */
import Vue from 'vue';
import VueRouter from 'vue-router';
import HomePage from './pages/HomePage.vue';
import LoginPage from './pages/LoginPage.vue';
import DefaultLayout from './pages/DefaultLayout.vue';
import StudentVoucherPage from './pages/StudentVoucherPage.vue';
import BankDashboardPage from './pages/BankDashboardPage.vue';
import AdminDashboardPage from './pages/AdminDashboardPage.vue';

Vue.use(VueRouter);


const routes = 
        [
            { path: '/', component: DefaultLayout,
                children: [
                    { path: '/', component: HomePage, name: 'home' },
                    { path: '/login', component: LoginPage },
                    { path: '/student', component: StudentVoucherPage, name: 'student.page' },
                    { path: '/bank', component: BankDashboardPage, name: 'bank.dashboard' },
                    { path: '/dashboard', component: AdminDashboardPage, name: 'admin.dashboard' },
                ]
            },
            
    
        ];


const router = new VueRouter({
    routes: routes,
    mode: "history"
});


export default router;
