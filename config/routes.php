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

        "/catalog/" => "Catalog/index",
        "/catalog/(\d+)" => "Catalog/show",
        "/admin/catalog/" => "Admin/Catalog/index",
        "/admin/catalog/add" => "Admin/Catalog/add",
        "/admin/catalog/create" => "Admin/Catalog/create",
        "/admin/catalog/edit/(\d+)" => "Admin/Catalog/edit",
        "/admin/catalog/save/(\d+)" => "Admin/Catalog/save",
        "/admin/catalog/delete/(\d+)" => "Admin/Catalog/delete",
    ];