<template>
    <div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <router-link to="/" class="nav-link">Home</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/create-post" class="nav-link">Create Post</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/posts" class="nav-link">Posts</router-link>
                </li>
            </ul>
        </nav>
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
    export default{
    }
</script>
