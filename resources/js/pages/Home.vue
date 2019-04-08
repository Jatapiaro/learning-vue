<template class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Home Component</div>

                <div class="card-body">
                    <h1 v-if="value > 0.5">Vue is awesome!</h1>
                    <h1 v-else>Oh no 😢</h1>
                    <button v-on:click="changeValue(Math.random())">Ok</button>
                    <!--<h1>{{changeValue(Math.random())}}</h1>-->
                    <h1>{{value}}</h1>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                value: 0.0
            }
        },
        methods: {
            changeValue(number = 0.0) {
                this.value = number
            }
        }
    }
</script>
