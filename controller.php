<?php 
    session_start();
    include("includes/sqlconnection.php");


    if(isset($_POST['save_home'])){
        $title = $_POST['title']; 
        $greet = $_POST['greet']; 
        $shortIntro = $_POST['shortIntro'];
        $loc = $_POST['loc'];
        $stat = $_POST['stat']; 
        $twitterLink = $_POST['twitterLink'];
        $linkedinLink = $_POST['linkedInLink'];
        $githubLink = $_POST['githubLink']; 
        $homeProfile = $_FILES['homeProfile']['name'];
        $cv = $_FILES['cv']['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];


        $sql="INSERT INTO portfolioinfo(title, greet, shortIntro, loc, stat, twitter, linkedin, github, homeProfile, cv, email, contact) 
        VALUES ('$title', '$greet', '$shortIntro', '$loc', '$stat', '$twitterLink', '$linkedinLink', '$githubLink', 'homeProfile', '$cv', '$email', '$contact')";

        if ($conn->query($sql) === TRUE){
            move_uploaded_file($_FILES["cv"]["tmp_name"],"uploads/".$_FILES['cv']['name']);
            header('location:admin.php');
        } else {
            $_SESSION['status'] ="Error: Update Failed...";
            header('location:admin.php');
            $conn->close();
        }


    }






    if(isset($_POST['update_home'])){
        $title = $_POST['title']; 
        $greet = $_POST['greet']; 
        $shortIntro = $_POST['shortIntro'];
        $loc = $_POST['loc'];
        $stat = $_POST['stat']; 
        $twitterLink = $_POST['twitterLink'];
        $linkedinLink = $_POST['linkedInLink'];
        $githubLink = $_POST['githubLink']; 
        $oldHomeProfile = $_POST['oldHomeProfile'];
        $newHomeProfile = $_FILES['homeProfile']['name'];

        $oldCV = $_POST['oldCV'];
        $newCV = $_FILES['cv']['name'];

        if($newCV != ''){
            $updateCV = $newCV;
        } else {
            $updateCV = $newCV;
        }

        echo "$updateCV";

        if($newHomeProfile != ''){
            $updateHomeProfile = $newHomeProfile;
        } else {
            $updateHomeProfile = $newHomeProfile;
        }

        echo "$updateHomeProfile";

        $sql="UPDATE portfolioinfo SET  title='$title', greet='$greet', shortIntro='$shortIntro', loc='$loc', stat='$stat', twitter='$twitterLink', github='$githubLink', linkedin='$linkedinLink', homeProfile='$updateHomeProfile', cv='$updateCV'";


        if ($conn->query($sql) === TRUE){
            move_uploaded_file($_FILES["cv"]["tmp_name"],"uploads/".$_FILES['cv']['name']);
            header('location:admin.php');
        } else {
            $_SESSION['status'] ="Error: Update Failed...";
            header('location:admin.php');
            $conn->close();
        }


    }

    if(isset($_POST['update_about'])){
        $newAboutMeProfile = $_FILES['aboutMeProfile']['name'];
        $oldAboutMeProfile = $_POST['oldAboutMeProfile'];
        $aboutMe = $_POST['aboutMe'];

        if($newAboutMeProfile != ''){
            $updateAboutMeProfile = $newAboutMeProfile;
        } else {
            $updateAboutMeProfile = $newAboutMeProfile;
        }

        echo "$updateAboutMeProfile";

        $sql="UPDATE portfolioinfo SET aboutMeProfile='$updateAboutMeProfile', aboutMe='$aboutMe'";

        if ($conn->query($sql) === TRUE){
            move_uploaded_file($_FILES["aboutMeProfile"]["tmp_name"],"uploads/".$_FILES['aboutMeProfile']['name']);
            header('location:admin.php');
        } else {
            $_SESSION['status'] ="Error: Update Failed...";
            header('location:admin.php');
        }
        $conn->close();
        

    }

        if(isset($_POST['save_skill'])) {
            $skillName = $_POST['skillName'];
            $skillLink = $_POST['skillLink'];
            $skillLogo = $_FILES['skillLogo']['name'];

            $sql="INSERT INTO portfolioskills(skillName, skillLink, skillLogo) 
        VALUES ('$skillName', '$skillLink', '$skillLogo')";

        if($conn->query($sql) === TRUE) {
            move_uploaded_file($_FILES["skillLogo"]["tmp_name"],"uploads/".$_FILES['skillLogo']['name']);
            header('location:admin.php');

        } else {
        $_SESSION['status'] = "Error: Insert Failed...";
        header('location:admin.php');

        $conn->close();
        }

    }   

    if(isset($_POST['update_skill'])){
        $idskill = $_POST['idskill'];
        $skillName = $_POST['skillName'];
        $skillLink = $_POST['skillLink'];
        $newSkillLogo = $_FILES['skillLogo']['name'];
        $oldSkillLogo = $_POST['oldSkillLogo'];

        if($newSkillLogo != ''){
            $updateSkillLogo = $newSkillLogo;
        } else {
            $updateSkillLogo = $oldSkillLogo;
        }

        echo "$updateSkillLogo";

        $sql = "UPDATE portfolioskills SET skillName='$skillName', skillLink='$skillLink', skillLogo='$updateSkillLogo' WHERE idskill='$idskill'";

        if ($conn->query($sql) === TRUE){
            move_uploaded_file($_FILES["skillLogo"]["tmp_name"],"uploads/".$_FILES['skillLogo']['name']);
            header('location:view_skills.php');
        } else {
            $_SESSION['status'] ="Error: Update Failed...";
            header('location:edit.php');
        }
        $conn->close();
        
    }

    // delete skill
    if (isset($_GET['idskill'])){
        $id = $_GET['idskill'];
        $skillLogo = $_GET['skillLogo'];
        $sql = "DELETE FROM portfolioskills WHERE idskill = '$id'";
    

    if ($conn->query($sql) === TRUE){
        unlink("uploads/$skillLogo");
        header('location:admin.php');
    } else {
        $_SESSION['status'] ="Error: Delete Failed...";
        header('location:admin.php');
    }
    $conn->close();
    }


    if (isset($_POST['save_project'])) {
        $projName = $_POST['projName'];
        $projLink = $_POST['projLink'];
        $projDesc = $_POST['projDesc'];
        $projThumbnail = $_FILES['projThumbnail']['name'];
    
        // Prepare an SQL statement for execution
        $stmt = $conn->prepare("INSERT INTO portfolioproj(projName, projLink, projDesc, projThumbnail) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $projName, $projLink, $projDesc, $projThumbnail);  // 's' denotes the variable type 'string'
    
        // Execute the statement
        if ($stmt->execute()) {
            move_uploaded_file($_FILES["projThumbnail"]["tmp_name"], "uploads/" . $_FILES['projThumbnail']['name']);
            header('location: admin.php');
        } else {
            $_SESSION['status'] = "Error: Insert Failed - " . $stmt->error;
            header('location: admin.php');
        }
    
        $stmt->close();  // Close the prepared statement
    
    
    $conn->close();  // Close the database connection
}

        // delete proj
    if (isset($_GET['idproj'])){
        $id = $_GET['idproj'];
        $projThumbnail = $_GET['projThumbnail'];
        $sql = "DELETE FROM portfolioproj WHERE idproj = '$id'";


    if ($conn->query($sql) === TRUE){
        unlink("uploads/$projThumbnail");
        header('location:view_project.php');
    } else {
        $_SESSION['status'] ="Error: Delete Failed...";
        header('location:view_project.php');
    }
    $conn->close();
    }

    
    
if(isset($_POST['update_project'])){
    $idproj = $_POST['idproj'];
    $projName = $_POST['projName'];
    $projLink = $_POST['projLink'];
    $projDesc = $_POST['projDesc'];
    $newProjThumbnail = $_FILES['projThumbnail']['name'];
    $oldProjThumb = $_POST['oldProjThumb'];

    if($newProjThumbnail != ''){
        $updateProjThumb = $newProjThumbnail;
    } else {
        $updateProjThumb = $oldProjThumb;
    }

    echo "$updateProjThumb";

    $sql = "UPDATE portfolioproj SET projName='$projName', projLink='$projLink', projThumbnail='$updateProjThumb' WHERE idproj='$idproj'";

    if ($conn->query($sql) === TRUE){
        move_uploaded_file($_FILES["projThumbnail"]["tmp_name"],"uploads/".$_FILES['projThumbnail']['name']);
        header('location:admin.php');
    } else {
        $_SESSION['status'] ="Error: Update Failed...";
        header('location:admin.php');
    }
    $conn->close();
    
}





if(isset($_POST['update_contact'])){
    $email = $_POST['email'];
    $contact = $_POST['contact'];


    $sql="UPDATE portfolioinfo SET email='$email', contact='$contact'";

    if ($conn->query($sql) === TRUE){
        header('location:admin.php');
    } else {
        $_SESSION['status'] ="Error: Update Failed...";
        header('location:admin.php');
    }
    $conn->close();
}

?>