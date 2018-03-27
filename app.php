<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="./style/bootstrap.min.css">
      <script src="./script/jquery.min.js"></script>
      <script src="./script/bootstrap.min.js"></script>
</head>

<body>
    <div id="wrap">
        <div class="container">
            <div class="row">

 <fieldset style="margin-top: 30px;">
    <legend>For Partner Table:</legend>
                <form class="form-horizontal" action="./api/uploadReseller.php" method="post" name="upload_excel" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                        </div>
                </form>
</fieldset>



<fieldset style="margin-top: 30px;">
    <legend>For Monthly Data</legend>
       <form class="form-horizontal" action="./api/uploadMonthlyData.php" method="post" name="upload_excel" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit2" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                        </div>
                </form>

           </fieldset>
            </div>

        </div>
    </div>
</body>

</html>