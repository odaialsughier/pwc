import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Router} from '@angular/router';
import {environment} from '../../environments/environment';

@Injectable({
    providedIn: 'root'
})
export class AuthService {
    private _loginUrl = 'user/login';

    constructor(private http: HttpClient, private router: Router) {
    }

    loginUser(params) {
        return this.http.post<any>(`${environment.baseApi}${this._loginUrl}`, params)
    }


    loggedIn() {
        return !!localStorage.getItem('accessToken');
    }

    getToken() {
        return localStorage.getItem('accessToken');
    }

    getCurrentUserId() {
        return localStorage.getItem('currentUserId');
    }

    logoutUser() {
        localStorage.removeItem('currentUserId');
        localStorage.removeItem('accessToken');
        this.router.navigate(['/login'])
    }

    setCurrentUser(accessToken, data) {
        localStorage.setItem('currentUserId', data.id);
        localStorage.setItem('accessToken', accessToken);

    }
}
