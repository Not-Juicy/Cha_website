import React, { useState } from 'react';
import { View, Text, StyleSheet, ScrollView, TouchableOpacity, Image, TextInput, Share } from 'react-native';
import { Ionicons } from '@expo/vector-icons';
import { Spacing, BorderRadius, Colors, Shadows } from '../../theme/colors';
import newsEvent1 from '../../../assets/news-event-1.jpg';
import newsUpdate1 from '../../../assets/news-update-1.jpg';
import doctorTraining from '../../../assets/doctor-training.jpg';

const newsItems = [
  {
    id: 1,
    img: newsEvent1,
    badge: 'Event',
    badgeColor: Colors.primary,
    category: 'Event',
    date: 'Apr 17, 2025',
    readTime: '3 min read',
    title: 'World Haemophilia Day 2025 Community Awareness Event',
    body:
      'CHA brought together patients, families, and healthcare professionals to mark World Haemophilia Day 2025. The community awareness event featured educational sessions, screening information, and open dialogue about living with bleeding disorders in Cambodia.',
  },
  {
    id: 2,
    img: newsUpdate1,
    badge: 'Update',
    badgeColor: Colors.secondary,
    category: 'Update',
    date: 'Apr 16, 2025',
    readTime: '4 min read',
    title: 'New Treatment Guidelines Now Available',
    body:
      'Updated treatment guidelines are now available for patients and clinicians. The new guidance reflects international best practice for the management of haemophilia and other bleeding disorders, and will support partner treatment centres across the country.',
  },
  {
    id: 3,
    img: doctorTraining,
    badge: 'Workshop',
    badgeColor: Colors.purple,
    category: 'Workshop',
    date: 'Apr 12, 2025',
    readTime: '5 min read',
    title: 'Training Workshop for Healthcare Professionals',
    body:
      'A training workshop for healthcare professionals was held to strengthen the diagnosis and care of people with bleeding disorders. Participants gained practical skills in factor replacement therapy and emergency management.',
  },
];

const CATEGORIES = ['All', 'Event', 'Update', 'Workshop'];

export default function NewsScreen({ navigation }: any) {
  const [expanded, setExpanded] = useState<number | null>(null);
  const [selectedCategory, setSelectedCategory] = useState('All');
  const [searchQuery, setSearchQuery] = useState('');

  const filteredNews = newsItems.filter((item) => {
    const matchesCat = selectedCategory === 'All' || item.category === selectedCategory;
    const matchesSearch = item.title.toLowerCase().includes(searchQuery.toLowerCase()) ||
                          item.body.toLowerCase().includes(searchQuery.toLowerCase());
    return matchesCat && matchesSearch;
  });

  const handleShare = async (title: string) => {
    try {
      await Share.share({
        message: `CHA News: ${title}\nRead more on Cambodian Haemophilia Association app.`,
      });
    } catch (e) {
      // ignore
    }
  };

  return (
    <ScrollView style={styles.container} showsVerticalScrollIndicator={false}>
      {/* Header */}
      <View style={styles.header}>
        <TouchableOpacity style={styles.backBtn} onPress={() => navigation.goBack()} hitSlop={{ top: 10, bottom: 10, left: 10, right: 10 }}>
          <Ionicons name="arrow-back" size={20} color="#FFFFFF" />
        </TouchableOpacity>
        <View style={styles.headerTitleWrap}>
          <Text style={styles.headerTitle}>News & Events</Text>
          <Text style={styles.headerSub}>Latest updates from CHA Cambodia</Text>
        </View>
      </View>

      {/* Search Bar */}
      <View style={styles.searchSection}>
        <View style={styles.searchBar}>
          <Ionicons name="search" size={18} color={Colors.textSecondary} />
          <TextInput
            style={styles.searchInput}
            placeholder="Search news & updates..."
            placeholderTextColor={Colors.textMuted}
            value={searchQuery}
            onChangeText={setSearchQuery}
          />
          {searchQuery ? (
            <TouchableOpacity onPress={() => setSearchQuery('')}>
              <Ionicons name="close-circle" size={18} color={Colors.textMuted} />
            </TouchableOpacity>
          ) : null}
        </View>
      </View>

      {/* Category Pills */}
      <ScrollView horizontal showsHorizontalScrollIndicator={false} contentContainerStyle={styles.categoryScroll}>
        {CATEGORIES.map((cat) => (
          <TouchableOpacity
            key={cat}
            style={[styles.categoryChip, selectedCategory === cat && styles.categoryChipActive]}
            onPress={() => setSelectedCategory(cat)}
            activeOpacity={0.85}
          >
            <Text style={[styles.categoryText, selectedCategory === cat && styles.categoryTextActive]}>{cat}</Text>
          </TouchableOpacity>
        ))}
      </ScrollView>

      {/* News List */}
      <View style={styles.list}>
        {filteredNews.length === 0 ? (
          <View style={styles.emptyState}>
            <Ionicons name="newspaper-outline" size={48} color={Colors.textMuted} />
            <Text style={styles.emptyTitle}>No Articles Found</Text>
            <Text style={styles.emptySub}>Try searching for a different keyword or category.</Text>
          </View>
        ) : (
          filteredNews.map((item) => {
            const isOpen = expanded === item.id;
            return (
              <View key={item.id} style={styles.card}>
                <TouchableOpacity
                  activeOpacity={0.9}
                  onPress={() => setExpanded(isOpen ? null : item.id)}
                >
                  <View style={styles.imageWrap}>
                    <Image source={item.img} style={styles.image} resizeMode="cover" />
                    <View style={[styles.badge, { backgroundColor: item.badgeColor }]}>
                      <Text style={styles.badgeText}>{item.badge}</Text>
                    </View>
                  </View>
                  <View style={styles.body}>
                    <View style={styles.metaRow}>
                      <View style={styles.metaItem}>
                        <Ionicons name="calendar-outline" size={13} color={Colors.textSecondary} />
                        <Text style={styles.metaText}>{item.date}</Text>
                      </View>
                      <View style={styles.metaItem}>
                        <Ionicons name="time-outline" size={13} color={Colors.textSecondary} />
                        <Text style={styles.metaText}>{item.readTime}</Text>
                      </View>
                    </View>

                    <Text style={styles.title}>{item.title}</Text>

                    {isOpen ? (
                      <Text style={styles.content}>{item.body}</Text>
                    ) : null}

                    <View style={styles.cardFooter}>
                      <TouchableOpacity style={styles.readMore} onPress={() => setExpanded(isOpen ? null : item.id)}>
                        <Text style={styles.readMoreText}>{isOpen ? 'Show Less' : 'Read Article'}</Text>
                        <Ionicons name={isOpen ? 'chevron-up' : 'chevron-down'} size={14} color={Colors.secondary} />
                      </TouchableOpacity>
                      <TouchableOpacity style={styles.shareBtn} onPress={() => handleShare(item.title)}>
                        <Ionicons name="share-social-outline" size={16} color={Colors.secondary} />
                      </TouchableOpacity>
                    </View>
                  </View>
                </TouchableOpacity>
              </View>
            );
          })
        )}
      </View>

      <View style={{ height: Spacing.xl }} />
    </ScrollView>
  );
}

