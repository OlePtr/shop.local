<?php
namespace Models;

class News extends Model
{
    public function all()
    {
        return [
            [
                "title" => "Первая новость",
                "content" => "Это текст первой новости"
            ],
            [
                "title" => "Вторая новость",
                "content" => "Это текст второй новости"
            ],
            [
                "title" => "Третья новость",
                "content" => "Это текст третьей новости"
            ]
        ];
    }

    public function get($id)
    {
        return [
            "title" => "Пример заголовка {$id}",
            "content" => "Пример контента {$id}"
        ];
    }
}