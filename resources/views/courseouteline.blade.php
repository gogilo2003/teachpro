<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Course Outline</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
  	<div class="container">
        <h1>Course outline</h1>
        <h2>Artisan 1</h2>
        <div class="row">
        @foreach($artisan1 as $file)
        <div class="col-md-6 mb-3">
        	<img src="{{ $file }}" style="width:100%"/>
        </div>
        <div class="col-md-6 mb-3">
          <textarea class="form-control" style="width:100%; height: 100%"></textarea>
        </div>
        @endforeach
      </div>
    </div>
  </body>
</html>