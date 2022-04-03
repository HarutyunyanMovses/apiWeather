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

export default {
    data() {
        return {
            arr: [],
            spin: true,
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
        axios.get(`api/history`)
            .then(res => {
                this.items = res.data.weathers
                this.spin = false
        })
    },
    methods: {
        showItem(val) {
            axios.get(`api/history/${val.created_at}`)
                .then(res => {
                    console.log(res)
                })
        }
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
