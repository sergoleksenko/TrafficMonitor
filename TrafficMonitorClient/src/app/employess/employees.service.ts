import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Injectable({
    providedIn: 'root'
})
export class EmployeesService {
    baseUrl = 'http://localhost:8000';

    constructor(private httpClient: HttpClient) {
    }

    getEmployees() {
        return this.httpClient.get(this.baseUrl + '/api/employees');
    }
}
