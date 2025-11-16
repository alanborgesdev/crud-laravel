<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Cursos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 mb-5">
                <div class="border-bottom d-flex justify-content-between align-items-center mb-3">
                    <h2>Listagem de Cursos</h2>
                    <a href="{{ route('curso.create') }}" class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Cadastrar Curso
                    </a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Sucesso!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Erro!</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($cursos->isEmpty())
                    <div class="alert alert-info mt-3">
                        <strong>Nenhum curso cadastrado!</strong>
                        <a href="{{ route('curso.create') }}" class="alert-link">Clique aqui para cadastrar o primeiro
                            curso</a>.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover table-striped mt-3">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cursos as $curso)
                                    <tr>
                                        <td>{{ $curso->id }}</td>
                                        <td><strong>{{ $curso->name }}</strong></td>
                                        <td>{{ Str::limit($curso->description, 50) }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('curso.edit', $curso->id) }}"
                                                    class="btn btn-sm btn-success" title="Editar">
                                                    <i class="bi bi-pencil"></i> Editar
                                                </a>

                                                <form action="{{ route('curso.destroy', $curso->id) }}" method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Tem certeza que deseja excluir o curso \'{{ $curso->name }}\'?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        title="Excluir">
                                                        <i class="bi bi-trash"></i> Excluir
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
