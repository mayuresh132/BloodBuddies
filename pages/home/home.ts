import { DonatePage } from './../donate/donate';
import { SearchPage } from './../search/search';
import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {

  constructor(public navCtrl: NavController) {
  }
  goToSearchDonar(params){
    if (!params) params = {};
    this.navCtrl.push(SearchPage);
  }goToSignup(params){
    if (!params) params = {};
    this.navCtrl.push(DonatePage);
  }
}
