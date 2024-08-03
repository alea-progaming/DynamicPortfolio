<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Home</title>
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
                        
                    <tr>
                        <th>Title</th>
                        <td><input type="text" name="title" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Greet</th>
                        <td><input type="text" name="greet" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Short Intro</th>
                        <td><input type="text" name="shortIntro" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <td><input type="text" name="loc" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><input type="text" name="stat" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Twitter</th>
                        <td><input type="text" name="twitterLink" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>LinkedIn</th>
                        <td><input type="text" name="linkedInLink" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Github</th>
                        <td><input type="text" name="githubLink" class="form-control"></td>
                    </tr>

                    <tr>
                        <th>CV</th>
                        <td>
                        <input type="file" class="form-control" name="cv" id="cv">
                    </tr>

                    <tr>
                        <th>Home Profile</th>
                        <td>
                        <input type="file" class="form-control" name="homeProfile" id="homeProfile">
                    </tr>





                    </table>
                    <div class="text-center">
                        <button type="submit" name="save_home" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</body>
</html>
