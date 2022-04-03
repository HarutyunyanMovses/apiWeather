import Vue from 'vue'
import Router from 'vue-router'
import Search from '../views/Search'
import History from '../views/History'
import Home from '../views/Home'


Vue.use(Router)

const routes = [
    { path: '/', name: 'Search', component: Search },
    { path: '/history', name: 'History', component: History },
    { path: '/home', name: 'Home', component: Home }
]

export default new Router({
    mode: 'history',
    routes
})
