<?php

require_once ("db.php");
require_once ("component.php");

$con = Createdb();

// create button click
if(isset($_POST['create'])){
    createData();
    getData();
}

if(isset($_POST['update'])){
    UpdateData();
    getData();
}

if(isset($_POST['delete'])){
    deleteRecord();
    getData();
}

if(isset($_POST['deleteall'])){
    deleteAll();
    getData();

}

function createData(){
    $moviename = textboxValue("movie_name");
    $movieactor = textboxValue("movie_actor");
    $relyear = textboxValue("rel_year");

    if($moviename && $movieactor && $relyear){

        $sql = "INSERT INTO movie (movie_name, movie_actor, rel_year) 
                        VALUES ('$moviename','$movieactor','$relyear')";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Record Successfully Inserted...!");
        }else{
            echo "Error";
        }

    }else{
            TextNode("error", "Provide Data in the Textbox");
    }
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}


// messages
function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}


// get data from mysql database
function getData(){
    $sql = "SELECT * FROM movie";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}

// update dat
function UpdateData(){
    $movieid = textboxValue("movie_id");
    $moviename = textboxValue("movie_name");
    $movieactor = textboxValue("movie_actor");
    $relyear = textboxValue("rel_year");
    

    if($moviename && $movieactor && $relyear){
        $sql = "
                    UPDATE movie SET movie_name='$moviename', movie_actor = '$movieactor', rel_year = '$relyear' WHERE id='$movieid';                    
        ";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Data Successfully Updated");
        }else{
            TextNode("error", "Enable to Update Data");
        }

    }else{
        TextNode("error", "Select Data Using Edit Icon");
    }


}


function deleteRecord(){
    $movieid = (int)textboxValue("movie_id");

    $sql = "DELETE FROM movie WHERE id=$movieid";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","Record Deleted Successfully...!");
    }else{
        TextNode("error","Enable to Delete Record...!");
    }

}


function deleteBtn(){
    $result = getData();
    $i = 0;
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $i++;
            if($i > 3){
                buttonElement("btn-deleteall", "btn btn-danger" ,"<i class='fas fa-trash'></i> Delete All", "deleteall", "");
                return;
            }
        }
    }
}


function deleteAll(){
    $sql = "DROP TABLE movie";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","All Record deleted Successfully...!");
        Createdb();
    }else{
        TextNode("error","Something Went Wrong Record cannot deleted...!");
    }
}


// set id to textbox
function setID(){
    $getid = getData();
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['id'];
        }
    }
    return ($id + 1);
}








