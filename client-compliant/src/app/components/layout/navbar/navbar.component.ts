import {Component, OnInit, Output, EventEmitter} from '@angular/core';
import {AuthService} from '../../../service/auth.service';
import {UsersService} from '../../../service/users.service';
import {MatSnackBar} from '@angular/material/snack-bar';
import {MatDialog} from '@angular/material/dialog';
import {Router} from '@angular/router';

@Component({
    selector: 'app-nav',
    templateUrl: './navbar.component.html',
    styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {
    currentUser;
    currentLang;

    @Output() public sidenavToggle = new EventEmitter();

    constructor(private router: Router,
                private auth: AuthService,
                private users: UsersService,
                ) {
    }

    ngOnInit() {
        this.users.getCurrentUser().subscribe(
            res => this.handleCurrentUser(res)
        )
    }

    handleCurrentUser(user) {
        this.currentUser = user;
    }


    logout() {
        this.auth.logoutUser();
        this.router.navigate(['/login'])
    }

    public onToggleSidenav = () => {
        this.sidenavToggle.emit();
    }

}
