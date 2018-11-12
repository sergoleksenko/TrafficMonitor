import {BrowserModule} from '@angular/platform-browser';
import {NgModule} from '@angular/core';
import {HttpClientModule} from '@angular/common/http';
import {NgxPaginationModule} from 'ngx-pagination';
import {FormsModule} from '@angular/forms';
import {RouterModule, Routes} from '@angular/router';

import {AppComponent} from './app.component';
import {CompaniesComponent} from './companies/companies.component';
import {EmployeesComponent} from './employees/employees.component';
import {TrafficComponent} from './traffic/traffic.component';
import {ReportComponent} from './report/report.component';

const appRoutes: Routes = [
    {path: '', redirectTo: '/companies', pathMatch: 'full'},
    {path: 'companies', component: CompaniesComponent},
    {path: 'employees', component: EmployeesComponent},
    {path: 'traffics/generate', component: TrafficComponent},
    {path: 'report/:month', component: ReportComponent},
];

@NgModule({
    declarations: [
        AppComponent,
        CompaniesComponent,
        EmployeesComponent,
        TrafficComponent,
        ReportComponent,
    ],
    imports: [
        BrowserModule,
        RouterModule.forRoot(appRoutes),
        HttpClientModule,
        NgxPaginationModule,
        FormsModule,
    ],
    providers: [],
    bootstrap: [AppComponent]
})
export class AppModule {
}
