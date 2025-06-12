<!-- //html form  with post method -->
<fieldset>
<form method = "post">  
<input name = "name"  placeholder = "Enter your name"></input>
<br>
<input name = "animal"  placeholder = "Write your animal"></input>
<br>
<input name = "color" placeholder = "Write your fav color"></input>
<br>
<button type = "Submit">Submit with Post</button> 
</form></fieldset> 

<!-- //html form  with get method -->
<fieldset>
<form method = "get">  
<input name = "name"  placeholder = "Enter your name"></input>
<br>
<input name = "animal" placeholder = "Write your animal"></input>
<br>
<input name = "color"   placeholder = "Write your fav color"></input>
<br>
<button type = "Submit">Submit with Get</button> 
</form>
</fieldset>

<!--------------------------------------------------------------------------->

<pre>
<?php
// starting session, needed for the $_session [user] variable below
session_start();


// Creating associative array for the user with information from the submitted html form 
$_SESSION["user"] = [ 
    "name" => "", 
    "color" => "",
    "animal" => ""];


// function for creating a peronal message using the data in the user array 
function personalMessage(){
$usersName = $_SESSION["user"]["name"];
$favAnimal = $_SESSION["user"]["animal"];
$favColor = $_SESSION["user"]["color"];


    return "Hello, ". $usersName . " my favorite animal is also " . $favAnimal . ". Your favorite color " . $favColor . " is marvelous!";
}


// If check, if post or get method was used and the input fields wasn't empty. if filled uses the path for usedmethod (post or get) retrieves data,
// and filters it with htmlspecalchars then updates the user array with the fildered data. Runs the function personal message and writes superglobals. 

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['name']) && !empty($_POST['animal']) && !empty($_POST['color'])){
    $name = htmlspecialchars($_POST['name']);
    $animal = htmlspecialchars($_POST['animal']);
    $color = htmlspecialchars($_POST['color']);

    $_SESSION["user"] = [
    "name" => "$name", 
    "color" => "$color",
    "animal" => "$animal"];


   
    echo personalMessage() . "<br>";
   

    echo "==== POST ====<br>";
    print_r($_POST);
    
    echo "==== SESSION ====<br>";
    print_r($_SESSION);
    
    echo "==== REQUEST ====<br>";
    print_r($_REQUEST);

    echo "==== SERVER ====<br>";
    print_r($_SERVER);
} 
elseif ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['name']) && !empty($_GET['animal']) && !empty($_GET['color'])){
    $name = htmlspecialchars($_GET['name']);
    $animal = htmlspecialchars($_GET['animal']);
    $color = htmlspecialchars($_GET['color']);

    $_SESSION["user"] = [
    "name" => "$name", 
    "color" => "$color",
    "animal" => "$animal"];

    echo personalMessage() . "<br>";
 

    echo "==== GET ====<br>";
    print_r($_GET);

    echo "==== SESSION ====<br>";
    print_r($_SESSION);

    echo "==== REQUEST ====<br>";
    print_r($_REQUEST);

    echo "==== SERVER ====<br>";
    print_r($_SERVER);
}


?>
<!-- ^^end of php^^  -->
</pre>


 

