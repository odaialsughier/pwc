import {Component, OnInit, Output, EventEmitter, ViewChild} from '@angular/core';
import {MatSidenav} from '@angular/material/sidenav';
import {AuthService} from '../../../service/auth.service';
import {Router} from '@angular/router';

@Component({
    selector: 'app-sidebar',
    templateUrl: './sidebar.component.html',
    styleUrls: ['./sidebar.component.css']
})
export class SidebarComponent implements OnInit {
    @Output() sidenavClose = new EventEmitter();
    @ViewChild('sidenav') sidenav: MatSidenav;
    public profile;

    constructor(private router: Router, private auth: AuthService) {
    }


    ngOnInit() {}

    logout() {
        this.auth.logoutUser();
        this.router.navigate(['/login'])
    }

    public onSidenavClose = () => {
        this.sidenavClose.emit();
    }
}
