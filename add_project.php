<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 class="text-center">Add Project</h1>
            <form action="controller.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="projName">Project Name</label>
                    <input type="text" class="form-control" name="projName" id="projName">
                </div>
                <div class="form-group">
                    <label for="projLink">Project Link</label>
                    <input type="text" class="form-control" name="projLink" id="projLink">
                </div>
                <div class="form-group">
                    <label for="projDesc">Project Description</label>
                    <textarea type="text" class="form-control" name="projDesc" id="projDesc"></textarea>
                </div>
                <div class="form-group">
                    <label for="projThumbnail">Project Thumbnail</label>
                    <input type="file" class="form-control" name="projThumbnail" id="projThumbnail">
                </div>
                <button type="submit" class="btn btn-primary" name="save_project">Save project</button>
            </form>
        </div>
    </div>
</div>



</body>
</html>
