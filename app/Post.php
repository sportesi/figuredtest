<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as MongoModel;

class Post extends MongoModel
{
    protected $connection = 'mongodb';

    protected $fillable = ['title', 'body'];

    public function getBody()
    {
        return nl2br(join(PHP_EOL, $this->body));
    }
}
