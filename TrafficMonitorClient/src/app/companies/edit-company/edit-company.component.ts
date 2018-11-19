import {Component, OnInit} from '@angular/core';
import {CompaniesService} from '../../services/companies.service';
import {Company} from '../company';
import {ActivatedRoute, Router} from '@angular/router';

@Component({
    selector: 'app-edit-company',
    templateUrl: './edit-company.component.html',
    styleUrls: ['./edit-company.component.css']
})
export class EditCompanyComponent implements OnInit {

    id: number;
    company: Company = {name: '', quota: ''};

    constructor(private activatedRoute: ActivatedRoute, private companiesService: CompaniesService, private router: Router) {
        this.activatedRoute.params.subscribe(params => this.id = params['id']);
    }

    ngOnInit() {
        this.loadData(this.id);
    }

    loadData(id) {
        this.companiesService.get(id).subscribe((data: Company) => this.company = data);
    }

    editCompany() {
        this.companiesService.edit(this.id, new Company(this.company.name, this.company.quota)).subscribe(data =>
            this.router.navigate(['']));
    }
}
