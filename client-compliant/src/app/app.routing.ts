import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {BrowserModule} from '@angular/platform-browser';
import {Routes, RouterModule} from '@angular/router';

import {LoginComponent} from './components/login/login.component';
import {GuestGuard} from './gurd/guest.guard';
import {AuthGuard} from './gurd/auth.guard';
import {DashboardComponent} from './components/dashboard/dashboard.component';
const routes: Routes = [
    {
        path: 'login',
        component: LoginComponent,
        canActivate: [GuestGuard]
    },
    {
        path: 'dashboard',
        canActivate: [AuthGuard],
        children: [
            {
                path: '',
                component: DashboardComponent
            }
        ]
    },
];

@NgModule({
    imports: [
        CommonModule,
        BrowserModule,
        RouterModule.forRoot(routes)
    ],
    exports: [],
})
export class AppRoutingModule {
}
