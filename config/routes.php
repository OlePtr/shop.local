<?php
    return [
        "/" => "Index/show",
        "/news/" => "News/index",
        "/news/(\d+)" => "News/show",
        "/admin/news/" => "Admin/News/index",
        "/admin/news/add" => "Admin/News/add",
        "/admin/news/create" => "Admin/News/create",
        "/admin/news/edit/(\d+)" => "Admin/News/edit",
        "/admin/news/save/(\d+)" => "Admin/News/save",
        "/admin/news/delete/(\d+)" => "Admin/News/delete",
    ];