import {Component} from '@angular/core';
import {AuthService} from './service/auth.service';
import {
    BreakpointObserver,
    Breakpoints,
    BreakpointState,
  } from '@angular/cdk/layout';
  import { Observable } from 'rxjs';
  import { map } from 'rxjs/operators';


@Component({
    selector: 'app-root',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.css']
})
export class AppComponent {

    public isHandset$: Observable<boolean> = this.breakpointObserver
    .observe(Breakpoints.Handset)
    .pipe(map((result: BreakpointState) => result.matches));

    constructor(private breakpointObserver: BreakpointObserver, public _auth: AuthService) {    }

}
