import {Component, OnInit} from '@angular/core';
import {ActivatedRoute, Router} from '@angular/router';
import {EmployeesService} from '../employees.service';

@Component({
    selector: 'app-remove-employee',
    templateUrl: './remove-employee.component.html',
    styleUrls: ['./remove-employee.component.css']
})
export class RemoveEmployeeComponent implements OnInit {

    id;

    constructor(private activateRoute: ActivatedRoute, private employeesService: EmployeesService, private router: Router) {
        this.id = activateRoute.snapshot.params['id'];
    }

    ngOnInit() {
    }

    deleteEmployee() {
        this.employeesService.delete(this.id).subscribe();
    }
}
