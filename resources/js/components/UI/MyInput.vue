<template>
    <div class="myInput">
        <label>Enter City</label>
        <b-form-input @keyup="loadSearchingParams" @keydown="spinTrue" :value="search, spin" trim></b-form-input>
    </div>
</template>

<script>
export default {
    name: 'my-input',
    props: {
        search: {
            type: String,
            required: true
        },
        spin: {
            type: Boolean,
        }
    },
    methods: {
        loadSearchingParams(event) {
            this.$emit('search', event.target.value)
        },
        spinTrue(event) {
            if(event.target.value == '') {
                this.$emit('spin', false)
            }else{

                this.$emit('spin', true)
            }
        }
    }
}
</script>


<style lang="scss" scoped>
.myInput{
    display: flex;
    flex-direction: column;
    text-align: left;
    justify-content: center;
    width: 60%;
    margin-top: 50px;
    margin-bottom: 20px;
    .inp{
        padding: 15px 10px;
    }
}
</style>
