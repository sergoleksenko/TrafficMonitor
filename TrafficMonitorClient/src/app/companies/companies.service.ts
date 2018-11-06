import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Injectable({
    providedIn: 'root'
})
export class CompaniesService {
    baseUrl = 'http://localhost:8000';

    constructor(private httpClient: HttpClient) {
    }

    getCompanies() {
        return this.httpClient.get(this.baseUrl + '/api/companies');
    }
}
