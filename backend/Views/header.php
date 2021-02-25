<?php
    include_once __DIR__ . "/../../common/src/Service/SecurityService.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Products</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <?php if(SecurityService::isAuthorized()) :  ?>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="?model=product&action=read" class="brand-link">
            <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="/?model=product&action=read" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Products
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/?model=product&action=create" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Products</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/?model=product&action=read" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List of Products</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/?model=category&action=read" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Categories
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/?model=category&action=create" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create a category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/?model=category&action=read" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List of Categories</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/?model=shop&action=read" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Shops
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/?model=shop&action=create" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create a Shop</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/?model=shop&action=read" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List of Shops</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/?model=news&action=read" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    News
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/?model=news&action=create" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create news</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/?model=news&action=read" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List of News</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/?model=order&action=read" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Orders
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/?model=order&action=create" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Order</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/?model=order&action=read" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List of Orders</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/?model=delivery&action=read" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Deliveries
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/?model=delivery&action=create" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Delivery</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/?model=delivery&action=read" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List of Deliveries</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/?model=payment&action=read" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Payments
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/?model=payment&action=create" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Payment</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/?model=payment&action=read" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List of Payments</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
        <!-- /.sidebar -->

    </aside>
    <?php endif; ?>