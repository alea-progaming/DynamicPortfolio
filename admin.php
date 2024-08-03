<!DOCTYPE html>
<?php session_start(); ?>

<html>
    <head>
        <title>View Projects</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
    </head>

    <body>

    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <div class="col-md-4 col-lg-6">
                <div class="text-center mb-4">
                    <h1>Edit Home Profile</h1>
                </div>
                <form action="controller.php" method="POST" enctype="multipart/form-data"
                    class="bg-light p-3 border rounded">
                    <table class="table">
                    <div class="text-center">
                        <button type="submit" name="save_home" class="btn btn-primary">Create Home Profile</button>
                    </div>
                        <?php 
                            getRecord();
                        ?>
                    </table>
                    <div class="text-center">
                        <button type="submit" name="update_home" class="btn btn-primary">Update Home Profile</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <br><br><br><br><br><br><br>

    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <div class="col-md-4 col-lg-6">
                <div class="text-center mb-4">
                    <h1>Edit About</h1>
                </div>
                <form action="controller.php" method="POST" enctype="multipart/form-data" class="bg-light p-3 border rounded">
                    <table class="table">
                        <?php 
                            getAbout();
                        ?>
                    </table>
                    <div class="text-center">
                        <button type="submit" name="update_about" class="btn btn-primary">Update About</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br><br><br><br><br><br><br>

    <div class="container">
            <h1 class="text-center">Edit Skills</h1>
                <?php
                    if(isset($_SESSION['status'])&& $_SESSION['status'] !='') {
                        echo htmlspecialchars($_SESSION['status']);
                        unset($_SESSION['status']);
                    }
                ?>

            <table class="table table-bordered">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Link</th>
                        <th>Actions</th>
                    </tr>   
                <tb>
                    <?php viewskill(); ?>
                </tb>
            </table>
            
            <form action="add_skill.php" method="POST" class="text-center">
                <button type="submit" name="add_skill" class="btn btn-primary">Add Skill</button>
            </form>

            <br>

            
        </div>


        <br><br><br><br><br><br><br>




        <div class="container">
            <h1 class="text-center">Edit Projects</h1>
                <?php
                    if(isset($_SESSION['status'])&& $_SESSION['status'] !='') {
                        echo htmlspecialchars($_SESSION['status']);
                        unset($_SESSION['status']);
                    }
                ?>

            <table class="table table-bordered">
                    <tr>
                        <th>Thumbnail</th>
                        <th>Name</th>
                        <th>Link</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>   
                <tb>
                    <?php viewproj(); ?>
                </tb>
            </table>
            
            <form action="add_project.php" method="POST" class="text-center">
                <button type="submit" name="add_project" class="btn btn-primary">Add Project</button>
            </form>

            <br><br><br><br><br><br><br>

            <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <div class="col-md-4 col-lg-6">
                <div class="text-center mb-4">
                    <h1>Edit Contact</h1>
                </div>
                <form action="controller.php" method="POST" enctype="multipart/form-data" class="bg-light p-3 border rounded">
                    <table class="table">
                        <?php 
                            getContact();
                        ?>
                    </table>
                    <div class="text-center">
                        <button type="submit" name="update_contact" class="btn btn-primary">Update Contact</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br><br><br><br><br><br><br>
        

    </body>
</html>

<?php

