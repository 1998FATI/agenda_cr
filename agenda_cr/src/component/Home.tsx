import React, { useState } from 'react';
import { View, Text, Image, TouchableOpacity, StyleSheet, ImageBackground } from 'react-native';
import { LinearGradient } from 'react-native-linear-gradient';

const Home = ({ onAgendaPress }: { onAgendaPress: () => void }) => {
  const [buttonColor, setButtonColor] = useState('#e50a0a');
  const handlePressIn = () => setButtonColor('#bf0510');
  const handlePressOut = () => setButtonColor('#e50a0a');

  return (
    <ImageBackground
      source={require('../assets/pattern.png')} 
      style={styles.container}
    >
      <Image source={require('../assets/logo_2.png')} style={styles.logo} />
      
      <View style={styles.menuContainer}>
        <LinearGradient colors={[buttonColor, '#efeaea']} style={styles.menuButton}>
          <TouchableOpacity 
            onPress={onAgendaPress} 
            onPressIn={handlePressIn} 
            onPressOut={handlePressOut}
          > 
            <Text style={styles.buttonText}>أجندة المجلس</Text>
          </TouchableOpacity>
        </LinearGradient>

        <LinearGradient colors={[buttonColor, '#efeaea']} style={styles.menuButton}>
          <TouchableOpacity disabled={true} onPressIn={handlePressIn} onPressOut={handlePressOut}>
            <Text style={styles.buttonText}>أعضاء المجلس</Text>
          </TouchableOpacity>
        </LinearGradient>

        <LinearGradient colors={[buttonColor, '#efeaea']} style={styles.menuButton}>
          <TouchableOpacity disabled={true} onPressIn={handlePressIn} onPressOut={handlePressOut}>
            <Text style={styles.buttonText}>اللجن البرلمانية</Text>
          </TouchableOpacity>
        </LinearGradient>

        <LinearGradient colors={[buttonColor, '#efeaea']} style={styles.menuButton}>
          <TouchableOpacity disabled={true} onPressIn={handlePressIn} onPressOut={handlePressOut}>
            <Text style={styles.buttonText}>الفرق البرلمانية</Text>
          </TouchableOpacity>
        </LinearGradient>
      </View>
    </ImageBackground>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    padding: 20,
  },
  logo: {
    width: 90, 
    height: 90,
    position: 'absolute', 
    top: 10, 
    right: 10, 
  },
  menuContainer: {
    width: '100%',
    alignItems: 'center',
    marginTop: 10,
  },
  menuButton: {
    width: '80%',
    padding: 15,
    marginVertical: 5,
    borderRadius: 10,
    justifyContent: 'center',
    alignItems: 'center',
  },
  buttonText: {
    fontSize: 18,
    color: '#fff',
    fontWeight: 'bold',
  },
});

export default Home;
