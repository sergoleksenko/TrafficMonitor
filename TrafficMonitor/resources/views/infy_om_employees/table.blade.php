<table class="table table-responsive" id="infyOmEmployees-table">
    <thead>
    <tr>
        <th>Company Id</th>
        <th>Name</th>
        <th>Email</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($infyOmEmployees as $infyOmEmployee)
        <tr>
            <td>{!! $infyOmEmployee->company_id !!}</td>
            <td>{!! $infyOmEmployee->name !!}</td>
            <td>{!! $infyOmEmployee->email !!}</td>
            <td>
                {!! Form::open(['route' => ['infyOmEmployees.destroy', $infyOmEmployee->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('infyOmEmployees.show', [$infyOmEmployee->id]) !!}"
                       class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('infyOmEmployees.edit', [$infyOmEmployee->id]) !!}"
                       class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>