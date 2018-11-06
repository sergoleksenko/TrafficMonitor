import {Component, OnInit} from '@angular/core';
import {Employee} from './employee';
import {EmployeesService} from './employees.service';

@Component({
    selector: 'app-employess',
    templateUrl: './employess.component.html',
    styleUrls: ['./employess.component.css']
})
export class EmployessComponent implements OnInit {
    employees: Employee[] = [];

    constructor(private employeeService: EmployeesService) {
    }

    ngOnInit() {
        this.employeeService.getEmployees().subscribe((data: Employee[]) => this.employees = data);
    }
}
