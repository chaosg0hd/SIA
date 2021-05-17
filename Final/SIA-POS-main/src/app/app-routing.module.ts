import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HeaderComponent } from './header/header.component';
import { SidenavComponent} from './sidenav/sidenav.component';
import { SampletabComponent} from './sampletab/sampletab.component';


const routes: Routes = [
  
  {path:'nav',component: SidenavComponent },
  {path: 'Sample', component: SampletabComponent },
  {path: 'header', component: HeaderComponent }

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})

export class AppRoutingModule { }
