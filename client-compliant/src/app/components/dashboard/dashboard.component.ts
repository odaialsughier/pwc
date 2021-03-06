import {Component, OnInit} from '@angular/core';
import {Breadcrumb} from '../../models/breadcrumb.interface'

@Component({
    selector: 'app-dashboard',
    templateUrl: './dashboard.component.html',
    styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {
    breadcrumbs: Breadcrumb[]

    constructor() {
    }

    ngOnInit() {
    }
}
