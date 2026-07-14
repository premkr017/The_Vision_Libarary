<!DOCTYPE html>
<html>
<head>
    <title>The Vision Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ route('books.index') }}">📚 The Vision Library</a>
  </div>
</nav>
<div class="container">
    @yield('content')
</div>
</body>
</html>
