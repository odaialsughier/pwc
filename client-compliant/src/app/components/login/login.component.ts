import {Component, OnInit} from '@angular/core';
import {FormGroup, FormControl, Validators} from '@angular/forms';
import {Router} from '@angular/router';
import {AuthService} from '../../service/auth.service';

@Component({
    selector: 'app-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
    loginFormGroup = new FormGroup({
        username: new FormControl(''),
        password: new FormControl(''),
    });
    errors = {
        username: null,
        password: null
    };

    defaultError = {
        username: null,
        password: null
    };

    constructor(private router: Router, private auth: AuthService) {}

    ngOnInit() {

    }

    handleErrors(errors) {
        const newErrors = {...this.defaultError};
        for (const item of errors) {
            newErrors[item.field] = item.message;
            this.loginFormGroup.controls[item.field].setErrors(item.message);
        }
        this.errors = newErrors;
    }

    handleSuccess(response) {
        this.errors = {...this.defaultError};
        this.auth.setCurrentUser(response.accessToken, response.user);
        this.router.navigate(['/dashboard']);
    }

    onSubmit() {
        this.auth.loginUser(this.loginFormGroup.value).subscribe(
            res => this.handleSuccess(res),
            res => this.handleErrors(res.error)
        )
    }

}
