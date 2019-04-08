<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    Create Post
                </div>
                <div class="card-body">
                    <form @submit.prevent="handlePostCreate">
                        <PostForm v-bind:post="post" v-bind:errors="errors"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Post from './../../models/Post';
    import PostForm from './../../components/forms/PostForm';
    import PostService from './../../services/PostService';
    export default {
        data() {
            return {
                post: new Post(),
                postService: new PostService(),
                errors: {}
            }
        },
        methods: {
            handlePostCreate() {
                this.postService.store(this.post)
                    .then(res => {
                        this.$router.push({ path: '/posts' });
                    })
                    .catch(err => {
                        this.errors = err.errors;
                    });
            }
        },
        components: {
            PostForm
        }
    }
</script>
