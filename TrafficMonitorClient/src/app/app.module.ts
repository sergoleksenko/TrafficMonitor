import {BrowserModule} from '@angular/platform-browser';
import {NgModule} from '@angular/core';
import {HttpClientModule} from '@angular/common/http';

import {AppComponent} from './app.component';
import {CompaniesComponent} from './companies/companies.component';
import {EmployessComponent} from './employess/employess.component';
import {RouterModule, Routes} from '@angular/router';

const appRoutes: Routes = [
    {path: '', redirectTo: '/companies', pathMatch: 'full'},
    {path: 'companies', component: CompaniesComponent},
    {path: 'employees', component: EmployessComponent}
];

@NgModule({
    declarations: [
        AppComponent,
        CompaniesComponent,
        EmployessComponent
    ],
    imports: [
        BrowserModule, RouterModule.forRoot(appRoutes), HttpClientModule
    ],
    providers: [],
    bootstrap: [AppComponent]
})
export class AppModule {
}
