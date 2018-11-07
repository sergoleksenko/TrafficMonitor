import {Component, OnInit} from '@angular/core';
import {Company} from './company';
import {CompaniesService} from './companies.service';

export interface Month {
    value: string;
    viewValue: string;
}

@Component({
    selector: 'app-companies',
    templateUrl: './companies.component.html',
    styleUrls: ['./companies.component.css'],
})
export class CompaniesComponent implements OnInit {
    companies: Company[] = [];
    page = 1;
    selectedMonth = '0';

    months: Month[] = [
        {value: '01', viewValue: 'January'},
        {value: '02', viewValue: 'February'},
        {value: '03', viewValue: 'March'},
        {value: '04', viewValue: 'April'},
        {value: '05', viewValue: 'May'},
        {value: '06', viewValue: 'June'},
        {value: '07', viewValue: 'July'},
        {value: '08', viewValue: 'August'},
        {value: '09', viewValue: 'September'},
        {value: '10', viewValue: 'October'},
        {value: '11', viewValue: 'November'},
        {value: '12', viewValue: 'December'},
    ];

    constructor(private companyService: CompaniesService) {
    }

    ngOnInit() {
        this.companyService.all().subscribe((data: Company[]) => this.companies = data);
    }
}
