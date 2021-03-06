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
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

    </style>
</head>

<body>


    <div clsss="containrt">
        <div class="page-content">

            <form action="/posts/{{ $post->id }}" method="post">
                <input type="hidden" name="_method" value="put">

                <div class="form-group">
                    <label for="exampleInputEmail1">title</label>
                    <input type="varchar" class="form-control" name="title" value="{{ $post->title }}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">content</label>
                    <input type="varchar" class="form-control" name="content" value="{{ $post->content }}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tags</label>
                    <input type="text" class="form-control" name="tags" value="{{ $post->tagsToString() }}"
                        placeholder="??????tags??????,??????">

                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">category</label>
                    <div type="varchar" class="form-control" name="category" value="{{ $post->category }}">
                        <select class="form-control" name="category_id">
                            <option value="" selected>?????????????????????????????????????????????????????????</option>
                            @foreach ($categories as $key => $category)
                                <option value="{{ $category->id }}" @if ($category->id === $post->category_id) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <button type=" submit" class="btn btn-outline-primary">Submit</button>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </form>
        </div>
    </div>





</body>

</html>
