import { Alert, LogBox, Pressable, StyleSheet, Text, TextInput, TouchableOpacity, View,Button } from 'react-native';
import {WebView} from 'react-native-webview';
import { SafeAreaProvider, SafeAreaView } from 'react-native-safe-area-context';
import { useNetInfo } from '@react-native-community/netinfo';
import {useForm,Controller} from 'react-hook-form';
import { NavigationContainer } from '@react-navigation/native';
//import { createNativeStackNavigator } from '@react-navigation/native-stack';
import SignIn from './app/navigation/SignIn';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
import { AntDesign } from '@expo/vector-icons';
import { Fontisto } from '@expo/vector-icons';
import { Entypo } from '@expo/vector-icons';
import Mainmenu from './app/navigation/Menu';
import Tours from './app/navigation/tours';
import Favorites from './app/navigation/favorites';
import TourList from './app/navigation/tourList';
import Admin from './app/navigation/admin';
import {admin} from './app/navigation/SignIn';
/*if (localStorage.getItem("admin")==true)
{
  var admin=true;
}*/

//const Stack=createNativeStackNavigator();
const Tab=createBottomTabNavigator();

function App(){
  if(admin!=true){
    return(
    <NavigationContainer>
      {/* <Stack.Navigator>
        <Stack.Screen options={{headerShown:false}} name="Login" component={SignIn}/>
        <Stack.Screen options={{headerBackVisible:false}} name="Details" component={HomeScreen} />
      </Stack.Navigator> */}
      <Tab.Navigator>
        <Tab.Screen name= "Login" options={{tabBarItemStyle:{display:'none'},tabBarStyle:{display:'none'},headerShown:false}} component={SignIn}/>
        <Tab.Screen name= "MainMenu" options={{tabBarIcon:({})=> <AntDesign name="home" size={24} color="black" />, headerShown:false}} component={Mainmenu}/>
        <Tab.Screen name= "Tours" options={{tabBarIcon:({})=> <AntDesign name="book" size={24} color="black" />, headerShown:false}} component={Tours}/>
        <Tab.Screen name= "TourList" options={{tabBarIcon:({})=> <Entypo name="list" size={24} color="black" />, headerShown:false}} component={TourList}/>
        <Tab.Screen name= "Favorites" options={{tabBarIcon:({})=> <Fontisto name="favorite" size={24} color="black" />, headerShown:false}} component={Favorites}/>
        <Tab.Screen name= "Admin" options={{tabBarIcon:({})=> <Fontisto name="player-settings" size={24} color="black" />, headerShown:false}} component={Admin}/>
      </Tab.Navigator>
    </NavigationContainer>
    )
  }
  else
  return(
    <NavigationContainer>
    <Tab.Navigator>
        <Tab.Screen name= "Login" options={{tabBarItemStyle:{display:'none'},tabBarStyle:{display:'none'},headerShown:false}} component={SignIn}/>
        <Tab.Screen name= "MainMenu" options={{tabBarIcon:({})=> <AntDesign name="home" size={24} color="black" />, headerShown:false}} component={Mainmenu}/>
        <Tab.Screen name= "Tours" options={{tabBarIcon:({})=> <AntDesign name="book" size={24} color="black" />, headerShown:false}} component={Tours}/>
        <Tab.Screen name= "TourList" options={{tabBarIcon:({})=> <Entypo name="list" size={24} color="black" />, headerShown:false}} component={TourList}/>
        <Tab.Screen name= "Favorites" options={{tabBarIcon:({})=> <Fontisto name="favorite" size={24} color="black" />, headerShown:false}} component={Favorites}/>
      </Tab.Navigator>
    </NavigationContainer>
  )
}

export default App;