<?php
namespace App\Services;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Validator;

use App\Models\Post;

class PostService {

    /**
     * Stores the given item
     *
     * @return App\Models\Post
     */
    public function store($data) {
        $this->validate($data);
        $item = Post::create($data['post']);
        return $item;
    }

    /**
     * Updates the $post with $data
     *
     * @param array $data
     * @param Post $post
     * @return App\Models\Post
     */
    public function update($data, Post $item) {
        $this->validate($data);
        $item->update($data['post']);
        return $item;
    }

    /**
     * Validate the given data using the validation book of the model
     *
     * @param array $data
     * @param array $except
     * @param array $append
     * @return boolean
     */
    public function validate($data, $except = [], $append = []) {
        $vb = Post::ValidationBook($except, $append);
        $validator = Validator::make($data, $vb['rules'], $vb['messages']);
        if ($validator->fails()) {
            $errors = $validator->errors();
            throw ValidationException::withMessages($errors->toArray());
        }
        return true;
    }
}
