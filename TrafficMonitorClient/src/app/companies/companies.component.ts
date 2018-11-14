import {Component, OnInit} from '@angular/core';
import {Company} from './company';
import {CompaniesService} from '../services/companies.service';
import {NgForm} from '@angular/forms';

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
    isViewable = false;

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

    constructor(private companiesService: CompaniesService) {
    }

    ngOnInit() {
        this.loadData();
    }

    loadData() {
        this.companiesService.all().subscribe((data: Company[]) => this.companies = data);
    }

    deleteCompany(id) {
        if (confirm('Are you sure you want to delete this record?')) {
            this.companiesService.delete(id).subscribe(data => this.loadData());
        }
    }

    openForm() {
        this.isViewable = true;
    }

    closeForm(form: NgForm) {
        form.resetForm();
        this.isViewable = false;
    }

    addCompany(form: NgForm) {
        this.companiesService.add(new Company(form.value.name, form.value.quota)).subscribe(data => {
            this.loadData();
            form.resetForm();
            this.isViewable = false;
        });
    }
}
