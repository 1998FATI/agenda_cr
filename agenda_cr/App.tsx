import React, { useState, useEffect } from 'react';
import { View, Text, StyleSheet, ActivityIndicator } from 'react-native';
import Home from './src/component/Home';
import ReunionsListe from './src/component/ReunionsListe';
import DetailsReunion from './src/component/DetailsReunion';
import { ApiService } from './src/services/ApiService';

interface Reunion {
  objet: string;
  details: string;
  date_reunion: string; 
  organ: { libelle: string };
  salle: number;
}

const App = () => {
  const [reunions, setReunions] = useState<Reunion[]>([]); 
  const [currentScreen, setCurrentScreen] = useState<string>('home');
  const [selectedReunion, setSelectedReunion] = useState<Reunion | null>(null); 
  const [loading, setLoading] = useState<boolean>(false); 
  const [error, setError] = useState<string | null>(null); 

  useEffect(() => {
    const fetchReunions = async () => {
      setLoading(true);
      setError(null);
      try {
        const data = await ApiService();

        if (Array.isArray(data)) {
          const sortedData = data.sort(
            (a: Reunion, b: Reunion) =>
              new Date(b.date_reunion).getTime() - new Date(a.date_reunion).getTime()
          );
          setReunions(sortedData);
        } else {
          console.error('Les données reçues ne sont pas un tableau :', data);
          setError('Format de données incorrect.');
        }
      } catch (err) {
        console.error('Erreur lors de la récupération des réunions :', err);
        setError('Erreur lors de la récupération des réunions.');
      } finally {
        setLoading(false);
      }
    };
    fetchReunions();
    const intervalId = setInterval(fetchReunions, 60000);
    return () => clearInterval(intervalId);
  }, []);

  let content;
  if (loading) {
    content = <ActivityIndicator size="large" color="#0000ff" />;
  } 

  else if (error) {
    content = <Text style={styles.errorText}>{error}</Text>;
  } 
 
  else if (currentScreen === 'home') {
    content = <Home onAgendaPress={() => setCurrentScreen('list')} />;
  } 
  
  else if (currentScreen === 'list') {
    content = (
      <ReunionsListe
        reunions={reunions}
        onSelectReunion={(index: number) => {
          setSelectedReunion(reunions[index]);
          setCurrentScreen('details');
        }}
      />
    );
  } 
  // Gestion des détails d'une réunion
  else if (currentScreen === 'details') {
    content = selectedReunion ? (
      <DetailsReunion
        reunion={selectedReunion}
        onBack={() => setCurrentScreen('list')}
        onHomePress={() => setCurrentScreen('home')}
      />
    ) : (
      <Text style={styles.errorText}>Erreur : Aucun détail de réunion disponible.</Text>
    );
  }

  return <View style={styles.container}>{content}</View>;
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#f8f9fa',
    padding: 20,
  },
  errorText: {
    color: 'red',
    fontSize: 16,
    textAlign: 'center',
  },
});

export default App;
