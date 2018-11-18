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
import {EditCompanyComponent} from './companies/edit-company/edit-company.component';
import {EditEmployeeComponent} from './employees/edit-employee/edit-employee.component';

const appRoutes: Routes = [
    {path: '', redirectTo: '/companies', pathMatch: 'full'},
    {path: 'companies', component: CompaniesComponent},
    {path: 'companies/:id/edit', component: EditCompanyComponent},
    {path: 'employees', component: EmployeesComponent},
    {path: 'employees/:id/edit', component: EditEmployeeComponent},
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
        EditCompanyComponent,
        EditEmployeeComponent,
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