const styles = StyleSheet.create({
  container: { flex: 1, backgroundColor: Colors.surface },
  header: {
    backgroundColor: Colors.secondary,
    paddingTop: 56,
    paddingBottom: 20,
    paddingHorizontal: Spacing.lg,
    flexDirection: 'row',
    alignItems: 'center',
    gap: 12,
  },
  backBtn: {
    width: 38,
    height: 38,
    borderRadius: 19,
    alignItems: 'center',
    justifyContent: 'center',
    backgroundColor: 'rgba(255,255,255,0.15)',
  },
  headerTitleWrap: { flex: 1 },
  headerTitle: { fontSize: 22, fontWeight: '800', color: '#FFFFFF' },
  headerSub: { fontSize: 12, color: 'rgba(255,255,255,0.7)', marginTop: 1 },

  searchSection: { paddingHorizontal: Spacing.lg, paddingTop: Spacing.md },
  searchBar: {
    flexDirection: 'row',
    alignItems: 'center',
    gap: 10,
    backgroundColor: '#FFFFFF',
    borderRadius: BorderRadius.md,
    paddingHorizontal: 14,
    paddingVertical: 10,
    borderWidth: 1,
    borderColor: Colors.border,
    ...Shadows.sm,
  },
  searchInput: { flex: 1, fontSize: 14, color: Colors.text, padding: 0 },

  categoryScroll: { paddingHorizontal: Spacing.lg, paddingVertical: 12, gap: 8 },
  categoryChip: {
    paddingHorizontal: 16,
    paddingVertical: 8,
    borderRadius: 100,
    backgroundColor: '#FFFFFF',
    borderWidth: 1,
    borderColor: Colors.border,
  },
  categoryChipActive: { backgroundColor: Colors.secondary, borderColor: Colors.secondary },
  categoryText: { fontSize: 13, fontWeight: '600', color: Colors.textSecondary },
  categoryTextActive: { color: '#FFFFFF' },

  list: { paddingHorizontal: Spacing.lg, gap: Spacing.md },
  emptyState: { alignItems: 'center', justifyContent: 'center', paddingVertical: 40 },
  emptyTitle: { fontSize: 16, fontWeight: '700', color: Colors.text, marginTop: 12 },
  emptySub: { fontSize: 13, color: Colors.textSecondary, marginTop: 4 },

  card: {
    backgroundColor: '#FFFFFF',
    borderRadius: BorderRadius.lg,
    overflow: 'hidden',
    borderWidth: 1,
    borderColor: Colors.border,
    ...Shadows.md,
  },
  imageWrap: { height: 160, position: 'relative' },
  image: { width: '100%', height: '100%' },
  badge: {
    position: 'absolute',
    top: 12,
    right: 12,
    paddingHorizontal: 12,
    paddingVertical: 4,
    borderRadius: 100,
  },
  badgeText: { fontSize: 11, fontWeight: '800', color: '#FFFFFF' },
  body: { padding: Spacing.md },
  metaRow: { flexDirection: 'row', alignItems: 'center', gap: 14, marginBottom: 8 },
  metaItem: { flexDirection: 'row', alignItems: 'center', gap: 4 },
  metaText: { fontSize: 11, color: Colors.textSecondary, fontWeight: '500' },
  title: { fontSize: 16, fontWeight: '800', color: Colors.text, lineHeight: 22, marginBottom: 8 },
  content: { fontSize: 13, color: Colors.textSecondary, lineHeight: 20, marginBottom: 12 },
  cardFooter: { flexDirection: 'row', justifyContent: 'space-between', alignItems: 'center', borderTopWidth: 1, borderTopColor: Colors.borderLight, paddingTop: 10, marginTop: 4 },
  readMore: { flexDirection: 'row', alignItems: 'center', gap: 4 },
  readMoreText: { fontSize: 13, fontWeight: '700', color: Colors.secondary },
  shareBtn: { padding: 6 },
});
