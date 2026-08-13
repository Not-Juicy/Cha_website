import React, { useRef, useEffect } from 'react';
import { View, Text, StyleSheet, ScrollView, TouchableOpacity, Dimensions, ImageBackground, Image, Animated } from 'react-native';
import { useTranslation } from 'react-i18next';
import { LinearGradient } from 'expo-linear-gradient';
import { Ionicons } from '@expo/vector-icons';
import { Colors, Spacing, BorderRadius, Shadows, Glassmorphism } from '../../theme/colors';
import { useAuth } from '../../store/AuthContext';
import heroImg from '../../../assets/hero.jpg';
import newsEvent1 from '../../../assets/news-event-1.jpg';
import newsUpdate1 from '../../../assets/news-update-1.jpg';
import doctorTraining from '../../../assets/doctor-training.jpg';
import donateImg from '../../../assets/heart-hands.jpg';

const { width } = Dimensions.get('window');

export default function HomeScreen({ navigation }: any) {
  const { user } = useAuth();
  const { t } = useTranslation();

  const stats = [
    { value: '25', label: t('home.stats.provinces', 'Provinces'), icon: 'location' as const },
    { value: '500+', label: t('home.stats.patients', 'Patients'), icon: 'people' as const },
    { value: '15+', label: t('home.stats.partners', 'Partners'), icon: 'heart' as const },
  ];

  const helpItems = [
    { icon: 'people' as const, label: t('home.quickActions.about', 'About CHA'), desc: t('home.helpDesc.about', 'Our mission & leadership'), screen: 'About', color: Colors.secondary },
    { icon: 'water' as const, label: t('home.quickActions.haemophilia', 'Haemophilia'), desc: t('home.helpDesc.haemophilia', 'Types & symptoms'), screen: 'Haemophilia', color: Colors.primary },
    { icon: 'medical' as const, label: t('home.quickActions.programs', 'Programs'), desc: t('home.helpDesc.programs', 'Find partner clinics'), screen: 'Programs', color: Colors.purple },
    { icon: 'heart' as const, label: t('home.quickActions.donate', 'Donate'), desc: t('home.helpDesc.donate', 'Support bleeding care'), screen: 'Donate', color: Colors.success },
  ];

  const news = [
    { id: 1, img: newsEvent1, badge: 'Event', badgeColor: Colors.primary, date: 'Apr 17, 2025', title: 'World Haemophilia Day 2025 Community Event' },
    { id: 2, img: newsUpdate1, badge: 'Update', badgeColor: Colors.secondary, date: 'Apr 16, 2025', title: 'New Clinical Care & Treatment Guidelines' },
    { id: 3, img: doctorTraining, badge: 'Workshop', badgeColor: Colors.purple, date: 'Apr 12, 2025', title: 'Training Workshop for Healthcare Professionals' },
  ];

  const scrollY = useRef(new Animated.Value(0)).current;
  const scaleZoom = useRef(new Animated.Value(1.1)).current;
  const newsAnims = useRef(news.map(() => new Animated.Value(0))).current;

  useEffect(() => {
    Animated.timing(scaleZoom, { toValue: 1, duration: 1500, useNativeDriver: true }).start();
    Animated.stagger(150, newsAnims.map(a => Animated.spring(a, { toValue: 1, friction: 6, useNativeDriver: true }))).start();
  }, []);

  const parallaxTranslateY = scrollY.interpolate({
    inputRange: [-200, 0, 400],
    outputRange: [-100, 0, 150],
  });

  return (
    <Animated.ScrollView
      style={styles.container}
      showsVerticalScrollIndicator={false}
      onScroll={Animated.event([{ nativeEvent: { contentOffset: { y: scrollY } } }], { useNativeDriver: true })}
      scrollEventThrottle={16}
    >
      {/* Hero Section */}
      <Animated.View style={{ transform: [{ translateY: parallaxTranslateY }, { scale: scaleZoom }] }}>
        <ImageBackground source={heroImg} style={styles.hero} resizeMode="cover" imageStyle={{ marginLeft: -300, width: '200%' }}>
        <View style={styles.heroOverlay} />
        <View style={styles.heroContent}>
          <View style={[styles.tagBadge, Glassmorphism.heroBadge]}>
            <Ionicons name="shield-checkmark" size={13} color="#FFFFFF" />
            <Text style={styles.heroTag} numberOfLines={1}>{t('home.heroTag', 'Cambodian Haemophilia Association')}</Text>
          </View>
          <Text style={styles.heroTitleBlue}>{t('home.heroBlue', 'Together We Care.')}</Text>
          <Text style={styles.heroTitleRed}>{t('home.heroRed', 'Together We Change Lives.')}</Text>
          <Text style={styles.heroLead}>
            {t('home.heroLead', 'Supporting and empowering people with bleeding disorders across Cambodia.')}
          </Text>
          <View style={styles.heroButtons}>
            <TouchableOpacity style={styles.btnPrimary} onPress={() => navigation.navigate('Haemophilia')} activeOpacity={0.85}>
              <Text style={styles.btnPrimaryText}>{t('home.getSupport', 'Get Support')}</Text>
              <Ionicons name="arrow-forward" size={16} color="#FFFFFF" />
            </TouchableOpacity>
            <TouchableOpacity
              style={styles.btnOutline}
              onPress={() => navigation.navigate(user ? 'Account' : 'Auth', user ? undefined : { mode: 'register' })}
              activeOpacity={0.85}
            >
              <Text style={styles.btnOutlineText}>{user ? t('home.myDashboard', 'My Dashboard') : t('home.becomeMember', 'Become Member')}</Text>
            </TouchableOpacity>
          </View>
        </View>
        <View style={styles.waveContainer}>
          <View style={styles.waveShape} />
        </View>
        </ImageBackground>
      </Animated.View>

      <View style={{ backgroundColor: Colors.surface, flex: 1 }}>
      {/* Stats Strip */}
      <View style={styles.statsStrip}>
        {stats.map((stat, i) => (
          <React.Fragment key={i}>
            {i > 0 && <View style={styles.statDivider} />}
            <View style={styles.statItem}>
              <View style={styles.statIconWrap}>
                <Ionicons name={stat.icon} size={18} color={Colors.secondary} />
              </View>
              <Text style={styles.statValue}>{stat.value}</Text>
              <Text style={styles.statLabel}>{stat.label}</Text>
            </View>
          </React.Fragment>
        ))}
      </View>

      {/* Quick Access Services */}
      <View style={styles.section}>
        <View style={styles.sectionHeader}>
          <View style={styles.sectionTitleRow}>
            <View style={styles.redBar} />
            <Text style={styles.sectionTitle}>{t('home.howWeHelp', 'How We Help')}</Text>
          </View>
          <Text style={styles.sectionSubtitle}>
            {t('home.howWeHelpSub', 'Four core areas where CHA makes a difference for patients and families across Cambodia.')}
          </Text>
        </View>
        <View style={styles.helpGrid}>
          {helpItems.map((item, index) => (
            <TouchableOpacity
              key={index}
              style={[styles.helpCard, { borderColor: item.color + '20' }]}
              onPress={() => navigation.navigate(item.screen)}
              activeOpacity={0.85}
            >
              <View style={[styles.helpIconWrap, { backgroundColor: item.color + '15' }]}>
                <Ionicons name={item.icon} size={24} color={item.color} />
              </View>
              <Text style={styles.helpLabel}>{item.label}</Text>
              <Text style={styles.helpDesc}>{item.desc}</Text>
              <View style={[styles.helpLinkPill, { backgroundColor: item.color + '10' }]}>
                <Text style={[styles.helpLinkText, { color: item.color }]}>{t('home.explore', 'Explore')}</Text>
                <Ionicons name="arrow-forward" size={12} color={item.color} />
              </View>
            </TouchableOpacity>
          ))}
        </View>
      </View>

      {/* Mission & Vision - Unified Dark Card */}
      <View style={styles.whoSection}>
        <View style={styles.whoCard}>
          <View style={styles.whoHeaderRow}>
            <Text style={styles.whoTitleCard}>{t('home.whoIs', 'Who is CHA?')}</Text>
          </View>
          <Text style={styles.whoDescCard}>
            {t('home.whoDesc', 'The Cambodian Haemophilia Association is a patient-led organization dedicated to improving the quality of life for people living with bleeding disorders across Cambodia.')}
          </Text>
          
          <View style={styles.whoDivider} />
          
          <View style={styles.vmList}>
            <View style={styles.vmListItem}>
              <View style={styles.vmListIconWrap}>
                <Ionicons name="eye" size={18} color="#FFFFFF" />
              </View>
              <View style={styles.vmListContent}>
                <Text style={styles.vmListLabel}>{t('home.ourVision', 'OUR VISION')}</Text>
                <Text style={styles.vmListText}>{t('home.visionText', 'A Cambodia where every person with a bleeding disorder has access to diagnosis, treatment, and support.')}</Text>
              </View>
            </View>

            <View style={styles.vmListItem}>
              <View style={styles.vmListIconWrap}>
                <Ionicons name="flag" size={18} color="#FFFFFF" />
              </View>
              <View style={styles.vmListContent}>
                <Text style={styles.vmListLabel}>{t('home.ourMission', 'OUR MISSION')}</Text>
                <Text style={styles.vmListText}>{t('home.missionText', 'To advocate for quality care, educate communities, support families, and empower caregivers.')}</Text>
              </View>
            </View>
          </View>
        </View>
      </View>

      {/* Latest News Horizontal Scroll */}
      <View style={styles.newsSection}>
        <View style={styles.newsHeader}>
          <View style={styles.newsHeaderLeft}>
            <View style={styles.sectionTitleRow}>
              <View style={styles.redBar} />
              <Text style={styles.sectionTitle}>{t('home.news', 'Latest News & Events')}</Text>
            </View>
            <Text style={styles.sectionSubtitle}>
              {t('home.newsSub', 'Community events, treatment guidelines, and training workshops.')}
            </Text>
          </View>
          <TouchableOpacity style={styles.viewAllBtn} onPress={() => navigation.navigate('News')} activeOpacity={0.85}>
            <Text style={styles.viewAllText}>{t('home.viewAll', 'View All')}</Text>
            <Ionicons name="arrow-forward" size={12} color={Colors.secondary} />
          </TouchableOpacity>
        </View>
        <ScrollView
          horizontal
          showsHorizontalScrollIndicator={false}
          contentContainerStyle={styles.newsScrollContent}
          snapToInterval={width * 0.8 + 14}
          decelerationRate="fast"
        >
          {news.map((item, index) => {
            const opacity = newsAnims[index];
            const translateY = newsAnims[index].interpolate({ inputRange: [0, 1], outputRange: [50, 0] });
            
            return (
            <Animated.View key={item.id} style={{ opacity, transform: [{ translateY }] }}>
              <TouchableOpacity style={styles.newsCardOverlay} activeOpacity={0.85} onPress={() => navigation.navigate('News')}>
              <ImageBackground source={item.img} style={styles.newsBgImage} imageStyle={styles.newsBgImageStyle}>
                
                <View style={[styles.newsBadgeAbsolute, { backgroundColor: item.badgeColor }]}>
                  <Text style={styles.newsBadgeTextAbsolute}>{item.badge}</Text>
                </View>

                <LinearGradient
                  colors={['transparent', 'rgba(0,0,0,0.85)']}
                  style={styles.newsGradient}
                >
                  <Text style={styles.newsTitleOverlay} numberOfLines={2}>{item.title}</Text>
                  <View style={styles.newsMetaOverlayRow}>
                    <View style={styles.newsMetaOverlay}>
                      <Ionicons name="time-outline" size={12} color="rgba(255,255,255,0.8)" />
                      <Text style={styles.newsDateOverlay}>{item.date}</Text>
                    </View>
                    <View style={styles.newsReadMoreBtnOverlay}>
                      <Text style={styles.newsReadMoreTextOverlay}>{t('home.readMore', 'Read')}</Text>
                      <Ionicons name="arrow-forward" size={12} color="#FFFFFF" />
                    </View>
                  </View>
                </LinearGradient>
              </ImageBackground>
              </TouchableOpacity>
            </Animated.View>
            );
          })}
        </ScrollView>
      </View>

      {/* CTA Banner */}
      <View style={styles.ctaWrap}>
        <TouchableOpacity style={styles.ctaBannerWrapper} activeOpacity={0.85} onPress={() => navigation.navigate('Donate')}>
          <ImageBackground source={donateImg} style={styles.ctaBgImage} imageStyle={styles.ctaBgImageStyle}>
            <LinearGradient
              colors={['rgba(227, 30, 36, 0.85)', 'rgba(153, 27, 27, 0.95)']}
              style={styles.ctaGradientOverlay}
            >
              <View style={styles.ctaIconWrap}>
                <Ionicons name="heart" size={32} color="#E31E24" />
              </View>
              <Text style={styles.ctaTitle}>{t('home.donate.title', 'Help Change Lives')}</Text>
              <Text style={styles.ctaText}>
                {t('home.donate.ctaText', 'Your donation helps us provide treatment, education and hope to people with bleeding disorders in Cambodia.')}
              </Text>
              <View style={styles.ctaBtnCentered}>
                <Text style={styles.ctaBtnText}>{t('home.donate.button', 'Donate Now')}</Text>
                <Ionicons name="arrow-forward" size={16} color="#E31E24" />
              </View>
            </LinearGradient>
          </ImageBackground>
        </TouchableOpacity>
      </View>

      <View style={{ height: Spacing.xl }} />
      </View>
    </Animated.ScrollView>
  );
}

