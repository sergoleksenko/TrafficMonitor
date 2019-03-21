import {Component, OnInit} from '@angular/core';
import {TrafficService} from '../services/traffic.service';

@Component({
    selector: 'app-traffic',
    templateUrl: './traffic.component.html',
    styleUrls: ['./traffic.component.css']
})
export class TrafficComponent implements OnInit {

    header = 'Traffic generation is in progress...';
    message = 'Right now we are generating traffic for you. We let you know when process will complete. Please wait';

    constructor(private trafficService: TrafficService) {
    }

    ngOnInit() {
        const id = setInterval(() => {
            if (this.message.length > this.message.length + 10) {
                this.message = this.message.substr(0, 100);
            }
            this.message = this.message + ' .';
        }, 1000);

        this.trafficService.generate().subscribe(data => {
            clearInterval(id);
            this.header = 'Generation was success!';
            this.message = 'Data was successfully generated! ' +
                'To see report please use \'Report\' button on the Companies page.';
        });
    }
}
