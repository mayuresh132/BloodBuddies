import { Http, Headers, RequestOptions } from '@angular/http';
import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

/**
 * Generated class for the DonatePage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-donate',
  templateUrl: 'donate.html',
})
export class DonatePage {

  todo = {
    DonarName: '',
    Mobile_No: '',
    Mobile_No2: '',
    Villege: '',
    City: '',
    BloodGroup: '',
    key:'create'
  };

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad DonatePage');
  }
  
  donateData(form) {
    let postdata=form.value
    console.log(form.value);
    this.http.post("",postdata)
    .subscribe(data => {
      console.log(data['_body']);
    },error =>{
      console.log(error);
    });

  }
}
