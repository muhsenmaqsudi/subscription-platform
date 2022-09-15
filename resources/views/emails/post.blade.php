<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Template</title>
</head>
<body>
    <div>
        <h3>The {{ $post->website->name }} Website with url of {{ $post->website->url }} that you have been subscribed to have a new post</h3>

        <h4>Title: {{ $post->title }}</h4>

        <p>Description: {{ $post->description }}</p>
    </div>
</body>
</html>
