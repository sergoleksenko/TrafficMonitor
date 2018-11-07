import {Component, OnInit} from '@angular/core';
import {TrafficService} from './traffic.service';

@Component({
    selector: 'app-traffic',
    templateUrl: './traffic.component.html',
    styleUrls: ['./traffic.component.css']
})
export class TrafficComponent implements OnInit {

    constructor(private trafficService: TrafficService) {
    }

    ngOnInit() {
        this.trafficService.generate().subscribe();
    }
}
