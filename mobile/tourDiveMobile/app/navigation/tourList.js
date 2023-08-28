import { StatusBar } from 'expo-status-bar';
import { Button, StyleSheet, Text } from 'react-native';
import {WebView} from 'react-native-webview';
import {SafeAreaView} from 'react-native'
const {link}=require('../API/ngrok')

function TourList(){
 return(
  <SafeAreaView style={{flex:1,marginTop:30}}>
   <WebView source={{uri:link+'/nwp_projekt/mobile/tourDiveMobile/app/UI/about-us.php'}}>
   </WebView>
  </SafeAreaView>
 )
}

export default TourList;