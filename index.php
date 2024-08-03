<!DOCTYPE html>
<?php session_start(); ?>

<html>

<head>
    <title>My Portfolio</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/query.js"></script>
    <script src="js/bootstrap.js"></script>
</head>

<body>
    <?php
                    if(isset($_SESSION['status'])&& $_SESSION['status'] !='') {
                        echo htmlspecialchars($_SESSION['status']);
                        unset($_SESSION['status']);
                    }
                ?>
    <?php viewSecHome(); ?>
    <?php viewSecAbout(); ?>

    <section id="skills">
        <div class="container">
            <div class="page-header">Skills</div>
            <div class="row text-center">
                <h3 class="mb-6">The skills, tools and technologies I am really good at:</h3>
                
                <?php viewSecSkills();?>
                
            </div>
        </div>
        </div>
    </section>

    <section id="myWorks">
        <div class="container">
            <div class="page-header">My Works</div>
            <div class="row">
                <?php viewSecWorks();?>
            </div>
        </div>
    </section>


    <?php viewSecContact();?>






</body>

</html>

<?php
    function viewSecHome(){
        include("includes/sqlconnection.php");
        $sql = "SELECT * FROM portfolioinfo";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "
                <nav class='navbar navbar-default navbar-fixed-top' style='background-color: rgba(248, 248, 248, .75);'>
                <div class='container'>
                    <div class='navbar-header'>
                        <div class='navbar-brand' name='occupation'>{$row['title']}</div>
                    </div>
                    <ul class='nav nav-pills navbar-right'>
                        <li><a href='#about'>About Me</a></li>
                        <li><a href='#skills'>Skills</a></li>
                        <li><a href='#myWorks'>My Works</a></li>
                        <li><a href='#contact'>Contact Me</a></li>
                        <li><a href='uploads/{$row['cv']}' class='cv-btn csv' name='cv'>Download CV</a></li>
                    </ul>
                </div>
            </nav>
        
            <section id='home' class='container'>
                <div class='row justify-content-between'>
                <div class='col-md-6'>
                    <h1 name='greet'>{$row['greet']}</h1>
                    <p name='shortIntro'>{$row['shortIntro']}</p><br><br>
                    <div class='location-status'>
                        <p name='loc'>{$row['loc']}</p>
                        <p name='stat'>{$row['stat']}</p>
                    </div>
                    <div class='social-links'>
                        <a href='{$row['twitter']}' name='twitID'><i class='fab fa-twitter'></i></a>
                        <a href='{$row['linkedin']}' name='linkID'><i class='fab fa-linkedin-in'></i></a>
                        <a href='{$row['github']}' name='gitID'><i class='fab fa-github'></i></a>
                    </div>
                </div>
                <div class='col-md-6 text-right'>
                    <img src='uploads/{$row['homeProfile']}' alt='MyProfile'>
                </div>
                </div>
            </section>
                ";
            }
        } else {
            echo "<tr><td colspan='7' class='text-center'>Please go back and create your portfolio</td></tr>";
        }
        $conn->close();
    }

    function viewSecAbout(){
        include("includes/sqlconnection.php");
        $sql = "SELECT * FROM portfolioinfo";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "

            <section id='about'>
        <div class='container'>
        <div class='page-header'>About me</div>
        <div class='row justify-content-between'>
            <div class='col-md-6'>
                <img src='uploads/{$row['aboutMeProfile']}' alt='boutMe'>
            </div>
            <div class='col-md-6'>
                <h1>Curious about me? Here you have it:</h1>
                <p>{$row['aboutMe']}</p>
            </div>
        </div>


        </div>
    </section>
                ";
            }
        } else {
            echo "<tr><td colspan='7' class='text-center'></td></tr>";
        }
        $conn->close();
    }



    function viewSecSkills(){
        include("includes/sqlconnection.php");
        $sql = "SELECT * FROM portfolioskills";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "

                <div class='thumbnail col-sm-2 skillsThumbnail'>
                    <a href='{$row['skillLink']}'><img src='uploads/{$row['skillLogo']}' class='skillsImg'/></a>
                    <h4>{$row['skillName']}</h4>
                </div>
                ";
            }
        } else {
            echo "<tr><td colspan='7' class='text-center'></td></tr>";
        }
        $conn->close();
    }


    function viewSecWorks(){
        include("includes/sqlconnection.php");
        $sql = "SELECT * FROM portfolioproj";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "

                
                    <div class='col-md-4'>
                        <div class='thumbnail thumbnail-work'>
                            <img src='uploads/{$row['projThumbnail']}' alt='thumbnail' width='200' class='workThumbnail'>
                            <div class='caption'>
                                <h4><a href='{$row['projLink']}'>{$row['projName']}</a></h4>
                                <p>{$row['projDesc']}</p>
                            </div>
                        </div>
                    </div>
                    
                
                ";
            }
        } else {
            echo "<tr><td colspan='7' class='text-center'></td></tr>";
        }
        $conn->close();
    }

        function viewSecContact(){
            include("includes/sqlconnection.php");
            $sql = "SELECT * FROM portfolioinfo";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "
                    
                    
                    
                    <section id='contact'>
            <div class='container text-center my-5'>
                <div class='page-header'>Get in touch</div>
                <div class='row'>
                    <div class='col'>
                        <h3 class='mb-3'>What’s next? Feel free to reach out to me if you're looking for a developer, have a query, or simply want to connect.</h3>

                        <p class='fs-4'><i class='fas fa-envelope me-2'></i>{$row['email']}</p>
                    <p class='fs-4'><i class='fas fa-phone me-2'></i>{$row['contact']}</p>
                    <h5>You may also find me in these platforms!</h5>
                    <div class='social-links'>
                        <a href='{$row['twitter']}' name='twitID'><i class='fab fa-twitter'></i></a>
                        <a href='{$row['linkedin']}' name='linkID'><i class='fab fa-linkedin-in'></i></a>
                        <a href='{$row['github']}' name='gitID'><i class='fab fa-github'></i></a>

                    </div>
                    </div>
                </div>
            </div>
        </section>
                    
                    
        ";
            }
        } else {
            echo "<tr><td colspan='7' class='text-center'></td></tr>";
        }
        $conn->close();
    }
?>
