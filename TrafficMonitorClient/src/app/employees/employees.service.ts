import {Injectable} from '@angular/core';
import {HttpClient, HttpParams} from '@angular/common/http';

@Injectable({
    providedIn: 'root'
})
export class EmployeesService {
    apiUrl = 'http://localhost:8000';

    constructor(private httpClient: HttpClient) {
    }

    getEmployees() {
        const params = new HttpParams().set('company', true.toString());
        return this.httpClient.get(this.apiUrl + '/api/employees', {params});
    }

    delete(id) {
        return this.httpClient.delete(this.apiUrl + '/api/employees/' + id);
    }

    add(body) {
        return this.httpClient.post(this.apiUrl + '/api/employees', body);
    }
}
