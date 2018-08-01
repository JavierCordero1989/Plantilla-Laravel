@section('css')
    @include('layouts.datatables_css')
@endsection

<table class="table table-responsive" id="subeArchivos-table">
    <thead>
        <th>Nombre</th>
        <th>Email</th>
        <th>Accion</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->email !!}</td>
            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button(
                        '<i class="glyphicon glyphicon-trash"></i>',
                        [
                            'type' => 'submit', 
                            'class' => 'btn btn-danger btn-xs', 
                            'onclick' => "return confirm('¿Está seguro?')"
                        ]
                    ) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@section('scripts')
    @include('layouts.datatables_js')
@endsection