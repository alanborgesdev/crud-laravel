<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Curso - {{ $curso->name }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-9 col-12 mt-5 mb-5">
                <div class="border-bottom d-flex justify-content-between align-items-center mb-3">
                    <h2>Editar Curso</h2>
                    <a href="{{ route('curso.index') }}" class="btn btn-secondary">Voltar</a>
                </div>

                <div class="alert alert-info mb-3">
                    <strong>Editando:</strong> {{ $curso->name }}
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Atenção! Corrija os erros abaixo:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- FORM DE EDIÇÃO -->
                <form action="{{ route('curso.update', $curso->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome do Curso</label>
                        <input type="text" id="name" name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $curso->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descrição do Curso</label>
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                            rows="4">{{ old('description', $curso->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            Salvar Alterações
                        </button>
                        <a href="{{ route('curso.index') }}" class="btn btn-warning">Cancelar</a>
                    </div>
                </form>

                <!-- SEPARADOR -->
                <hr class="my-4">

                <!-- FORM DE EXCLUSÃO -->
                <form action="{{ route('curso.destroy', $curso->id) }}"
                      method="POST"
                      class="d-inline"
                      onsubmit="return confirm('Tem certeza que deseja excluir o curso \'{{ $curso->name }}\'?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Excluir Curso
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