const styles = StyleSheet.create({
  container: { flex: 1, backgroundColor: Colors.surface },

  hero: { width: '100%', height: 540 },
  heroOverlay: { ...StyleSheet.absoluteFillObject, backgroundColor: 'rgba(11, 29, 109, 0.78)' },
  heroContent: { flex: 1, justifyContent: 'center', paddingHorizontal: 22, paddingTop: 64, paddingBottom: 48 },
  tagBadge: {
    flexDirection: 'row',
    alignItems: 'center',
    gap: 8,
    paddingHorizontal: 14,
    paddingVertical: 7,
    borderRadius: 100,
    alignSelf: 'flex-start',
    marginBottom: 14,
  },
  heroTag: { fontSize: 11, fontWeight: '700', color: '#FFFFFF', letterSpacing: 0.5 },
  heroTitleBlue: { fontSize: 28, fontWeight: '800', color: '#FFFFFF', lineHeight: 44, paddingTop: 4, flexWrap: 'wrap' },
  heroTitleRed: { fontSize: 28, fontWeight: '800', color: '#FF4D4D', lineHeight: 44, paddingTop: 4, marginBottom: 12, flexWrap: 'wrap' },
  heroLead: { fontSize: 13, color: 'rgba(255,255,255,0.92)', lineHeight: 22, paddingTop: 2, marginBottom: 24, maxWidth: 320 },
  heroButtons: { flexDirection: 'row', gap: 12, flexWrap: 'wrap' },
  btnPrimary: {
    backgroundColor: '#E31E24',
    flexDirection: 'row',
    alignItems: 'center',
    paddingHorizontal: 22,
    paddingVertical: 14,
    borderRadius: 100,
    gap: 8,
    shadowColor: '#E31E24',
    shadowOffset: { width: 0, height: 6 },
    shadowOpacity: 0.35,
    shadowRadius: 12,
    elevation: 6,
  },
  btnPrimaryText: { color: '#FFFFFF', fontSize: 14, fontWeight: '800', paddingTop: 2 },
  btnOutline: {
    backgroundColor: 'rgba(255, 255, 255, 0.12)',
    borderWidth: 1,
    borderColor: 'rgba(255, 255, 255, 0.35)',
    paddingHorizontal: 20,
    paddingVertical: 14,
    borderRadius: 100,
  },
  btnOutlineText: { color: '#FFFFFF', fontSize: 14, fontWeight: '700', paddingTop: 2 },
  waveContainer: { position: 'absolute', bottom: 0, left: 0, right: 0, height: 36, overflow: 'hidden' },
  waveShape: { position: 'absolute', bottom: -1, left: -10, right: -10, height: 46, backgroundColor: Colors.surface, borderTopLeftRadius: 36, borderTopRightRadius: 36 },

  statsStrip: {
    flexDirection: 'row',
    backgroundColor: '#FFFFFF',
    marginHorizontal: 20,
    marginTop: -70, 
    borderRadius: 24,
    paddingVertical: 22,
    paddingHorizontal: 12,
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 16 },
    shadowOpacity: 0.12,
    shadowRadius: 24,
    elevation: 10,
    alignItems: 'center',
    borderWidth: 1,
    borderColor: 'rgba(0,0,0,0.04)',
  },
  statItem: { flex: 1, alignItems: 'center' },
  statIconWrap: { width: 48, height: 48, borderRadius: 24, backgroundColor: '#F8FAFC', alignItems: 'center', justifyContent: 'center', marginBottom: 8 },
  statValue: { fontSize: 22, fontWeight: '900', color: Colors.secondary, marginBottom: 2, paddingTop: 2 },
  statLabel: { fontSize: 11, color: Colors.textSecondary, fontWeight: '700', textAlign: 'center', letterSpacing: 0.5, paddingTop: 2 },
  statDivider: { width: 1, height: 50, backgroundColor: 'rgba(0,0,0,0.06)' },

  section: { paddingHorizontal: 20, paddingTop: 24 },
  sectionHeader: { marginBottom: 16 },
  sectionTitleRow: { flexDirection: 'row', alignItems: 'center', gap: 8, marginBottom: 4 },
  redBar: { width: 4, height: 22, borderRadius: 2, backgroundColor: Colors.primary },
  sectionTitle: { fontSize: 20, fontWeight: '800', color: Colors.secondary, lineHeight: 32, paddingTop: 4 },
  sectionSubtitle: { fontSize: 13, color: Colors.textSecondary, lineHeight: 22, marginLeft: 12, paddingTop: 2 },

  helpGrid: { flexDirection: 'row', flexWrap: 'wrap', justifyContent: 'space-between' },
  helpCard: {
    width: (width - 40 - 16) / 2,
    backgroundColor: '#FFFFFF',
    borderRadius: 24,
    padding: 16,
    marginBottom: 16,
    borderWidth: 1.5,
    justifyContent: 'flex-start',
    ...Shadows.md,
  },
  helpIconWrap: { width: 48, height: 48, borderRadius: 24, alignItems: 'center', justifyContent: 'center', marginBottom: 12 },
  helpLabel: { fontSize: 15, fontWeight: '800', color: Colors.text, marginBottom: 4, lineHeight: 22, paddingTop: 2 },
  helpDesc: { fontSize: 12, color: Colors.textSecondary, marginBottom: 16, lineHeight: 19, flex: 1, paddingTop: 2 },
  helpLinkPill: { flexDirection: 'row', alignItems: 'center', gap: 4, paddingHorizontal: 12, paddingVertical: 6, borderRadius: 100, alignSelf: 'flex-start' },
  helpLinkText: { fontSize: 12, fontWeight: '800', paddingTop: 2 },

  whoSection: { paddingHorizontal: 20, paddingTop: 24 },
  whoCard: { backgroundColor: '#0F1E54', borderRadius: 24, padding: 22, ...Shadows.lg },
  whoHeaderRow: { flexDirection: 'row', alignItems: 'center', marginBottom: 12 },
  whoTitleCard: { fontSize: 20, fontWeight: '800', color: '#FFFFFF', paddingTop: 4 },
  whoDescCard: { fontSize: 13, color: 'rgba(255,255,255,0.85)', lineHeight: 22, marginBottom: 20, paddingTop: 2 },
  whoDivider: { height: 1, backgroundColor: 'rgba(255,255,255,0.15)', marginBottom: 20 },
  vmList: { gap: 16 },
  vmListItem: { flexDirection: 'row', alignItems: 'flex-start', gap: 14 },
  vmListIconWrap: { width: 36, height: 36, borderRadius: 18, backgroundColor: 'rgba(255,255,255,0.15)', alignItems: 'center', justifyContent: 'center', borderWidth: 1, borderColor: 'rgba(255,255,255,0.2)' },
  vmListContent: { flex: 1 },
  vmListLabel: { fontSize: 12, fontWeight: '800', color: '#FFFFFF', letterSpacing: 0.5, marginBottom: 4, paddingTop: 2 },
  vmListText: { fontSize: 12, color: 'rgba(255,255,255,0.75)', lineHeight: 20, paddingTop: 2 },

  newsSection: { paddingTop: 24 },
  newsHeader: { flexDirection: 'row', justifyContent: 'space-between', alignItems: 'flex-start', paddingHorizontal: 20, marginBottom: 16 },
  newsHeaderLeft: { flex: 1, marginRight: 12 },
  viewAllBtn: { flexDirection: 'row', alignItems: 'center', gap: 4, backgroundColor: '#EAF0FB', paddingHorizontal: 14, paddingVertical: 8, borderRadius: 100, borderWidth: 1, borderColor: '#BFDBFE' },
  viewAllText: { fontSize: 12, fontWeight: '700', color: Colors.secondary, paddingTop: 2 },
  newsScrollContent: { paddingLeft: 20, paddingRight: 12, gap: 14 },
  newsCardOverlay: { width: width * 0.78, height: 260, borderRadius: 24, overflow: 'hidden', ...Shadows.md },
  newsBgImage: { width: '100%', height: '100%', justifyContent: 'flex-end' },
  newsBgImageStyle: { borderRadius: 24 },
  newsBadgeAbsolute: { position: 'absolute', top: 16, left: 16, paddingHorizontal: 12, paddingVertical: 5, borderRadius: 100, borderWidth: 1, borderColor: 'rgba(255,255,255,0.3)', shadowColor: '#000', shadowOffset: { width: 0, height: 4 }, shadowOpacity: 0.4, shadowRadius: 6, elevation: 4 },
  newsBadgeTextAbsolute: { fontSize: 10, fontWeight: '800', color: '#FFFFFF', letterSpacing: 0.5 },
  newsGradient: { padding: 18, paddingTop: 60, borderBottomLeftRadius: 24, borderBottomRightRadius: 24 },
  newsTitleOverlay: { fontSize: 16, fontWeight: '800', color: '#FFFFFF', lineHeight: 24, marginBottom: 12 },
  newsMetaOverlayRow: { flexDirection: 'row', alignItems: 'center', justifyContent: 'space-between' },
  newsMetaOverlay: { flexDirection: 'row', alignItems: 'center', gap: 6 },
  newsDateOverlay: { fontSize: 11, color: 'rgba(255,255,255,0.8)', fontWeight: '600' },
  newsReadMoreBtnOverlay: { flexDirection: 'row', alignItems: 'center', gap: 4, backgroundColor: 'rgba(255,255,255,0.15)', paddingHorizontal: 12, paddingVertical: 6, borderRadius: 100, borderWidth: 1, borderColor: 'rgba(255,255,255,0.2)' },
  newsReadMoreTextOverlay: { fontSize: 11, fontWeight: '800', color: '#FFFFFF', paddingTop: 2 },

  ctaWrap: { paddingHorizontal: 20, paddingTop: 24, paddingBottom: 24 },
  ctaBannerWrapper: { borderRadius: 24, overflow: 'hidden', ...Shadows.lg },
  ctaBgImage: { width: '100%', alignItems: 'center' },
  ctaBgImageStyle: { borderRadius: 24 },
  ctaGradientOverlay: { width: '100%', padding: 32, alignItems: 'center', justifyContent: 'center' },
  ctaIconWrap: { width: 64, height: 64, borderRadius: 32, backgroundColor: '#FFFFFF', alignItems: 'center', justifyContent: 'center', marginBottom: 16, shadowColor: '#000', shadowOffset: { width: 0, height: 4 }, shadowOpacity: 0.15, shadowRadius: 8, elevation: 5 },
  ctaTitle: { fontSize: 24, fontWeight: '900', color: '#FFFFFF', marginBottom: 8, textAlign: 'center', paddingTop: 4 },
  ctaText: { fontSize: 13, color: 'rgba(255, 255, 255, 0.95)', lineHeight: 22, textAlign: 'center', marginBottom: 26, paddingHorizontal: 10, paddingTop: 2 },
  ctaBtnCentered: { backgroundColor: '#FFFFFF', flexDirection: 'row', alignItems: 'center', justifyContent: 'center', paddingHorizontal: 24, paddingVertical: 14, borderRadius: 100, gap: 6, shadowColor: '#000', shadowOffset: { width: 0, height: 4 }, shadowOpacity: 0.15, shadowRadius: 8, elevation: 5 },
  ctaBtnText: { fontSize: 16, fontWeight: '900', color: '#E31E24', paddingTop: 2 },
});
