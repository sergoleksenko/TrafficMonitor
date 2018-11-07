import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Injectable({
    providedIn: 'root'
})
export class TrafficService {
    private apiUrl = 'http://localhost:8000';

    constructor(private httpClient: HttpClient) {
    }

    generate() {
        return this.httpClient.post(this.apiUrl + '/api/traffics/generate', null);
    }
}
