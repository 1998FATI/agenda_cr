import React, { useState } from 'react';
import { View, Text, TouchableOpacity, StyleSheet, Image, FlatList, ImageBackground } from 'react-native';

const ITEMS_PER_PAGE = 4; 

const ReunionsListe = ({
  reunions,
  onSelectReunion,
}: {
  reunions: { objet: string; date_reunion: string; organ: { libelle: string } }[];
  onSelectReunion: (index: number) => void;
}) => {
  const [currentPage, setCurrentPage] = useState(0);

  const startIndex = currentPage * ITEMS_PER_PAGE;
  const endIndex = startIndex + ITEMS_PER_PAGE;
  const paginatedReunions = reunions.slice(startIndex, endIndex);

  const handleNextPage = () => {
    if (endIndex < reunions.length) {
      setCurrentPage((prevPage) => prevPage + 1);
    }
  };

  const handlePreviousPage = () => {
    if (currentPage > 0) {
      setCurrentPage((prevPage) => prevPage - 1);
    }
  };

  return (
    <ImageBackground
      source={require('../assets/pattern.png')} 
      style={styles.container}
    >
      <View style={styles.header}>
        <Image source={require('../assets/logo_2.png')} style={styles.logo} />
        <Text style={styles.title}>أجندة المجلس</Text>
      </View>
      <FlatList
        data={paginatedReunions}
        keyExtractor={(item, index) => index.toString()}
        renderItem={({ item, index }) => (
          <View style={styles.reunionContainer}>
            <View style={styles.reunionDetails}>
              <Text style={styles.reunionOrgan}>{item.objet}</Text>
              <Text style={styles.reunionText}> تحت إشراف : {item.organ.libelle}</Text>
              <Text style={styles.reunionText}> بتاريخ  {item.date_reunion}</Text>
            
            </View>

            <TouchableOpacity
              style={styles.detailsButton}
              onPress={() => onSelectReunion(index + startIndex)}
            >
              <Text style={styles.detailsButtonText}>عرض التفاصيل</Text>
            </TouchableOpacity>
            <View style={styles.separator} />
          </View>
        )}
      />
      <View style={styles.pagination}>
        <TouchableOpacity
          onPress={handlePreviousPage}
          disabled={currentPage === 0}
          style={[styles.paginationButton, currentPage === 0 && styles.disabledButton]}
        >
          <Text style={styles.paginationText}>السابق</Text>
        </TouchableOpacity>
        <TouchableOpacity
          onPress={handleNextPage}
          disabled={endIndex >= reunions.length}
          style={[styles.paginationButton, endIndex >= reunions.length && styles.disabledButton]}
        >
          <Text style={styles.paginationText}>التالي</Text>
        </TouchableOpacity>
      </View>
    </ImageBackground>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    padding: 10,
  },
  header: {
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'space-between',
    backgroundColor: 'rgba(249, 244, 244, 0.7)',
    padding: 10,
    borderBottomWidth: 2,
    borderBottomColor: '#e50a0a',
  },
  logo: {
    width: 40,
    height: 40,
    resizeMode: 'contain',
  },
  title: {
    fontSize: 22,
    color: '#e50a0a',
    fontWeight: 'bold',
    textDecorationLine: 'underline', 
  },
  pagination: {
    flexDirection: 'row-reverse',
    justifyContent: 'space-between',
    marginBottom: 10,
    paddingHorizontal: 10,
  },
  paginationButton: {
    backgroundColor: '#0dc699',
    paddingVertical: 8,
    paddingHorizontal: 20,
    borderRadius: 5,
  },
  disabledButton: {
    backgroundColor: '#ccc', 
  },
  paginationText: {
    color: '#fff',
    fontSize: 16,
    fontWeight: 'bold',
  },
  reunionContainer: {
    marginVertical: 10,
    padding: 10,
    backgroundColor: '#fff',
    borderRadius: 8,
    elevation: 2, 
  },
  reunionDetails: {
    flexDirection: 'column',
    alignItems: 'flex-end',
    marginBottom: 10,
  },
  reunionText: {
    fontSize: 16,
    textAlign: 'right',
    marginHorizontal: 5,
    color: '#333',
  },
  reunionOrgan: {
    fontSize: 16,
    fontWeight:'bold',
    textAlign: 'right',
    marginHorizontal: 5,
    color: '#333',
  },
  detailsButton: {
    alignSelf: 'center',
    backgroundColor: '#f93306',
    paddingVertical: 8,
    paddingHorizontal: 20,
    borderRadius: 5,
  },
  detailsButtonText: {
    color: '#fff',
    fontSize: 16,
    fontWeight: 'bold',
  },
  separator: {
    height: 1,
    backgroundColor: 'rgba(104, 48, 48, 0.7)',
    marginTop: 10,
  },
});

export default ReunionsListe;
