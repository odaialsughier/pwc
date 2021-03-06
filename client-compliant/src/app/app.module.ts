import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {NgModule} from '@angular/core';
import {NgxPaginationModule} from 'ngx-pagination';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import {HTTP_INTERCEPTORS, HttpClient, HttpClientModule} from '@angular/common/http';
import {RouterModule} from '@angular/router';
import {AppRoutingModule} from './app.routing';
import {AppComponent} from './app.component';
import {LoginComponent} from './components/login/login.component';
import {AuthService} from './service/auth.service';
import {AuthGuard} from './gurd/auth.guard';
import {GuestGuard} from './gurd/guest.guard';
import {FooterComponent} from './components/layout/footer/footer.component';
import {NavbarComponent} from './components/layout/navbar/navbar.component';
import {SidebarComponent} from './components/layout/sidebar/sidebar.component';
import {DashboardComponent} from './components/dashboard/dashboard.component';
import {MatFormFieldModule} from '@angular/material/form-field';
import {MatInputModule} from '@angular/material/input';
import {MatTooltipModule} from '@angular/material/tooltip';
import {MatButtonModule} from '@angular/material/button';
import {DateAdapter, MAT_DATE_FORMATS, MAT_DATE_LOCALE, MatNativeDateModule, MatRippleModule} from '@angular/material/core';
import {MatSelectModule} from '@angular/material/select';
import {MatRadioModule} from '@angular/material/radio';
import {MatIconModule} from '@angular/material/icon';
import {MatSlideToggleModule} from '@angular/material/slide-toggle';
import {MatSnackBarModule} from '@angular/material/snack-bar';
import {CodeInputModule} from 'angular-code-input';
import {UsersService} from './service/users.service';
import {MatDialogModule} from '@angular/material/dialog';
import {MatDatepickerModule} from '@angular/material/datepicker';
import {NgxIntlTelInputModule} from 'ngx-intl-tel-input';
import {MatAutocompleteModule} from '@angular/material/autocomplete';
import {NgxMatSelectSearchModule} from 'ngx-mat-select-search';
import {MatSidenavModule} from '@angular/material/sidenav';
import {MatProgressSpinnerModule, MatSpinner} from '@angular/material/progress-spinner';
import {MatToolbarModule} from '@angular/material/toolbar';
import {LayoutComponent} from './layout/layout/layout.component';
import {MatMenuModule} from '@angular/material/menu';
import { BreadcrumbComponent } from './components/breadcrumb/breadcrumb.component';
import {MatListModule} from '@angular/material/list'
import {MatExpansionModule} from '@angular/material/expansion';

@NgModule({
    imports: [
        BrowserAnimationsModule,
        FormsModule,
        ReactiveFormsModule,
        HttpClientModule,
        RouterModule,
        AppRoutingModule,
        MatButtonModule,
        MatSnackBarModule,
        MatRippleModule,
        MatFormFieldModule,
        MatInputModule,
        MatSelectModule,
        MatProgressSpinnerModule,
        MatAutocompleteModule,
        MatRadioModule,
        MatTooltipModule,
        MatIconModule,
        MatSlideToggleModule,
        MatDialogModule,
        CodeInputModule,
        NgxPaginationModule,
       MatRadioModule,
        MatDatepickerModule,
        MatNativeDateModule,
        NgxIntlTelInputModule,
        NgxMatSelectSearchModule,
        MatSidenavModule,
        MatToolbarModule,
        MatMenuModule,
        MatListModule,
        MatExpansionModule,
    ],
    declarations: [
        AppComponent,
        LoginComponent,
        FooterComponent,
        NavbarComponent,
        SidebarComponent,
        LayoutComponent,
        DashboardComponent,
        BreadcrumbComponent,
    ],
    providers: [
        AuthService,
        AuthGuard,
        GuestGuard,
        UsersService,
        MatDatepickerModule
    ],
    bootstrap: [AppComponent]
})
export class AppModule {
}

