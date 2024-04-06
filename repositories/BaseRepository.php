<?php
abstract class BaseRepository
{
    protected $model;
    public function __construct(mixed $model) {
        $this->model = $model;
    }
    
    abstract function getAll(mixed $params = null):array|bool;

    abstract function getOne(mixed $params = null):mixed;

    abstract function update(mixed $params = null):array|bool;

}
