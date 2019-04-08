export default class Post {

    constructor() {
        this.id = -1;
        this.title = "";
        this.body = "";
    }

    fillWithResponseData(post) {
        this.id = post.id;
        this.title = post.title;
        this.body = post.body;
    }

}
