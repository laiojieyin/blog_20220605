<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="mt-4 mx-2">
        <div class="mb-2">
            <a href="/posts/create" class="btn btn-outline-primary">Create Post</a>
            <a href="/categories" class="btn btn-outline-secondary">Category</a>
            <a href="/tags" class="btn btn-outline-success">Tag</a>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Category</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">*</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>
                            @if ($post->category)
                                <div>{{ $post->category->name }}</div>
                            @endif
                        </td>
                        <td>
                            @if (count($post->tags) > 0)
                                @foreach ($post->tags as $tag)
                                    {{ $tag->name }}
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <a href="/posts/{{ $post->id }}/edit" class="btn btn-outline-primary">Edit</a>
                        </td>
                        <td>
                            <button class="btn btn-outline-danger"
                                onclick="deletePost({{ $post->id }})">Delete</button>
                        </td>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
<script>
    let deletePost = function(id) {
        let result = confirm('do you want to delete post?');
        if (result) {
            let actionurl = '/posts/' + id;
            $.post(actionurl, {
                _method: 'delete'
            }).done(function() {
                location.reload();
            });
        }
    }
</script>
