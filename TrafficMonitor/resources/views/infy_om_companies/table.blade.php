<table class="table table-responsive" id="infyOmCompanies-table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Quota</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($infyOmCompanies as $infyOmCompany)
        <tr>
            <td>{!! $infyOmCompany->name !!}</td>
            <td>{!! $infyOmCompany->quota !!}</td>
            <td>
                {!! Form::open(['route' => ['infyOmCompanies.destroy', $infyOmCompany->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('infyOmCompanies.show', [$infyOmCompany->id]) !!}"
                       class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('infyOmCompanies.edit', [$infyOmCompany->id]) !!}"
                       class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>