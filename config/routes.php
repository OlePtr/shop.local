<?php
    return [
        "/" => "Index/show",
        "/news/" => "News/index",
        "/news/(\d+)" => "News/show",
        "/admin/news/" => "Admin/News/index",
        "/admin/news/add" => "Admin/News/add",
        "/admin/news/create" => "Admin/News/create",
    ];