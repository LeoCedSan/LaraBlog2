<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Comment</title>
</head>
<body>
    <h1>Edit Comment</h1>
    
    <form action="{{ route('comments.update', $comment->id) }}" method="post">
    @csrf
    @method('PUT')
        <textarea name="content" cols="30" rows="5">{{ $comment->content }}</textarea>
        <button type="submit">Update Comment</button>
    </form>
</body>
</html>
