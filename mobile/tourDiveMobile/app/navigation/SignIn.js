import { Alert, LogBox, Pressable, StyleSheet, Text, TextInput, ToastAndroid ,View } from 'react-native';
import {WebView} from 'react-native-webview';
import { SafeAreaProvider, SafeAreaView } from 'react-native-safe-area-context';
import { useNetInfo } from '@react-native-community/netinfo';
import {useForm,Controller} from 'react-hook-form';
const {link}=require('../API/ngrok');
var admin=true;

export default function SignIn({navigation}) {
  const netinfo=useNetInfo();
  const {control,handleSubmit,formState:{errors}} = useForm();
  console.log(errors);

  async function getLogin(){
    try{
      const response=await fetch(link+"/nwp_projekt/mobile/tourDiveMobile/app/API/getState.php",{
        method: 'GET',
        headers:{
          'Accept':'application/json'
        },
      })
      .then(response => response.json())
      .then(response => response.login)
      //console.log(response);
      return await response;
    }
    catch(error)
    {
      console.log(error.message);
    }
  };

  const onSignInPressed = (data)=>{
    console.log(data);
    fetch(link+"/nwp_projekt/mobile/tourDiveMobile/app/API/login.php",{  //change this when building app on to set the new ngrok tunnel
      method:'POST',
      headers:{
        'Content-Type':'application/json', //REQUIRED
        'Accept':'application/json',
      },
      body: JSON.stringify(data)
    })
    .catch(function(error){
      console.error(error);
    })
    //if login successful navigate to next page
    //getLogin().then(val=>console.log(val));
    getLogin().then(
      val => {if(val=="true"){
        console.log('Creds are correct');
        //admin=true;
        navigation.navigate('MainMenu');
      }
      else
      {
        console.log('Creds are bad')
        ToastAndroid.show('Your password or Email you provided is wrong',ToastAndroid.LONG);
      }}
    )
  };

    if(netinfo.isConnected && netinfo.isInternetReachable!=null){
      return (
        <SafeAreaProvider style={[loginBtn.container]}>
          <Text style={{fontSize:50,paddingBottom:10}}>
            TourDive
          </Text>
          <Controller control={control} 
          rules={{required:true}}
          name="email" 
          render={({field:{value,onChange,onBlur}})=> (
            <TextInput style={[buttonStyle.container]}
              name='email'
              placeholder='Enter Email'
              value={value}
              onChangeText={onChange}
              onBlurText={onBlur}>
            </TextInput>
          )}/>

          <Controller control={control} 
          name="password" 
          rules={{required:true}}
          render={({field:{value,onChange,onBlur}})=> (
            <TextInput style={[buttonStyle.container]}
              name='password'
              placeholder='Enter Password'
              value={value}
              justifyContent='center'
              textAlign='center'
              onChangeText={onChange}
              onBlurText={onBlur}
              secureTextEntry={true}>
            </TextInput>
          )}/>

          <Pressable style={[loginBtn.button]} onPress={handleSubmit(onSignInPressed)}>
            <Text style={[loginBtn.text]}>Login</Text>
          </Pressable>
        </SafeAreaProvider>
      );      
    }
    else
    {
      return (
        
        <SafeAreaProvider style={[netInfostyle.container]}>
        <Text>You are not connected to the internet</Text>
        </SafeAreaProvider>
      );
    }
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    marginTop:30
  },
});

const netInfostyle = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#ef7b45',
  },
});

const loginBtn=StyleSheet.create({
  container:{
    flex:1,
    justifyContent:"center",
    alignItems:"center",
    backgroundColor: '#ef7b45',
    marginTop:30,
  },
  button:{
    width:230,
    padding:10,
    justifyContent:'center',
    alignItems:'center',
    backgroundColor:'#1A7EC9',
    borderRadius:10,
    elevation:3
  },
  text:{
    fontSize: 16,
    lineHeight: 21,
    fontWeight: 'bold',
    letterSpacing: 0.25,
    color: 'white',
  }
})

const buttonStyle = StyleSheet.create({
  container: {
    fontSize:30,
    borderWidth:1,
    padding:5,
    margin:5,
    borderRadius:10,
  },
});