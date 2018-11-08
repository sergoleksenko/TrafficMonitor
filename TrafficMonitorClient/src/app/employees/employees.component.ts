import {Component, OnInit} from '@angular/core';
import {Employee} from './employee';
import {EmployeesService} from './employees.service';
import {NgForm} from '@angular/forms';
import {CompaniesService} from '../companies/companies.service';

@Component({
    selector: 'app-employess',
    templateUrl: './employees.component.html',
    styleUrls: ['./employees.component.css'],
})
export class EmployeesComponent implements OnInit {
    employees: Employee[] = [];
    companies = [];
    page = 1;
    isViewable = false;

    constructor(private employeeService: EmployeesService, private companiesService: CompaniesService) {
    }

    ngOnInit() {
        this.loadData();
        this.getCompanies();

    }

    loadData() {
        this.employeeService.getEmployees().subscribe((data: Employee[]) => this.employees = data);
    }

    getCompanies() {
        this.companiesService.all().subscribe((data: Array<Object>) => {
            for (let i = 0; i < data.length; i++) {
                this.companies.push({value: data[i]['id'], viewValue: data[i]['name']});
            }
        });
    }

    deleteEmployee(id) {
        this.employeeService.delete(id).subscribe(data => this.loadData());
    }

    openForm() {
        this.isViewable = true;
    }

    closeForm(form: NgForm) {
        form.resetForm();
        this.isViewable = false;
    }

    addEmployee(form: NgForm) {
        this.employeeService.add(new Employee(form.value.name, form.value.email, form.value.company)).subscribe(data => {
            this.loadData();
            form.resetForm();
            this.isViewable = false;
        });
    }
}
