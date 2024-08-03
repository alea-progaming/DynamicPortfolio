<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Skill</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 class="text-center">Add Skill</h1>
            <form action="controller.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="skillName">Skill Name</label>
                    <input type="text" class="form-control" name="skillName" id="skillName">
                </div>
                <div class="form-group">
                    <label for="skillLink">Skill Link</label>
                    <input type="text" class="form-control" name="skillLink" id="skillLink">
                </div>
                <div class="form-group">
                    <label for="skillLogo">Skill Logo</label>
                    <input type="file" class="form-control" name="skillLogo" id="skillLogo">
                </div>
                <button type="submit" class="btn btn-primary" name="save_skill">Save Skill</button>
            </form>
        </div>
    </div>
</div>



</body>
</html>
