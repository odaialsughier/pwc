import {Injectable} from '@angular/core';
import {
    CanActivate,
    CanActivateChild,
    CanDeactivate,
    CanLoad,
    Route,
    UrlSegment,
    ActivatedRouteSnapshot,
    RouterStateSnapshot,
    UrlTree,
    Router
} from '@angular/router';
import {Observable} from 'rxjs';
import {AuthService} from '../service/auth.service';

@Injectable({
    providedIn: 'root'
})
export class AuthGuard implements CanActivate {

    constructor(private _authService: AuthService, private _router: Router) {
    }

    canActivate(): boolean {
        if (this._authService.loggedIn()) {
            return true;
        }
        this._router.navigate(['/login']);
        return false
    }

}