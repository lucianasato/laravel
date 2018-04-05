@extends(layout())

@section('content')
    <div class="container">
        <div class="row">
            <h3>Saídas de Estoque</h3>
            <a href="{{ route('admin.stock-output.create') }}" class="btn btn-primary">Novo</a>
        </div>
        <br/>
        @include('stock-movements._index')
    </div>
@endsection
