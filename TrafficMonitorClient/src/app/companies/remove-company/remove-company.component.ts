import {Component, OnInit} from '@angular/core';
import {ActivatedRoute, Router} from '@angular/router';
import {CompaniesService} from '../companies.service';

@Component({
    selector: 'app-remove-company',
    templateUrl: './remove-company.component.html',
    styleUrls: ['./remove-company.component.css']
})
export class RemoveCompanyComponent implements OnInit {

    id;

    constructor(private activateRoute: ActivatedRoute, private companiesService: CompaniesService, private router: Router) {
        this.id = activateRoute.snapshot.params['id'];
    }

    ngOnInit() {
    }

    deleteCompany() {
        this.companiesService.delete(this.id).subscribe();
    }
}
