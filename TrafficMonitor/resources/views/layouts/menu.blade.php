<li class="{{ Request::is('infyOmCompanies*') ? 'active' : '' }}">
    <a href="{!! route('infyOmCompanies.index') !!}"><i class="fa fa-edit"></i><span>Infy Om Companies</span></a>
</li>

<li class="{{ Request::is('infyOmEmployees*') ? 'active' : '' }}">
    <a href="{!! route('infyOmEmployees.index') !!}"><i class="fa fa-edit"></i><span>Infy Om Employees</span></a>
</li>

