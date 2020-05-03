<html>
<head>
  <title>Hello/Index</title>
  <style>
  body {font-size: 16px; color: #999;}
  h1 {font-size:100px; text-align:right; color: #f6f6f6;}
  </style>
</head>
<body>
  <h1>index</h1>
  <p>This is a sample page with php-template.</p>
  <p><?php echo $msg; ?></p>
  <p><?php echo date("Y年n月j日"); ?></p>
  <p>ID=<?php echo $id; ?></p>
</body>
</html>