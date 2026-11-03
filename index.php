<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload And Analysis</title>
    <link href="https://cdn.jsdelivr.5net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div class="h1">
        <h1>This Platfrome Is For You!!</h1>
            <h1>Upload Your Csv File</h1>
        </div>
        <form action="process.php" method="post" enctype="multipart/form-data">
            <div class="Data_Set">
                <label class="label_style">For Data Set</label>
                <div class="buttonn">
                <input class="input_style" type="file" id="dataset" name="dataset" accept=".csv" required>
                <div class="b">
                <button type="submit" name="upload_btn" ><h3>Anayalse Data</h3></button>
            </div>
        </form>
</body>
</html>