function getAbout(){
    include("includes/sqlconnection.php");
    $sql = "SELECT * FROM portfolioinfo";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "
                <tr>
                <th>About Me</th>
                    <td><textarea type='text' name='aboutMe' class='form-control' value='".$row['aboutMe']."'></textarea></td>
                    <td rowspan='5'><img src='uploads/".$row['aboutMeProfile']."' class='img-thumbnail' width='200' height='300' alt='About Me Profile'></td>
                </tr>
                <tr>
                    <th>About Me Profile</th>
                    <td><input type='file' name='aboutMeProfile' class='form-control'></td>
                    <input type='hidden' name='oldAboutMeProfile' value='".$row['aboutMeProfile']."'>
                </tr>
            ";
        }
    } else {
        echo "<tr><td colspan='3' class='text-center'>No record found</td></tr>";
    }
    $conn->close();
}


    function viewproj(){
        include("includes/sqlconnection.php");
        $sql = "SELECT * FROM portfolioproj order by idproj";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "
                    <tr>
                    
                        <td>
                            <img src='uploads/{$row['projThumbnail']}' class='img-responsive' style='width: 32em;' alt='Project Thumbnail'>
                        </td>
                        <td>{$row['projName']}</td>
                        <td>{$row['projLink']}</td>
                        <td>{$row['projDesc']}</td>
                        <td>
                            <a href='edit_project.php?idproj={$row['idproj']}' class='btn btn-default btn-xs'>Edit</a>
                            <a href='controller.php?idproj={$row['idproj']}&projThumbnail={$row['projThumbnail']}' class='btn btn-danger btn-xs'>Delete</a>
                        </td>
                    </tr>
                ";
            }
        } else {
            echo "<tr><td colspan='7' class='text-center'>No projects recorded</td></tr>";
        }
        $conn->close();
    }

    function viewskill(){
        include("includes/sqlconnection.php");
        $sql = "SELECT * FROM portfolioskills order by idskill";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "
                    <tr>
                    
                        <td>
                            <img src='uploads/{$row['skillLogo']}' class='img-responsive' style='width: 200px; height: 200px;' alt='Skill Logo'>
                        </td>
                        <td>{$row['skillName']}</td>
                        <td>{$row['skillLink']}</td>
                        <td>
                            <a href='edit_skills.php?idskill={$row['idskill']}' class='btn btn-default btn-xs'>Edit</a>
                            <a href='controller.php?idskill={$row['idskill']}&skillLogo={$row['skillLogo']}' class='btn btn-danger btn-xs'>Delete</a>
                        </td>
                    </tr>
                ";
            }
        } else {
            echo "<tr><td colspan='7' class='text-center'>No skills recorded</td></tr>";
        }
        $conn->close();
    }

    function getRecord(){
        include("includes/sqlconnection.php");
        $sql = "SELECT * FROM portfolioinfo";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "
                    <tr>
                        <th>Title</th>
                        <td><input type='text' name='title' class='form-control' value='".$row['title']."'></td>
                        <td rowspan='5'><img src='uploads/".$row['homeProfile']."' class='img-thumbnail' width='200' height='300' alt='Home Profile'></td>
                    </tr>
                    <tr>
                        <th>Greet</th>
                        <td><input type='text' name='greet' class='form-control' value='".$row['greet']."'></td>
                    </tr>
                    <tr>
                        <th>Short Intro</th>
                        <td><input type='text' name='shortIntro' class='form-control' value='".$row['shortIntro']."'></td>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <td><input type='text' name='loc' class='form-control' value='".$row['loc']."'></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><input type='text' name='stat' class='form-control' value='".$row['stat']."'></td>
                    </tr>
                    <tr>
                        <th>Twitter</th>
                        <td><input type='text' name='twitterLink' class='form-control' value='".$row['twitter']."'></td>
                    </tr>
                    <tr>
                        <th>LinkedIn</th>
                        <td><input type='text' name='linkedInLink' class='form-control' value='".$row['linkedin']."'></td>
                    </tr>
                    <tr>
                        <th>Github</th>
                        <td><input type='text' name='githubLink' class='form-control' value='".$row['github']."'></td>
                    </tr>

                    <tr>
                        <th>CV</th>
                        <td><input type='file' name='cv' class='form-control'></td>
                        <input type='hidden' name='oldCV' value='".$row['cv']."'>
                    </tr>

                    <tr>
                        <th>Home Profile</th>
                        <td><input type='file' name='homeProfile' class='form-control'></td>
                        <input type='hidden' name='oldHomeProfile' value='".$row['homeProfile']."'>
                    </tr>
                ";
            }
        } else {
            echo "<tr><td colspan='3' class='text-center'>No record found</td></tr>";
        }
        $conn->close();
    }

    function getContact(){
        include("includes/sqlconnection.php");
        $sql = "SELECT * FROM portfolioinfo";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "
                    <tr>
                    <th>Email</th>
                        <td><input type='email' name='email' class='form-control' value='".$row['email']."'/></td>
                    </tr>
                    <tr>
                        <th>Contact Number</th>
                        <td><input type='text' name='contact' class='form-control'></td>
                    </tr>
                ";
            }
        } else {
            echo "<tr><td colspan='3' class='text-center'>No record found</td></tr>";
        }
        $conn->close();
    }

?>
