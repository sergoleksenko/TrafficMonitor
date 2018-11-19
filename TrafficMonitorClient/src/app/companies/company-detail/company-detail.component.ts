import {Component, OnInit} from '@angular/core';
import {CompaniesService} from '../../services/companies.service';
import {ActivatedRoute} from '@angular/router';
import {Company} from '../company';
import {EmployeesService} from '../../services/employees.service';
import {Employee} from '../../employees/employee';

@Component({
    selector: 'app-company-detail',
    templateUrl: './company-detail.component.html',
    styleUrls: ['./company-detail.component.css']
})
export class CompanyDetailComponent implements OnInit {

    page = 1;
    id: number;
    company: Company = {name: '', quota: ''};
    employees: Employee[] = [];

    constructor(private activatedRoute: ActivatedRoute, private companiesService: CompaniesService,
                private employeesService: EmployeesService) {
        this.activatedRoute.params.subscribe(params => this.id = params['id']);
    }

    ngOnInit() {
        this.loadData(this.id);
    }

    loadData(id) {
        this.companiesService.get(id).subscribe((companyData: Company) => {
            this.company = companyData;
            this.employeesService.getEmployeesForCompany(id).subscribe((employeesData: Employee[]) => {
                this.employees = employeesData;
            });
        });
    }
}
