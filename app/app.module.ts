import { HttpModule } from '@angular/http';
import { FormsModule } from '@angular/forms';
import { DonatePage } from './../pages/donate/donate';
import { SearchPage } from '../pages/search/search';
import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';
import { SplashScreen } from '@ionic-native/splash-screen';
import { StatusBar } from '@ionic-native/status-bar';
import { MyApp } from './app.component';
import { HomePage } from '../pages/home/home';
import { UserInfoServiceProvider } from '../providers/user-info-service/user-info-service';
  
@NgModule({
  declarations: [
    MyApp,
    HomePage,
    SearchPage,
    DonatePage,
  ],
  imports: [
    BrowserModule,
    IonicModule.forRoot(MyApp),
    FormsModule,
    HttpModule,
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage,
    SearchPage,
    DonatePage,
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler},
    UserInfoServiceProvider
  ]
})
export class AppModule {}
