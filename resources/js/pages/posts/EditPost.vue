<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Edit Component</div>

                <div class="card-body">
                    <form @submit.prevent="handlePostEdit">
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
                errors: {}
            }
        },
        beforeMount() {
            let postService = new PostService();
            postService.show(this.$route.params.id)
                .then(res => {
                    this.post.fillWithResponseData(res);
                })
                .catch(err => {
                    console.log(err);
                });
        },
        components: {
            PostForm
        },
        methods: {
            handlePostEdit() {
                let postService = new PostService();
                postService.update(this.post)
                .then(res => {
                    this.$router.push({ path: '/posts' });
                })
                .catch(err => {
                    this.errors = err.errors;
                });
            }
        }
    }
</script>
