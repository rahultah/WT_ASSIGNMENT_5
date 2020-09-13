<?php

require_once ("../wt5ref/php/component.php");
require_once ("../wt5ref/php/crud.php");
getData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie DB Management</title>
        <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/bundle.js"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="js/shift.js"></script>
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/047674fea6.js" crossorigin="anonymous"></script>
    
        

   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
            <a href="" class="navbar-brand mr-auto">Movie Database Management</a>
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li id="btn1" class="nav-item active"><a class="nav-link" onclick="page_selector('Page1','Page2','Page3');myFunction();" href="#"> <span class="fa fa-home fa-lg"></span> Home</a></li>
                    <li id="btn2" class="nav-item"><a class="nav-link" onclick="page_selector('Page2','Page1','Page3'); myFunction2();" href="#"> <span class="fa fa-wpforms fa-lg"></span> Add Movie</a></li>
                    <li id="btn3" class="nav-item"><a class="nav-link" onclick="page_selector('Page3','Page2','Page1');myFunction3();" href="#" href="#"> <span class="fa fa-list fa-lg"></span> Show Movies</a></li>

    
                </ul>
            </div>
            
        </div>
    </nav>
    <header class="jumbotron">
            <div class="container">
                <div class="row row-header">
                    <div class="">
                        <h1>Movie DB Management</h1>
                        <p>Gather all the movies you need in one place</p>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
        </header>


<div id="Page1">

    <div class="container text-center">

        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-id-badge'></i>","ID", "movie_id",setID()); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-ticket-alt'></i>","Movie Name", "movie_name",""); ?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("<i class='far fa-user'></i>","Movie Actor", "movie_actor",""); ?>
                    </div>
                    <div class="col">
                        <?php inputElement("<i class='fas fa-calendar-week'></i>","Release Year", "rel_year",""); ?>
                    </div>
                </div>
                <div class="justify-content-center">
                        <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'>Create</i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                        <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'>READ</i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                        <?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'>UPDATE</i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                        <?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'>DELETE</i>","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                        <?php deleteBtn();?>
                </div>
                
            </form>
        </div>
    </div>

        <!-- Bootstrap table  -->
        <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Movie Name</th>
                        <th>Movie Actor</th>
                        <th>Release Year</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                   <?php


                   if(isset($_POST['read'])){
                       $result = getData();

                       if($result){

                           while ($row = mysqli_fetch_assoc($result)){ ?>

                               <tr>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['movie_name']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['movie_actor']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo '$' . $row['rel_year']; ?></td>
                                   <td ><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>"></i></td>
                               </tr>

                   <?php
                           }

                       }
                   }


                   ?>
                </tbody>
            </table>
        </div>


    </div>
    


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="../wt5ref/php/main.js"></script>
</body>
</html>