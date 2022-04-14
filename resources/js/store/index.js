import Vue from 'vue'
import Vuex from 'vuex'
import axios from "axios";
const prefix = '/api/history';

Vue.use(Vuex)

export default new Vuex.Store({
    state: () => ({
        weathers: [],
        spin: true
    }),
    mutations: {
        load_items(state, data) {
            state.weathers = data
            state.spin = false
            console.log(state.weathers)
        },
        show_weather(state, data) {

        }
    },
    getters: {
        weathers: state => state.weathers,
    },
    actions: {
        getWeathers(context) {
            axios.get(prefix).then(res => {
                context.commit('load_items', res.data.data)
            }).catch(err => {
                console.log(err)
            })
        },
        createWeather(context, data) {
            axios.post(prefix, data).then(res => {
                console.log(res)
            }).catch(err => {
                console.log(err.response)
            })
        },
    }
})
