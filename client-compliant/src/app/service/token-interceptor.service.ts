import {Injectable} from '@angular/core';
import {AuthService} from './auth.service';
import {HttpInterceptor} from '@angular/common/http';

@Injectable({
    providedIn: 'root'
})
export class TokenInterceptorService implements HttpInterceptor {

    constructor(private auth: AuthService) {
    }

    intercept(req, next) {
        const tokenizeRea = req.clone({
            setHeaders: {
                Authorization: `Bearer ${this.auth.getToken()}`,
            }
        });
        return next.handle(tokenizeRea);
    }
}
