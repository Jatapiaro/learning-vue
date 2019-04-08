<template>
    <div>
        <Navbar />
        <div class="container">
            <transition name="fade">
                <router-view class="content"></router-view>
            </transition>
        </div>
    </div>
</template>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
        opacity: 0
    }
</style>

<script>
    import Navbar from './Navbar';
    export default{
        components: {
            Navbar
        }
    }
</script>
