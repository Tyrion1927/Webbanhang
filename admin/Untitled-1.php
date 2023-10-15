<!DOCTYPE HTML>
<html lang="vi">
<head>
<title>hello</title>
<meta name="author" content="Ha Linh">
<meta name="description" content="xin chào mọi người">
<meta charset="utf-8">
<script src="http://cdn.ckeditor.com/4.9.2/basic/ckeditor.js"></script>
</head>
<body>
        <form>
            <textarea name="editor1" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
        </form>
    </body>

</html>