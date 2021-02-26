<!DOCTYPE html>
<html lang="en">

<head>
    <title>CSV Splitter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .fakeimg {
        height: 200px;
        background: #aaa;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>CSV File Splitter</h1>
        <hr>
        <a href="view_list.php" class="btn btn-primary"><span class="fas fa-eye"></span> View</a>
        <br />
        <div class="row mt-4">
            <div class="col sm-3">
                <div class="card" style="width: 24rem;">
                    <div class="card-header">
                        <form enctype="multipart/form-data" action="upload.php" method="POST">
                    </div>
                    <div class="card-body">
                        Please choose a file: <i class="fas fa-file"><input name="upload" type="file"
                                class="form-control-file border"></i><br />
                        <br>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="Upload" class="form-control btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>