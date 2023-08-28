import React from "react";
import {View,Text,TextInput,StyleSheet} from 'react-native';
import { Controller } from "react-hook-form";

const CustomInput=({control,placeholder,secureTextEntry,name})=>{
return(
  <View>
  
<Controller 
          control={control} 
          name={name} 
          render={({field:{value,onChange,onBlur}})=> (
            <TextInput style={[buttonStyle.container]}
              name={name}
              placeholder={placeholder}
              value={value}
              onChangeText={onChange}
              onBlurText={onBlur}>
              secureTextEntry={secureTextEntry}
            </TextInput>
          )}/>
  </View>
 );
};

const buttonStyle = StyleSheet.create({
 container: {
   fontSize:30,
   borderWidth:1,
   padding:5,
   margin:5,
   borderRadius:10,
 },
});

export default CustomInput;