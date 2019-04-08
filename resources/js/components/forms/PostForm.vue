<template>
    <div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Post Title:</label>
                    <input type="text" class="form-control" v-model="post.title">
                    <div v-if="errors['post.title']" class="invalid-feedback">
                        {{errors['post.title'].join(' ')}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Post Body:</label>
                    <textarea class="form-control" v-model="post.body" rows="5"></textarea>
                    <div v-if="errors['post.body']" class="invalid-feedback">
                        {{errors['post.body'].join(' ')}}
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="form-group">
            <button class="btn btn-primary">Create</button>
        </div>
    </div>
</template>

<script>
    import Post from './../../models/Post';
    export default {
        props: {
            post: {
                type: Object,
                default: () => ({}),
            },
            errors: {
                type: Object,
                default: () => ({}),
            }
        }
    }
</script>
