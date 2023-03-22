<?php
session_start();
include "../config/base_url.php";
include "../config/db.php";

$blog_id = $_GET["id"];

$blog_data_query = mysqli_query($conn, "SELECT * FROM blogs WHERE id=$blog_id");
$blog_data = mysqli_fetch_assoc($blog_data_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Добавление нового блога</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/all.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php
        include "header.php"
    ?>
        <!-- Modal войти -->
    <?php
        include "login.php"
    ?>
        <!-- Modal -->
    <?php
        include "registration.php"
    ?>

<div class="container" style="margin-top:100px">
    <h2>Редактировать блог</h2>
    <?php
			if (isset($_GET["error"]) && $_GET["error"] == 1) {
				echo '<p class="text-danger"> Заголовок или описание не могут быть пустыми!</p>';
			}
	?>
    <form class="" action="<?=$BASE_URL?>/api/blogs/update.php?id=<?=$blog_id ?>" method='POST'" enctype="multipart/form-data">
        <div class="form-group row mt-5">    
            <div class="col-xs-2 mt-3"> 
                <label for="inputlg">Заголовок</label>    
                <input class="form-control" type="text" name="title" placeholder="Заголовок" value="<?=$blog_data['title']?>" >
            </div>
            <div class="col-xs-2 mt-3">      
                <select class="form-select form-select-sm" name="category_id" placeholder="Категория">
                
                <?php
						$category_name_query = mysqli_query($conn, "SELECT * FROM categories WHERE id=" . $blog_data["category_id"]);
						$category_res = mysqli_fetch_assoc($category_name_query);
						echo '<option value="' . $category_res["id"] . '">' . $category_res["category_name"] . '</option>';



						$categories_query = mysqli_query($conn, "SELECT * FROM categories WHERE id!=" . $category_res["id"]);
						while ($row = mysqli_fetch_assoc($categories_query)) {
							echo '<option value="' . $row["id"] . '">' . $row["category_name"] . '</option>';
						}
						?>    

                </select>    
            </div>
            <div class="col-xs-2 mt-3">    
                <label for="inputlg">Фото профиля</label>
                <input class="form-control" type="file" name="image">
            </div>
            <div class="col-xs-3 mt-3">  
                <label for="inputlg">Описание</label>
                <!-- <input class="form-control" type="text" name="text" placeholder="Описание"> -->
                <textarea name="text" class="form-control" type="text" cols="20" rows="5" placeholder="Описание" value=""><?=$blog_data['text']?></textarea>
            </div>
        </div>    
            <button type="submit" class="btn btn-success mt-3">Сохранить</button>
        
            <h1>My First Google Map</h1>

<div id="googleMap" style="width:100%;height:400px;"></div>

<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>

    </form>

    
         
</div>
		
</body>
</html>