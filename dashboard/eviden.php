<html lang="en"><!DOCTYPE html>
<html>
<head>
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
</head>
<body>
<div class="container">
<h1>Upload Eviden</h1>
<p>Upload Foto untuk pendataan eviden.</p>
<form method="post" action="dashboard.php">
<textarea id="summernote" name="entry2"></textarea>
<input type="submit" value="submit" class="btn btn-lg btn-danger" name="submit" />
</form>
</div>
<script>$(document).ready(function() {
$("#summernote").summernote({
  placeholder: 'enter information...',
        height: 300,
         callbacks: {
        onImageUpload : function(files, editor, welEditable) {

             for(var i = files.length - 1; i >= 0; i--) {
                     sendFile(files[i], this);
            }
        }
    }
    });
});
function sendFile(file, el) {
var form_data = new FormData();
form_data.append('file', file);
$.ajax({
    data: form_data,
    type: "POST",
    url: 'editor-upload.php',
    cache: false,
    contentType: false,
    processData: false,
    success: function(url) {
        $(el).summernote('editor.insertImage', url);
    }
});
}
</script>
</body>
</html>