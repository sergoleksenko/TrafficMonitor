import {Component, OnInit} from '@angular/core';
import {ActivatedRoute, Router} from '@angular/router';
import {Employee} from '../employee';
import {EmployeesService} from '../../services/employees.service';
import {CompaniesService} from '../../services/companies.service';

@Component({
    selector: 'app-edit-employee',
    templateUrl: './edit-employee.component.html',
    styleUrls: ['./edit-employee.component.css']
})
export class EditEmployeeComponent implements OnInit {

    id: number;
    employee: Employee = {name: '', email: ''};
    companies = [];

    constructor(private activatedRoute: ActivatedRoute, private employeesService: EmployeesService,
                private companiesService: CompaniesService, private router: Router) {
        this.activatedRoute.params.subscribe(params => this.id = params['id']);
    }

    ngOnInit() {
        this.loadData(this.id);
    }

    loadData(id) {
        this.employeesService.get(id).subscribe((employeeData: Employee) => {
            this.employee = employeeData;
            this.companiesService.all().subscribe((companiesData: Array<Object>) => {
                for (let i = 0; i < companiesData.length; i++) {
                    this.companies.push({value: companiesData[i]['id'], viewValue: companiesData[i]['name']});
                }
            });
        });
    }

    editEmployee() {
        this.employeesService.edit(this.id, new Employee(this.employee.name, this.employee.email, this.employee.company_id))
            .subscribe(data => this.router.navigate(['/employees']));
    }
}
