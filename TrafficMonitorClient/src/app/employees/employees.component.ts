import {Component, OnInit} from '@angular/core';
import {Employee} from './employee';
import {EmployeesService} from '../services/employees.service';
import {NgForm} from '@angular/forms';
import {CompaniesService} from '../services/companies.service';
import {Company} from '../companies/company';

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
    selectedCompany = 'All';

    constructor(private employeeService: EmployeesService, private companiesService: CompaniesService) {
    }

    ngOnInit() {
        this.loadData();
        this.getCompanies();
    }

    loadData() {
        this.page = 1;
        this.employeeService.all().subscribe((data: Employee[]) =>
            this.employees = data.filter(e => this.selectedCompany == 'All' || e.company == this.selectedCompany));
    }

    getCompanies() {
        this.companiesService.all().subscribe((data: Array<Company>) => {
            for (let i = 0; i < data.length; i++) {
                this.companies.push({value: data[i]['id'], viewValue: data[i]['name']});
            }
        });
    }

    deleteEmployee(id) {
        if (confirm('Are you sure you want to delete this record?')) {
            this.employeeService.delete(id).subscribe(data => this.loadData());
        }
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
