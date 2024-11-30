<?php
require_once "models/Product.php";

class ProductController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function index()
    {
        $products = $this->productModel->getAll();
        include "views/products/index.php";
    }

    public function create()
    {
        include "views/products/create.php";
    }

    public function store()
    {
        $title = $_POST['title'];
        $price = $_POST['price'];
        $product = new Product();
        $product->create($title, $price);
        header("Location: index.php");
    }


    public function edit()
    {
        $id = $_GET['id'];
        $productModel = new Product();
        $product = $productModel->getById($id);
        include "views/products/edit.php";
    }

    public function update()
    {
        $id = $_GET['id'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $product = new Product();
        $product->update($id, $title, $price);
        header("Location: index.php");
    }


    public function delete()
    {
        $id = $_GET['id'];
        $product = new Product();
        $product->delete($id);
        header("Location: index.php");
    }
}
