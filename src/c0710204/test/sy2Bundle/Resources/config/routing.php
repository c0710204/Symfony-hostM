<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('c0710204testsy2_homepage', new Route('/hello/{name}', array(
    '_controller' => 'c0710204testsy2Bundle:Default:index',
),array(
        '_method' => 'GET',
)));
$collection->add('books', new Route('/books/', array(
    '_controller' => 'c0710204testsy2Bundle:books:index',
),array(
        '_method' => 'GET',
)));
$collection->add('books_create', new Route('/books/', array(
    '_controller' => 'c0710204testsy2Bundle:books:create',
),array(
        '_method' => 'POST',
)));
$collection->add('books_new', new Route('/books/new', array(
    '_controller' => 'c0710204testsy2Bundle:books:new',
),array(
        '_method' => 'GET',
)));
$collection->add('books_show', new Route('/books/{id}', array(
    '_controller' => 'c0710204testsy2Bundle:books:show',
),array(
        '_method' => 'GET',
)));
$collection->add('books_edit', new Route('/books/{id}/edit', array(
    '_controller' => 'c0710204testsy2Bundle:books:edit',
),array(
        '_method' => 'GET',
)));
$collection->add('books_update', new Route('/books/{id}', array(
    '_controller' => 'c0710204testsy2Bundle:books:update',
),array(
	'_method' => 'PUT',
)));
$collection->add('books_delete', new Route('/books/{id}', array(
    '_controller' => 'c0710204testsy2Bundle:books:delete',
),array(
        '_method' => 'DELETE',
)));
$collection->addCollection($loader->import("@c0710204testsy2Bundle/Resources/config/routing.yml"));
return $collection;
