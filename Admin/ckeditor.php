<html>

    <head>
        <title>Ckeditor</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    </head>
    <style>
        .box {
            width: 100%;
            max-width: 600px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 16px;
            margin: 0 auto;
        }

        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 300px;
        }

        .error {
            color: red;
        }
    </style>
    <?php
    include ('con.php');
    if (isset ($_REQUEST['submit'])) {
        $content = $_REQUEST['content'];

        $insert_query = mysqli_query($con, "insert into tbl_ckeditor set content='$content'");
        if ($insert_query) {
            $msg = "Data Inserted";
        } else {
            $msg = "Error";
        }
    }
    ?>

    <body>
        <div class="container">
            <h3 align="center">CKEditor</h3>
            <br>
            <div class="box">
                <form method="post">
                    <div class="form-group">
                        <textarea id="content" name="content" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Save" class="btn btn-primary">
                    </div>
                </form>
                <div class="error"><?php if (!empty ($msg)) {
                    echo $msg;
                } ?></div>
            </div>
        </div>
    </body>

</html>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'), {
            ckfinder:
            {
                uploadUrl: 'fileupload.php'
            }
        })
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>