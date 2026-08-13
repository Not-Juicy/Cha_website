import React, { useState, useRef, useEffect } from 'react';
import { View, Text, StyleSheet, ScrollView, TouchableOpacity, Dimensions, ImageBackground, Animated, LayoutAnimation, UIManager, Platform } from 'react-native';

if (Platform.OS === 'android') {
  if (UIManager.setLayoutAnimationEnabledExperimental) {
    UIManager.setLayoutAnimationEnabledExperimental(true);
  }
}
import { Ionicons } from '@expo/vector-icons';
import { useTranslation } from 'react-i18next';
import { LinearGradient } from 'expo-linear-gradient';
import { Colors, Spacing, BorderRadius, Shadows, Glassmorphism } from '../../theme/colors';
import heroImg from '../../../assets/haemophilia-hero.jpg';

const { width } = Dimensions.get('window');

export default function HaemophiliaScreen({ navigation }: any) {
  const { t } = useTranslation();
  const [expandedCard, setExpandedCard] = useState<number | null>(1);
  const [expandedFaq, setExpandedFaq] = useState<number | null>(null);

  const conditions = [
    {
      id: 1,
      title: t('haemophilia.conditions.typeA.title', 'Haemophilia A'),
      subtitle: t('haemophilia.conditions.typeA.subtitle', 'Factor VIII Deficiency'),
      icon: 'water' as const,
      color: Colors.secondary,
      severity: t('haemophilia.conditions.typeA.severity', 'Severe to Mild'),
      description: t('haemophilia.conditions.typeA.desc', 'The most common type of hemophilia, caused by insufficient clotting Factor VIII.'),
      prevalence: t('haemophilia.conditions.typeA.prev', '1 in 5,000 live male births'),
    },
    {
      id: 2,
      title: t('haemophilia.conditions.typeB.title', 'Haemophilia B'),
      subtitle: t('haemophilia.conditions.typeB.subtitle', 'Factor IX Deficiency (Christmas Disease)'),
      icon: 'water' as const,
      color: Colors.primary,
      severity: t('haemophilia.conditions.typeB.severity', 'Moderate to Severe'),
      description: t('haemophilia.conditions.typeB.desc', 'Caused by a deficiency of clotting Factor IX. Symptoms mirror Haemophilia A.'),
      prevalence: t('haemophilia.conditions.typeB.prev', '1 in 25,000 live male births'),
    },
    {
      id: 3,
      title: t('haemophilia.conditions.vwd.title', 'Von Willebrand Disease (VWD)'),
      subtitle: t('haemophilia.conditions.vwd.subtitle', 'VWD Deficiency'),
      icon: 'pulse' as const,
      color: Colors.purple,
      severity: t('haemophilia.conditions.vwd.severity', 'Variable (Type 1-3)'),
      description: t('haemophilia.conditions.vwd.desc', 'The most frequent inherited bleeding condition globally.'),
      prevalence: t('haemophilia.conditions.vwd.prev', '1 in 100 individuals'),
    },
    {
      id: 4,
      title: t('haemophilia.conditions.rare.title', 'Rare Clotting Deficiencies'),
      subtitle: t('haemophilia.conditions.rare.subtitle', 'Factors II, V, VII, X, XI, XIII'),
      icon: 'medkit' as const,
      color: Colors.success,
      severity: t('haemophilia.conditions.rare.severity', 'Rare Spectrum'),
      description: t('haemophilia.conditions.rare.desc', 'Rare plasma protein deficiencies that disrupt normal coagulation cascades.'),
      prevalence: t('haemophilia.conditions.rare.prev', '1 in 500,000+'),
    },
  ];

  const faqs = [
    { id: 1, q: t('haemophilia.faqs.q1', 'What is Haemophilia?'), a: t('haemophilia.faqs.a1', 'Haemophilia is a hereditary genetic condition...') },
    { id: 2, q: t('haemophilia.faqs.q2', 'How is it treated in Cambodia?'), a: t('haemophilia.faqs.a2', 'Treatment relies on factor concentrate replacement therapy...') },
    { id: 3, q: t('haemophilia.faqs.q3', 'Is there a permanent cure?'), a: t('haemophilia.faqs.a3', 'While standard treatment manages symptoms effectively...') },
    { id: 4, q: t('haemophilia.faqs.q4', 'Can patients lead active lives?'), a: t('haemophilia.faqs.a4', 'Yes! With early diagnosis, routine prophylaxis...') },
  ];

  const scrollY = useRef(new Animated.Value(0)).current;
  const scaleZoom = useRef(new Animated.Value(1.1)).current;
  const listAnimValues = useRef(conditions.map(() => new Animated.Value(0))).current;

  useEffect(() => {
    Animated.timing(scaleZoom, { toValue: 1, duration: 1500, useNativeDriver: true }).start();
    Animated.stagger(150, listAnimValues.map(a => Animated.spring(a, { toValue: 1, friction: 6, useNativeDriver: true }))).start();
  }, []);

  const parallaxTranslateY = scrollY.interpolate({
    inputRange: [-200, 0, 400],
    outputRange: [-100, 0, 150],
  });

  const handleToggleCard = (id: number) => {
    LayoutAnimation.configureNext(LayoutAnimation.Presets.easeInEaseOut);
    setExpandedCard(expandedCard === id ? null : id);
  };

  const handleToggleFaq = (id: number) => {
    LayoutAnimation.configureNext(LayoutAnimation.Presets.easeInEaseOut);
    setExpandedFaq(expandedFaq === id ? null : id);
  };

  return (
    <Animated.ScrollView
      style={styles.container}
      showsVerticalScrollIndicator={false}
      onScroll={Animated.event([{ nativeEvent: { contentOffset: { y: scrollY } } }], { useNativeDriver: true })}
      scrollEventThrottle={16}
    >
      {/* Hero Header */}
      <Animated.View style={{ transform: [{ translateY: parallaxTranslateY }, { scale: scaleZoom }] }}>
        <ImageBackground source={heroImg} style={styles.heroBg} resizeMode="cover">
        <LinearGradient
          colors={['rgba(15,30,84,0.7)', 'rgba(15,30,84,0.98)']}
          style={styles.heroGradient}
        >
          <View style={[styles.heroIconWrap, Glassmorphism.heroBadge]}>
            <Ionicons name="water" size={32} color="#FFFFFF" />
          </View>
          <Text style={styles.heroTitle}>{t('haemophilia.title', 'Understanding Bleeding Disorders')}</Text>
          <Text style={styles.heroLead}>
            {t('haemophilia.lead', 'Key information on symptoms, types of clotting factor deficiencies, emergency care, and treatment guidance.')}
          </Text>
        </LinearGradient>
        </ImageBackground>
      </Animated.View>

      <View style={{ backgroundColor: Colors.surface, flex: 1 }}>
      {/* Quick Stats Strip */}
      <View style={styles.statsStrip}>
        <View style={styles.statItem}>
          <Ionicons name="people" size={18} color={Colors.secondary} />
          <Text style={styles.statValue}>500+</Text>
          <Text style={styles.statLabel}>{t('haemophilia.stats.patients', 'Registered Patients')}</Text>
        </View>
        <View style={styles.statDivider} />
        <View style={styles.statItem}>
          <Ionicons name="water" size={18} color={Colors.primary} />
          <Text style={styles.statValue}>3</Text>
          <Text style={styles.statLabel}>{t('haemophilia.stats.types', 'Primary Types')}</Text>
        </View>
        <View style={styles.statDivider} />
        <View style={styles.statItem}>
          <Ionicons name="medical" size={18} color={Colors.purple} />
          <Text style={styles.statValue}>25</Text>
          <Text style={styles.statLabel}>{t('haemophilia.stats.provinces', 'Provinces Served')}</Text>
        </View>
      </View>

      {/* Conditions Accordion */}
      <View style={styles.section}>
        <Text style={styles.sectionTitle}>{t('haemophilia.typesTitle', 'Types of Bleeding Disorders')}</Text>
        {conditions.map((item, index) => {
          const isOpen = expandedCard === item.id;
          const opacity = listAnimValues[index];
          const translateY = listAnimValues[index].interpolate({ inputRange: [0, 1], outputRange: [50, 0] });
          return (
            <Animated.View key={item.id} style={{ opacity, transform: [{ translateY }] }}>
              <TouchableOpacity
                style={[styles.conditionCard, isOpen && styles.conditionCardActive]}
                onPress={() => handleToggleCard(item.id)}
                activeOpacity={0.85}
              >
              <View style={styles.conditionHeader}>
                <View style={[styles.conditionIcon, { backgroundColor: item.color + '15' }]}>
                  <Ionicons name={item.icon} size={24} color={item.color} />
                </View>
                <View style={styles.conditionInfo}>
                  <Text style={styles.conditionTitle}>{item.title}</Text>
                  <Text style={styles.conditionSubtitle}>{item.subtitle}</Text>
                </View>
                <Ionicons name={isOpen ? 'chevron-up' : 'chevron-down'} size={18} color={Colors.textSecondary} />
              </View>

              {isOpen && (
                <View style={styles.conditionExpanded}>
                  <View style={[styles.severityBadge, { backgroundColor: item.color + '15' }]}>
                    <Ionicons name="shield-checkmark" size={12} color={item.color} />
                    <Text style={[styles.severityText, { color: item.color }]}>{item.severity}</Text>
                  </View>
                  <Text style={styles.conditionDesc}>{item.description}</Text>
                  <View style={styles.prevalenceRow}>
                    <Ionicons name="information-circle" size={14} color={Colors.textSecondary} />
                    <Text style={styles.prevalenceText}>{t('haemophilia.prevalenceLabel', 'Prevalence:')} {item.prevalence}</Text>
                  </View>
                </View>
              )}
            </TouchableOpacity>
          </Animated.View>
          );
        })}
      </View>

      {/* Warning Alert Box */}
      <View style={styles.warningSection}>
        <LinearGradient
          colors={['#E31E24', '#991B1B']}
          start={{ x: 0, y: 0 }}
          end={{ x: 1, y: 1 }}
          style={styles.warningCard}
        >
          <View style={styles.warningIcon}>
            <Ionicons name="alert-circle" size={28} color="#E31E24" />
          </View>
          <View style={styles.warningContent}>
            <Text style={styles.warningTitle}>{t('haemophilia.warningTitle', 'Emergency Care Warning')}</Text>
            <Text style={styles.warningText}>
              {t('haemophilia.warningText', 'Head trauma, severe abdominal pain, or acute joint swelling require immediate hospital treatment and factor concentrate replacement.')}
            </Text>
          </View>
        </LinearGradient>
      </View>

      {/* FAQs Section */}
      <View style={styles.section}>
        <Text style={styles.sectionTitle}>{t('haemophilia.faqTitle', 'Frequently Asked Questions')}</Text>
        {faqs.map((faq) => {
          const isOpen = expandedFaq === faq.id;
          return (
            <TouchableOpacity
              key={faq.id}
              style={styles.faqItem}
              onPress={() => handleToggleFaq(faq.id)}
              activeOpacity={0.85}
            >
              <View style={styles.faqHeader}>
                <View style={styles.faqIconWrap}>
                  <Ionicons name="help-circle" size={20} color={Colors.primary} />
                </View>
                <Text style={styles.faqQuestion}>{faq.q}</Text>
                <Ionicons name={isOpen ? 'chevron-up' : 'chevron-down'} size={18} color={Colors.textSecondary} />
              </View>
              {isOpen && <Text style={styles.faqAnswer}>{faq.a}</Text>}
            </TouchableOpacity>
          );
        })}
      </View>

      <View style={{ height: Spacing.xl }} />
      </View>
    </Animated.ScrollView>
  );
}

