import {BrowserModule} from '@angular/platform-browser';
import {NgModule} from '@angular/core';
import {HttpClientModule} from '@angular/common/http';
import {NgxPaginationModule} from 'ngx-pagination';
import {FormsModule} from '@angular/forms';

import {AppComponent} from './app.component';
import {CompaniesComponent} from './companies/companies.component';
import {EmployeesComponent} from './employees/employees.component';
import {RouterModule, Routes} from '@angular/router';
import {RemoveCompanyComponent} from './companies/remove-company/remove-company.component';
import {TrafficComponent} from './traffic/traffic.component';
import {RemoveEmployeeComponent} from './employees/remove-employee/remove-employee.component';
import {ReportComponent} from './report/report.component';

const appRoutes: Routes = [
    {path: '', redirectTo: '/companies', pathMatch: 'full'},
    {path: 'companies', component: CompaniesComponent},
    {path: 'companies/:id/delete', component: RemoveCompanyComponent},
    {path: 'employees', component: EmployeesComponent},
    {path: 'employees/:id/delete', component: RemoveEmployeeComponent},
    {path: 'traffics/generate', component: RemoveEmployeeComponent},
    {path: 'report/:month', component: ReportComponent},
];

@NgModule({
    declarations: [
        AppComponent,
        CompaniesComponent,
        EmployeesComponent,
        RemoveCompanyComponent,
        TrafficComponent,
        RemoveEmployeeComponent,
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
