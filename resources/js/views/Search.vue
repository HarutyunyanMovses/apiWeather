<template>
    <div class="parentDiv">
        <div style="display: flex; justify-content: center" >
            <MyInput :search="search" @search="loadSearchingParams" @spin="spinTrue"></MyInput>
        </div>
        <Spin v-if="spin"></Spin>
        <div v-for="data in results" class="searchItems" v-if="itemList">
            <div @click="showList(data)"> {{data.name }}</div>
        </div>
        <div class="weatherResponseParent">
            <div v-if="info != null" class="container weatherResponse">
                <div v-for="list in info" class="cardItem">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-4 col-sm-12 col-xs-12 component">
                                <div class="card p-4">
                                    <div class="d-flex">
                                        <h6 class="flex-grow-1" style="text-align: left">{{city.name}}</h6>
                                        <h6>{{list.dt_txt}}</h6>
                                    </div>
                                    <div class="d-flex flex-column temp mt-5 mb-3">
                                        <h1 class="mb-0 font-weight-bold" id="heading"> {{Math.floor(list.main.temp - 276.76)}}° C </h1> <span class="small grey">{{list.weather[0].description.charAt(0).toUpperCase() + list.weather[0].description.slice(1)}}</span>
                                    </div>
                                    <div class="d-flex">
                                        <div class="temp-details flex-grow-1">
                                            <p class="my-1"> <img :src="require('../assets/images/B111.png').default" height="17px"> <span> {{list.wind.speed}} km/h </span> </p>
                                            <p class="my-1"> <font-awesome-icon icon="fas fa-tint mr-2" aria-hidden="true"/> <span> {{list.main.humidity}}% </span> </p>
                                            <p class="my-1"> <img :src="require('../assets/images/w1111.png').default" height="17px"> <span> {{list.pop}}h </span> </p>
                                        </div>
                                        <div> <img :src="`http://openweathermap.org/img/wn/${list.weather[0].icon}@2x.png`" width="100%"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import MyInput from '../components/UI/MyInput'
import Spin from '../components/UI/Spinner'
export default {
    name: 'Search',
    data() {
        return  {
            spin: null,
            search: '',
            itemList: null,
            results: '',
            info: null,
            city: ''
        }
    },
    components: {
        MyInput,
        Spin
    },
    methods: {
        spinTrue(status) {
            this.spin = status
        },
        loadSearchingParams(city) {
            axios.post('/api/search', {search: city})
                .then(res => {
                    this.results = res.data.data;
                    this.itemList = true
                    this.spin = false;
                }) //storage
        },
        showList (val) {
            this.city = val
            this.itemList = false
            this.search = val.name
            var arr = []
            axios.post(`/api/search-weather/`, {
                lat: val.lat,
                lng: val.lng
            }).then(res => {
                for (let i = 0; i < res.data.list.length; i++) {
                    if(i % 8 === 0) {
                        arr.push(res.data.list[i])
                        console.log(res)
                        axios.post('api/history', {
                            city_name: val.name,
                            dt_txt: res.data.list[i].dt_txt,
                            temp: res.data.list[i].main.temp - 276.76,
                            description: res.data.list[i].weather[0].description,
                            speed: res.data.list[i].wind.speed,
                            humidity: res.data.list[i].main.humidity,
                            list_pop: res.data.list[i].pop,
                            weather_icon: res.data.list[i].weather[0].icon
                        })
                            .then(()=>{
                                console.log('successfully inserted')
                            })

                    }
                }
                this.info = arr;
            })

        }
    },
}
</script>

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Marcellus&display=swap');

.parentDiv{
    text-align: center;
    position: absolute;
    width: 100%;
    top: 89px;
    .searchItems{
        text-align: center;
        display: flex;
        justify-content: center;
        div{
            list-style: none;
            cursor: pointer;
            width: 60%;
            color: #0d6efd;
            font-size: 20px;
            font-weight: 400;
        }
        div:hover{
            background: #e0dce9;
            color: #1eb8b8;
            font-weight: 500;
        }
    }

    .myBtn{
        align-self: end;
        button{
            padding: 15px 50px;
        }
    }
}
html,
body {
    height: 100%
}

* {
    padding: 0px;
    margin: 0px
}

body {
    background-color: #a5a5b1;
    display: grid;
    place-items: center
}

.card {
    background-color: #ffffff;
    border-radius: 50px;
    color: #6f707d;
    font-family: 'Marcellus', serif
}

#heading {
    font-size: 55px;
    color: #2b304d
}

.temp {
    place-items: center
}
.temp-details{
    text-align: start;
}
.temp-details>p>span,
.grey {
    color: #a3acc1;
    font-size: 12px
}

.fa {
    color: #a5a5b1
}

*:focus {
    outline: none
}
.weatherResponseParent {
    display: flex;
    justify-content: center;
    @media(min-width: 780px) {
        .weatherResponse {
            display: grid;
            grid-template-areas: 'header header';
            gap: 10px;
        }
    }
    @media(max-width: 576px) {
        .cardItem {
            margin: 20px;
        }
    }
    .component {
        width: 100%;
    }
}
</style>
