<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    Posts
                    <router-link :to="{ name: 'create-post' }" class="btn btn-primary float-right">Create Post</router-link>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(post, index) in posts" :key="post.id">
                                <td>{{ post.id }}</td>
                                <td>{{ post.title }}</td>
                                <td>{{ post.body }}</td>
                                <td><router-link :to="{name: 'edit-post', params: { id: post.id }}" class="btn btn-primary">Edit</router-link></td>
                                <td><button v-on:click="deletePost(post, index)" class="btn btn-danger">Delete</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import PostService from './../../services/PostService';
    export default {
        data() {
            return {
                posts: [],
                postService: new PostService()
            }
        },
        beforeMount() {
            this.postService.all()
                .then((res) => {
                    this.posts = res;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        methods: {
            deletePost(post, index) {
                this.postService.delete(post)
                    .then(res => {
                        this.posts.splice(index, 1);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            }
        }
    }
</script>
