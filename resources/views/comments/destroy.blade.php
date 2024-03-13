<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Comment</title>
</head>
<body>
    <h1>Delete Comment</h1>
    
    <p>Are you sure you want to delete this comment?</p>
    
    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Yes, Delete Comment</button>
    </form>
</body>
</html>
