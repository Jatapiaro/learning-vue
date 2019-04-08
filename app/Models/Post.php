<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body'
    ];

    /**
     * Returns the rules and messages for validating this creation
     */
    public static function ValidationBook($except = [], $append = []) {
        $book = ['rules' => [], 'messages' => []];
        $book['rules'] = [
            'post.title' => 'required|string',
            'post.body' => 'required|string'
        ];
        $book['messages'] = [
            'post.title.required' => 'El título es requerido.',
            'post.title.string' => 'El título debe ser un texto.',

            'post.body.required' => 'El cuerpo del post es requerido.',
            'post.body.string' => 'El cuerpo del post debe ser un texto.',
        ];
        if (!empty($except)) {
            $except = array_flip($except);
            $book['rules'] = array_diff_key($book['rules'], $except);
        }
        if (!empty($append)) {
            $book = array_merge_recursive($book, $append);
        }
        return $book;
    }
}
