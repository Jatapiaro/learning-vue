import HttpService from "./HttpService";

export default class PostService {

    constructor() {
        this.httpService = new HttpService()
        this.route = "/posts";
    }

    all() {
        return this.httpService.makeGet(this.route)
            .then((response) => {
                return Promise.resolve(response);
            })
            .catch((errorData) => {
                return Promise.reject(errorData);
            });
    }

    store(post) {
        let data = {
            post: post
        };
        return this.httpService.makePost(this.route, data)
            .then((response) => {
                return Promise.resolve(response);
            })
            .catch((errorData) => {
                return Promise.reject(errorData);
            });
    }

    delete(post) {
        let route = `${this.route}/${post.id}`;
        return this.httpService.makeDelete(route)
            .then((response) => {
                return Promise.resolve(response);
            })
            .catch((errorData) => {
                return Promise.reject(errorData);
            })
    }

    show(id) {
        let route = `${this.route}/${id}`;
        return this.httpService.makeGet(route)
            .then(res => {
                return Promise.resolve(res);
            })
            .catch(err => {
                return Promise.reject(err);
            });
    }

    update(post) {
        let route = `${this.route}/${post.id}`;
        let data = {
            post: post
        };
        return this.httpService.makePut(route, data)
            .then(res => {
                return Promise.resolve(res);
            })
            .catch(err => {
                return Promise.reject(err);
            });
    }

}
