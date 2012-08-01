<html>
<body>

<form action="upload_script.php" method="post"
enctype="multipart/form-data">
<label for="password">Password:</label>
<input type="password" name="password" id="password" /> <br />
<label for="file">Filename:</label>
<input type="file" name="file" id="file" /> 
<br />
<label for="title">Title:</label>
<input type="text" name="title" id="title" /> <br/>
<label for="media">Media:</label>
<input type="text" name="media" id="media" /> <br/>
<label for="dimension">dimension:</label>
<input type="text" name="dimension" id="dimension" /> <br/>
<input type="submit" name="submit" value="Submit" />
</form>

</body>
</html>