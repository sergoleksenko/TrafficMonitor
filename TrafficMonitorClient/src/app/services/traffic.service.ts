import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {environment} from '../../environments/environment';

@Injectable({
    providedIn: 'root'
})
export class TrafficService {
    private apiUrl = environment.apiUrl;

    constructor(private httpClient: HttpClient) {
    }

    generate() {
        return this.httpClient.post(this.apiUrl + '/api/traffics/generate', null);
    }
}
