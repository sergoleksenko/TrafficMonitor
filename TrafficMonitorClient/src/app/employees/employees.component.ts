import {Component, OnInit} from '@angular/core';
import {Employee} from './employee';
import {EmployeesService} from './employees.service';

@Component({
    selector: 'app-employess',
    templateUrl: './employees.component.html',
    styleUrls: ['./employees.component.css'],
})
export class EmployeesComponent implements OnInit {
    employees: Employee[] = [];
    page = 1;

    constructor(private employeeService: EmployeesService) {
    }

    ngOnInit() {
        this.employeeService.getEmployees().subscribe((data: Employee[]) => this.employees = data);
    }
}
