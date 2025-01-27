import React from 'react';
import { View, Text, TouchableOpacity, StyleSheet, Image, ImageBackground } from 'react-native';

const DetailsReunion = ({
  reunion,
  onBack,
  onHomePress,
}: {
  reunion: { objet: string; details: string; date_reunion: string; salle: number } | null;
  onBack: () => void;
  onHomePress: () => void;
}) => {
  if (!reunion) {
    return <Text>Erreur : Aucun détail de réunion disponible.</Text>;
  }

  return (
    <ImageBackground
      source={require('../assets/pattern.png')}
      style={styles.container}
    >
      <View style={styles.menuContainer}>
        <Image source={require('../assets/logo_2.png')} style={styles.logo} />
        <TouchableOpacity onPress={onHomePress} style={styles.homeLink}>
          <Text style={styles.homeLinkText}>الصفحة الرئيسية</Text>
        </TouchableOpacity>
      </View>

      <View style={styles.header}>
        <Text style={styles.date}>{reunion.date_reunion}</Text>
        <Text style={styles.location}>القاعة رقم {reunion.salle}</Text>
      </View>

      <View style={styles.content}>
        <Text style={styles.title}>{reunion.objet}</Text>
        <Text style={styles.details}>{reunion.details}</Text>
      </View>

      <TouchableOpacity onPress={onBack} style={styles.backButton}>
        <Text style={styles.backButtonText}>رجوع</Text>
      </TouchableOpacity>
    </ImageBackground>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    padding: 20,
    justifyContent: 'flex-start', 
    backgroundColor: '#fff',
  },
  menuContainer: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    alignItems: 'center',
    marginBottom: 20,
  },
  logo: {
    width: 50,
    height: 50,
  },
  homeLink: {
    padding: 10,
  },
  homeLinkText: {
    fontSize: 16,
    color: '#d00713',
    fontWeight: 'bold',
    textDecorationLine: 'underline',
  },
  header: {
    backgroundColor: 'rgba(159, 5, 5, 0.89)',
    padding: 10,
    borderRadius: 5,
    marginBottom: 20,
  },
  date: {
    color: '#fff',
    fontSize: 18,
    fontWeight:'bold',
    textAlign: 'right',
  },
  location: {
    color: '#fff',
    fontSize: 14,
    textAlign: 'right',
    fontWeight:'bold',
    marginTop: 5,
  },
  content: {
    backgroundColor: '#f8f8f8',
    padding: 15,
    borderRadius: 5,
  },
  title: {
    fontSize: 20,
    fontWeight: 'bold',
    textAlign: 'right',
    color: '#29262a',
    marginBottom: 10,
  },
  details: {
    fontSize: 18,
    textAlign: 'right',
    lineHeight: 28,
    color: '#333',
  },
  backButton: {
    padding: 15,
    backgroundColor: '#0dc699',
    borderRadius: 5,
    margin: 20,
    alignSelf: 'center',
  },
  backButtonText: {
    fontSize: 16,
    color: '#fff',
  },
});

export default DetailsReunion;
