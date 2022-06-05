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
    <div class="container">
        <h1>Category List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $category)
                    <tr>

                        <th scope="row">*</th>
                        <td>{{ $category->name }}</td>
                        <td><button class="btn btn-outline-danger"
                                onclick="deletecategory({{ $category->id }})">Delete</button></td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="page-content">
        <div class="container">
            <div class="clearfix toolbox">
                <a href="/" class="btn btn-outline-primary">Post</a>
                <a href="/categories/create" class="btn btn-outline-secondary">Create Category</a>

            </div>

        </div>
    </div>

    {{-- <form class="deleteform" action="index.html" method="category">
        <input name="_method" type="hidden" value="DELETE">
        @csrf
    </form> --}}

    <script>
        let deletecategory = function(id) {
            let result = confirm('do you want to delete category?');
            if (result) {
                let actionurl = '/categories/' + id;
                $.post(actionurl, {
                    _method: 'delete'
                }).done(function() {
                    location.reload();
                });
            }
        }
    </script>
</body>

</html>
