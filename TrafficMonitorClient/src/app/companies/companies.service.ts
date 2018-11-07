import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Injectable({
    providedIn: 'root'
})
export class CompaniesService {
    private apiUrl = 'http://localhost:8000';

    constructor(private httpClient: HttpClient) {
    }

    all() {
        return this.httpClient.get(this.apiUrl + '/api/companies');
    }

    delete(id) {
        return this.httpClient.delete(this.apiUrl + '/api/companies/' + id);
    }

    report(month) {
        return this.httpClient.get(this.apiUrl + '/api/report/' + month);
    }
}