const styles = StyleSheet.create({
  container: { flex: 1, backgroundColor: Colors.surface },

  heroBg: { width: '100%' },
  heroGradient: {
    paddingTop: 64,
    paddingBottom: 64,
    paddingHorizontal: Spacing.lg,
    alignItems: 'center',
    justifyContent: 'center',
  },
  heroIconWrap: {
    width: 64,
    height: 64,
    borderRadius: 32,
    alignItems: 'center',
    justifyContent: 'center',
    marginBottom: Spacing.md,
    borderWidth: 1,
    borderColor: 'rgba(255,255,255,0.3)',
  },
  heroTitle: { fontSize: 26, fontWeight: '900', color: '#FFFFFF', textAlign: 'center', lineHeight: 38, paddingTop: 4, marginBottom: 8 },
  heroLead: { fontSize: 14, color: 'rgba(255,255,255,0.9)', lineHeight: 24, paddingTop: 2, textAlign: 'center', maxWidth: '95%' },

  statsStrip: {
    flexDirection: 'row',
    backgroundColor: '#FFFFFF',
    marginHorizontal: Spacing.lg,
    marginTop: -30,
    borderRadius: 24,
    paddingVertical: 18,
    paddingHorizontal: 8,
    ...Shadows.lg,
    alignItems: 'center',
    borderWidth: 1,
    borderColor: 'rgba(0,0,0,0.04)',
  },
  statItem: { flex: 1, alignItems: 'center', gap: 4 },
  statValue: { fontSize: 22, fontWeight: '900', color: Colors.secondary, paddingTop: 2 },
  statLabel: { fontSize: 11, color: Colors.textSecondary, fontWeight: '600', textAlign: 'center', lineHeight: 16, paddingTop: 2 },
  statDivider: { width: 1, height: 40, backgroundColor: 'rgba(0,0,0,0.06)' },

  section: { paddingHorizontal: Spacing.lg, paddingTop: 36 },
  sectionTitle: { fontSize: 22, fontWeight: '900', color: Colors.secondary, marginBottom: 20, lineHeight: 32, paddingTop: 4 },

  conditionCard: {
    backgroundColor: '#FFFFFF',
    borderRadius: 24,
    borderWidth: 1,
    borderColor: 'rgba(0,0,0,0.04)',
    padding: 20,
    marginBottom: 16,
    ...Shadows.md,
  },
  conditionCardActive: { borderColor: Colors.secondary, borderWidth: 1.5, ...Shadows.lg },
  conditionHeader: { flexDirection: 'row', alignItems: 'center' },
  conditionIcon: { width: 56, height: 56, borderRadius: 28, alignItems: 'center', justifyContent: 'center', marginRight: 16 },
  conditionInfo: { flex: 1 },
  conditionTitle: { fontSize: 17, fontWeight: '800', color: Colors.text, lineHeight: 24, paddingTop: 2 },
  conditionSubtitle: { fontSize: 13, color: Colors.textSecondary, lineHeight: 20, paddingTop: 2 },

  conditionExpanded: { marginTop: 20, paddingTop: 16, borderTopWidth: 1, borderTopColor: 'rgba(0,0,0,0.06)' },
  severityBadge: { flexDirection: 'row', alignItems: 'center', gap: 6, alignSelf: 'flex-start', paddingHorizontal: 12, paddingVertical: 6, borderRadius: 100, marginBottom: 12 },
  severityText: { fontSize: 12, fontWeight: '800', paddingTop: 2 },
  conditionDesc: { fontSize: 14, color: Colors.textSecondary, lineHeight: 24, paddingTop: 2, marginBottom: 12 },
  prevalenceRow: { flexDirection: 'row', alignItems: 'center', gap: 6 },
  prevalenceText: { fontSize: 12, fontWeight: '600', color: Colors.textMuted, paddingTop: 2 },

  warningSection: { paddingHorizontal: Spacing.lg, paddingTop: 36 },
  warningCard: { flexDirection: 'row', borderRadius: 24, padding: 24, gap: 16, ...Shadows.lg },
  warningIcon: { width: 48, height: 48, borderRadius: 24, backgroundColor: '#FFFFFF', alignItems: 'center', justifyContent: 'center' },
  warningContent: { flex: 1 },
  warningTitle: { fontSize: 17, fontWeight: '900', color: '#FFFFFF', marginBottom: 4, lineHeight: 24, paddingTop: 2 },
  warningText: { fontSize: 13, color: 'rgba(255,255,255,0.95)', lineHeight: 22, paddingTop: 2 },

  faqItem: {
    backgroundColor: '#FFFFFF',
    borderRadius: 20,
    padding: 20,
    marginBottom: 12,
    borderWidth: 1,
    borderColor: 'rgba(0,0,0,0.04)',
    ...Shadows.md,
  },
  faqHeader: { flexDirection: 'row', alignItems: 'center', justifyContent: 'space-between' },
  faqIconWrap: { width: 36, height: 36, borderRadius: 18, backgroundColor: '#FEE2E2', alignItems: 'center', justifyContent: 'center', marginRight: 12 },
  faqQuestion: { flex: 1, fontSize: 15, fontWeight: '800', color: Colors.text, marginRight: 12, lineHeight: 24, paddingTop: 2 },
  faqAnswer: { fontSize: 14, color: Colors.textSecondary, lineHeight: 24, paddingTop: 16, marginTop: 16, borderTopWidth: 1, borderTopColor: 'rgba(0,0,0,0.05)' },
});
