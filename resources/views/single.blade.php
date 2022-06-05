<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <section class="body-content ">

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <!--classic image post-->
                        <div class="blog-classic">
                            <div class="blog-post">

                                <div class="full-width">
                                    <img src="/assets/img/post/p12.jpg" alt="" />
                                </div>

                                @yield('function-button')

                                <h4 class="text-uppercase"><a href="/posts/{{ $post->id }}"> {{ $post->title }}
                                    </a>
                                </h4>
                                <ul class="post-meta">
                                    <li><i class="fa fa-user"></i>{{ $post->user->name }}<a href="#"></a>
                                    </li>
                                    <li><i class="fa fa-folder-open"></i>
                                        @if ($post->category)
                                            <a
                                                href="/posts/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                                        @endif
                                    </li>
                                    <li><i class="fa fa-comments"></i> {{ $post->comments()->count() }} comments
                                    </li>
                                </ul>



                                <div class="blog-post">
                                    <blockquote class="quote-post">

                                    </blockquote>
                                </div>
                                <p>{{ $post->content }}</p>




                                <div class="inline-block">

                                    <div class="widget-tags">
                                        <h6 class="text-uppercase">Tags </h6>
                                        @foreach ($tags as $tag)
                                            <a href="/posts/tags/{{ $tag->id }}">{{ $tag->name }}</a>
                                        @endforeach


                                    </div>
                                </div>


                                <div class="clearfix inline-block m-top-50 m-bot-50">
                                    <h6 class="text-uppercase">Share this Post </h6>
                                    <div class="widget-social-link circle">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-dribbble"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-behance"></i></a>
                                    </div>
                                </div>

</body>

</html>
