<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="sty.css" />
     <link rel="stylesheet" href="markscss.css">
     <title>Mid-1 Marks</title>
   </head>
<body>
  <?php
        session_start();
      if (! isset ( $_SESSION ['user'] ) || $_SESSION ['user'] == false)
                  {
                   header ( "Location: home.html" );
                   exit ();
                   } 
    ?>
  <div class="container">
    <div class="title">Mid-1 Marks</div>
    <div class="content">
      <form action="updatemid1.php" method="get">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Stu_ID</span>
            <input type="text" placeholder="Enter Student ID" required name="stu_id">
          </div>
          <div class="input-box">
            <span class="details">Sub_ID</span>
            <input type="text" placeholder="Enter Subject ID" required name="sub_id">
          </div>
          <div class="input-box">
            <span class="details">MID-Marks</span>
            <input type="text" placeholder="Enter Mid-Marks obtained" required name="marks">
          </div>
          <div class="input-box">
            <span class="details">ONLINE-marks</span>
            <input type="text" placeholder="Enter Online-Marks obtained" required name="omarks">
          </div>
</div>	
			   <div class="button">
          <input type="submit" value="Update">
        </div><br>
        <a href='teacher.php'> Go To Menu</a>
      </form>
    </div>
  </div>
</body>
</html>