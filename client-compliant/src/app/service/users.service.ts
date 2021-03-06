import {Injectable} from '@angular/core';
import {Router} from '@angular/router';
import {HttpClient} from '@angular/common/http';
import {AuthService} from './auth.service';
import {environment} from '../../environments/environment';

@Injectable({
    providedIn: 'root'
})
export class UsersService {

    private _usersUrl = 'users';

    constructor(private http: HttpClient, private router: Router, private auth: AuthService) {
    }

    getCurrentUser() {
        return this.http.get<any>(environment.baseApi + this._usersUrl + '/' + this.auth.getCurrentUserId())
    }

    create(data) {
        return this.http.post<any>(environment.baseApi + this._usersUrl, data);
    }

    update(id, data) {
        return this.http.put<any>(environment.baseApi + this._usersUrl + '/' + id, data)
    }
}
