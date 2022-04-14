<template>
    <div class="WeatherTable">
        <div class="container">
            <b-table
                :items="items"
                :fields="fields"
                :sort-by.sync="sortBy"
                :sort-desc.sync="sortDesc"
                responsive="sm"
            >
            </b-table>

            <Spin v-show="spin"></Spin>

        </div>
    </div>
</template>

<script>
import axios from "axios";
import Spin from '../components/UI/Spinner';
import {mapActions, mapState, mapGetters, mapMutations} from 'vuex'

export default {
    data() {
        return {
            sortBy: 'age',
            sortDesc: false,
            fields: [
                { key: 'city_name', sortable: true },
                { key: 'dt_txt', sortable: true },
                { key: 'temp', sortable: true },
                { key: 'description', sortable: true },
            ],
            items: []
        }
    },
    components: {
      Spin
    },
    mounted() {
        this.getWeathers();
        this.spin = false
        axios.get(`api/history`)
            .then(res => {
                this.items = res.data.data
                this.spin = false
        })
    },
    computed: {
        ...mapGetters({
            weathers: 'weathers'
        }),
        ...mapState({
            spin: state => state.spin,
            weathers: state => state.weathers,
        })

    },
    methods: {
        ...mapActions({
            getWeathers: 'getWeathers',
            createWeather: 'createWeather'
        }),
        ...mapMutations({
            load_items: 'load_items',
            show_weather: 'show_weather'
        }),
    }
}
</script>


<style lang="scss" scoped>
.WeatherTable{
    position: absolute;
    top: 104px;
    width: 100%;
}
</style>
