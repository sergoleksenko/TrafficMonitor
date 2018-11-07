import {Component, OnInit} from '@angular/core';
import {Report} from './report';
import {CompaniesService} from '../companies/companies.service';
import {ActivatedRoute} from '@angular/router';

@Component({
    selector: 'app-report',
    templateUrl: './report.component.html',
    styleUrls: ['./report.component.css']
})
export class ReportComponent implements OnInit {
    report: Report[] = [];
    month;

    constructor(private activateRoute: ActivatedRoute, private companiesService: CompaniesService) {
        this.month = activateRoute.snapshot.params['month'];
    }

    ngOnInit() {
        this.companiesService.report(this.month).subscribe((data: Report[]) => {
            this.report = data;
            console.log(data);
        });
    }
}
