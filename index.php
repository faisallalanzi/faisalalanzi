<?php


$conn = mysqli_connect('localhost','root' , 'root' , 'win');
if(!$conn){
   echo 'Error:' .mysqil_connect_error(); 
}
$fristname = $_POST['fristname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];


if(isset($_POST['submit'])){
//echo $fristname . ' ' . $lastname . ' ' . $email;

$sql = "INSERT INTO users(fristname , lastname , email) 
VALUES ('$fristname' , '$lastname' , '$email')";

mysqli_query($conn , $sql);

}

$sql = 'SELECT * from users ORDER BY RAND() lIMIT 5 ';
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result , MYSQLI_ASSOC);

$winner = array_rand($users);

echo 'الفائز: ' . $users[$winner]['fristname'] . ' ' . $users[$winner]['lastname'];


mysqli_free_result($result);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="./css/style.css">
<title>Document</title>
</head>
<body>





<script>
// Set the date we're counting down to
var countDownDate = new Date("apr 20, 2024 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  
  document.getElementById("demo").innerHTML = days + "يوم " + hours + "ساعه "
  + minutes + "دقيقه " + seconds + "ثانيه ";
  
  

 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);

 const win = document.queryselector("#winner");

 const cards = document.queryselector("#cards");

win.addEventlistener('click' , function(){
mymodal.show();
});

</script>






<div class="container">

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
  <div class="col-md-5 p-lg-5 mx-auto my-5">
    <img src="images/1.jpg">
    <h1 class="display-4 font-weight-normal">اربح مع فيصل </h1>
    <p class="lead font-weight-normal">باقي على فتح التسجيل</p>
    <h3 id="demo"></h3>
    <a class="btn btn-outline-secondary" href="#"> للسحب على ربح نسخه مجانيه من برنامج</a>
    <p class="lead font-weight-normal">cooming soon...</p>
  </div>
  <div class="product-device shadow-sm d-none d-md-block"></div>
  <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>



<ul class="list-group list-group-flush">
  <li class="list-group-item">تابع البث المباشر  </li>
  <li class="list-group-item"> ساقوم بث مباشر لمدة ساعه</li>
  <li class="list-group-item">خلال فترة الساعه سيتم فتح صفحة التسجيل</li>
  <li class="list-group-item">بنهاية البث سيتم اختيار الفائز</li>
  <li class="list-group-item">الرابح سيحصيل على نسخة مجانيه من كامتريا</li>

<center>
  <form action="index.php" method="POST">
    <h3>الرجاء ادخل المعلومات</h3>
  <div class="form-group">
    <label for="fristname">الاسم الاول</label>
    <input type="text"name="fristname"  class="form-control" id="fristname" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text error"></small>
  </div>

  <div class="form-group">
    <label for="lastname">الاسم الاخير</label>
    <input type="text" name="lastname" class="form-control" id="lastname" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text error"></small>
  </div>


  <div class="form-group">
    <label for="email">البريد الالكتروني</label>
    <input type="text" name="email"  class="form-control" id="email" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text error"></small>
  </div>


 
  </div>
  <button type="submit" name="submit" class="btn btn-primary">ارسال المعلومات</button>
  
</form>
</center>







</ul>
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
  <div class="col-md-5 p-lg-5 mx-auto my-5">



</div>
</div>






</div>
<!------
<form action="index.php" method="POST">
<input type="text" name="fristname" id="fristname" placeholder="frist name">
<input type="text" name="lastname" id="lastname"  placeholder="last name">
<input type="text" name="email" id="email"  placeholder="email">
<input type="submit" name="submit" value="send">
</form>
----->

<button id="winner" type="button">اختيار الرابح</button>

<div id="cards" class="row mb-5 pb-5">

<?php foreach($users as $users): ?>
  <div class="col-sm-6">
    <div class="card my-2 bg-light" >
      <div class="card-body">
<h5 class="card-title"><?php echo htmlspecialchars($users['fristname']).' ' . htmlspecialchars($users['lastname']).'<br> ' ?></h5>
<p class="card-text"><?php echo htmlspecialchars($users['email'])?></p>
</div>
</div>
</div>

<?php endforeach; ?>

</div>

