import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {environment} from '../../environments/environment';

@Injectable({
    providedIn: 'root'
})
export class CompaniesService {
    private apiUrl = environment.apiUrl;

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

    add(body) {
        return this.httpClient.post(this.apiUrl + '/api/companies', body);
    }
}
