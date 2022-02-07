<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>

<div class="container my-5">
    <a href="{{ route('post.create') }}" class="btn btn-success mb-5">Cadastrar novo artigo</a>
    <a href="{{ route('post.index') }}" class="btn btn-success mb-5">Ver Todos</a>
    <?php

        if(!empty($posts)){
  
    ?>
    <section class="articles_list">

        <?php

       foreach ($posts as $post) {
          
        ?>

        <article class="mb-5">
            <h1>{{ $post->title }}</h1>
            <h2>{{ $post->subtitle }}</h2>
            <p>{{ $post->description }}</p>
            <small>Criado em: {{ date('d/m/Y H:i', strtotime($post->created_at)) }} - Editado em: {{ date('d/m/Y H:i', strtotime($post->updated_at)) }} </small>
           
            <form action="{{ route('post.forceDelete', ['post' => $post->id])}}" method="post" class="mt-3">
                @csrf
                @method('DELETE')
                <a href="{{ route('post.restore', ['post'=> $post->id ]) }}" class="btn btn-primary"> Restaurar</a>
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </article>
        <hr>

        <?php 
            }
        ?>
    </section>

    <?php 
            }
    ?>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>