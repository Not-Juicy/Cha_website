import React, { useRef, useEffect } from 'react';
import { View, Text, StyleSheet, ScrollView, Dimensions, ImageBackground, Animated } from 'react-native';
import { useTranslation } from 'react-i18next';
import { Ionicons } from '@expo/vector-icons';
import { LinearGradient } from 'expo-linear-gradient';
import { Colors, Spacing, BorderRadius, Shadows, Glassmorphism } from '../../theme/colors';
import aboutHeroImg from '../../../assets/about-team.jpg';

const { width } = Dimensions.get('window');

export default function AboutScreen({ navigation }: any) {
  const { t } = useTranslation();

  const leadership = [
    { name: 'H.E. HENG Sam Rin', role: t('about.roles.honoraryPresident', 'Honorary President'), initials: 'HSR', color: Colors.secondary },
    { name: 'Mr. NGOUN Ly', role: t('about.roles.president', 'President'), initials: 'NL', color: Colors.primary },
    { name: 'Mr. CHEA Vuthy', role: t('about.roles.vicePresident', 'Vice President'), initials: 'CV', color: Colors.purple },
    { name: 'Mr. CHHOUR Sopha', role: t('about.roles.executiveDirector', 'Executive Director'), initials: 'CS', color: Colors.success },
  ];

  const history = [
    {
      year: '2011',
      event: t('about.history.y2011.event', 'CHA Founded'),
      desc: t('about.history.y2011.desc', 'Cambodian Haemophilia Association officially established to support bleeding disorder patients.'),
    },
    {
      year: '2014',
      event: t('about.history.y2014.event', 'HFA Regional Membership'),
      desc: t('about.history.y2014.desc', 'Joined Haemophilia Federation of Asia as a core member state.'),
    },
    {
      year: '2017',
      event: t('about.history.y2017.event', 'WFH Global Recognition'),
      desc: t('about.history.y2017.desc', 'Formally recognized by the World Federation of Hemophilia (WFH).'),
    },
    {
      year: '2023',
      event: t('about.history.y2023.event', 'National Expansion'),
      desc: t('about.history.y2023.desc', 'Expanded hospital partner network across all 25 Cambodian provinces.'),
    },
  ];

  const scrollY = useRef(new Animated.Value(0)).current;
  const scaleZoom = useRef(new Animated.Value(1.1)).current;
  const teamAnims = useRef(leadership.map(() => new Animated.Value(0))).current;

  useEffect(() => {
    Animated.timing(scaleZoom, { toValue: 1, duration: 1500, useNativeDriver: true }).start();
    Animated.stagger(150, teamAnims.map(a => Animated.spring(a, { toValue: 1, friction: 6, useNativeDriver: true }))).start();
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
      {/* Hero Header */}
      <Animated.View style={{ transform: [{ translateY: parallaxTranslateY }, { scale: scaleZoom }] }}>
        <ImageBackground source={aboutHeroImg} style={styles.heroBg} resizeMode="cover">
        <LinearGradient
          colors={['rgba(15,30,84,0.65)', 'rgba(15,30,84,0.98)']}
          style={styles.heroGradient}
        >
          <View style={[styles.heroIconWrap, Glassmorphism.heroBadge]}>
            <Ionicons name="people" size={24} color="#FFFFFF" />
          </View>
          <Text style={styles.heroTitle}>{t('about.title', 'Who is CHA?')}</Text>
          <Text style={styles.heroLead}>
            {t('about.lead', 'The Cambodian Haemophilia Association is a patient-led organization dedicated to improving care, advocacy, and quality of life across Cambodia.')}
          </Text>
        </LinearGradient>
        </ImageBackground>
      </Animated.View>

      <View style={{ backgroundColor: Colors.surface, flex: 1 }}>
      {/* Vision & Mission Cards */}
      <View style={styles.vmSection}>
        <View style={styles.vmCard}>
          <View style={[styles.vmIcon, { backgroundColor: '#EAF0FB' }]}>
            <Ionicons name="eye" size={26} color={Colors.secondary} />
          </View>
          <View style={styles.vmContent}>
            <Text style={styles.vmLabel}>{t('about.visionLabel', 'Our Vision')}</Text>
            <Text style={styles.vmText}>
              {t('about.visionText', 'A Cambodia where every person with a bleeding disorder has access to timely diagnosis, care, and life-saving factor treatments.')}
            </Text>
          </View>
        </View>
        <View style={styles.vmCard}>
          <View style={[styles.vmIcon, { backgroundColor: '#FEE2E2' }]}>
            <Ionicons name="compass" size={26} color={Colors.primary} />
          </View>
          <View style={styles.vmContent}>
            <Text style={styles.vmLabel}>{t('about.missionLabel', 'Our Mission')}</Text>
            <Text style={styles.vmText}>
              {t('about.missionText', 'To advocate for quality health care, educate medical staff, support affected families, and empower patient caregivers nationwide.')}
            </Text>
          </View>
        </View>
      </View>

      {/* Timeline Section */}
      <View style={styles.section}>
        <Text style={styles.sectionTitle}>{t('about.journeyTitle', 'Our Journey & Milestones')}</Text>
        <Text style={styles.sectionSubtitle}>
          {t('about.journeySub', 'Key moments in our mission to bring better care to Cambodia.')}
        </Text>
        <View style={styles.timeline}>
          {history.map((item, index) => (
            <View key={index} style={styles.timelineItem}>
              <View style={styles.timelineDotWrap}>
                <View style={styles.timelineDot} />
                {index < history.length - 1 && <View style={styles.timelineLine} />}
              </View>
              <View style={styles.timelineContent}>
                <View style={styles.timelineYearBadge}>
                  <Text style={styles.timelineYear}>{item.year}</Text>
                </View>
                <Text style={styles.timelineEvent}>{item.event}</Text>
                <Text style={styles.timelineDesc}>{item.desc}</Text>
              </View>
            </View>
          ))}
        </View>
      </View>

      {/* Leadership Section */}
      <View style={[styles.section, styles.sectionSoft]}>
        <Text style={styles.sectionTitle}>{t('about.leadershipTitle', 'Leadership Team')}</Text>
        <Text style={styles.sectionSubtitle}>
          {t('about.leadershipSub', 'Dedicated advocates leading the mission for hemophilia patients in Cambodia.')}
        </Text>
        <View style={styles.leadershipList}>
          {leadership.map((member, index) => {
            const opacity = teamAnims[index];
            const translateY = teamAnims[index].interpolate({ inputRange: [0, 1], outputRange: [50, 0] });
            return (
            <Animated.View key={index} style={[styles.leaderRowCard, { opacity, transform: [{ translateY }] }]}>
              <View style={[styles.leaderAvatarWrap, { shadowColor: member.color }]}>
                <View style={[styles.leaderAvatar, { backgroundColor: member.color + '15' }]}>
                  <Text style={[styles.leaderInitials, { color: member.color }]}>{member.initials}</Text>
                </View>
              </View>
              <View style={styles.leaderRowContent}>
                <Text style={styles.leaderName}>{member.name}</Text>
                <Text style={styles.leaderRole}>{member.role}</Text>
              </View>
            </Animated.View>
            );
          })}
        </View>
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
    width: 56,
    height: 56,
    borderRadius: 28,
    alignItems: 'center',
    justifyContent: 'center',
    marginBottom: Spacing.md,
    borderWidth: 1,
    borderColor: 'rgba(255,255,255,0.3)',
  },
  heroTitle: { fontSize: 32, fontWeight: '900', color: '#FFFFFF', marginBottom: 8, paddingTop: 4, textAlign: 'center' },
  heroLead: { fontSize: 14, color: 'rgba(255,255,255,0.9)', lineHeight: 24, paddingTop: 2, textAlign: 'center', maxWidth: '95%' },

  vmSection: { paddingHorizontal: Spacing.lg, marginTop: -32, gap: 16 },
  vmCard: {
    flexDirection: 'row',
    width: '100%',
    backgroundColor: '#FFFFFF',
    borderRadius: 24,
    padding: 24,
    alignItems: 'center',
    ...Shadows.lg,
    borderWidth: 1,
    borderColor: 'rgba(0,0,0,0.04)',
    gap: 16,
  },
  vmIcon: {
    width: 56,
    height: 56,
    borderRadius: 28,
    alignItems: 'center',
    justifyContent: 'center',
  },
  vmContent: { flex: 1 },
  vmLabel: { fontSize: 18, fontWeight: '800', color: Colors.secondary, marginBottom: 4, paddingTop: 2 },
  vmText: { fontSize: 13, color: Colors.textSecondary, lineHeight: 22, paddingTop: 2 },

  section: { paddingHorizontal: Spacing.lg, paddingTop: 40 },
  sectionSoft: { backgroundColor: '#F8FAFC', marginTop: 40, paddingTop: 40, paddingBottom: 64, borderTopWidth: 1, borderColor: 'rgba(0,0,0,0.05)' },
  sectionTitle: { fontSize: 24, fontWeight: '900', color: Colors.secondary, marginBottom: 8, lineHeight: 32, paddingTop: 4 },
  sectionSubtitle: { fontSize: 14, color: Colors.textSecondary, marginBottom: 32, lineHeight: 24, paddingTop: 2 },

  timeline: { paddingLeft: 8, paddingTop: 8 },
  timelineItem: { flexDirection: 'row', marginBottom: 28 },
  timelineDotWrap: { width: 28, alignItems: 'center', marginRight: 20 },
  timelineDot: { width: 16, height: 16, borderRadius: 8, backgroundColor: Colors.primary, marginTop: 4, zIndex: 2, borderWidth: 3, borderColor: '#FEE2E2' },
  timelineLine: { width: 3, flex: 1, backgroundColor: '#E2E8F0', marginTop: -4 },
  timelineContent: { flex: 1, paddingBottom: 8 },
  timelineYearBadge: { alignSelf: 'flex-start', backgroundColor: '#FEE2E2', paddingHorizontal: 12, paddingVertical: 4, borderRadius: 100, marginBottom: 12 },
  timelineYear: { fontSize: 12, fontWeight: '800', color: Colors.primary, paddingTop: 2 },
  timelineEvent: { fontSize: 18, fontWeight: '800', color: Colors.text, marginBottom: 6, lineHeight: 26, paddingTop: 2 },
  timelineDesc: { fontSize: 14, color: Colors.textSecondary, lineHeight: 24, paddingTop: 2 },

  leadershipList: { gap: 16 },
  leaderRowCard: {
    flexDirection: 'row',
    backgroundColor: '#FFFFFF',
    borderRadius: 24,
    padding: 20,
    alignItems: 'center',
    borderWidth: 1,
    borderColor: 'rgba(0,0,0,0.04)',
    ...Shadows.md,
  },
  leaderAvatarWrap: { marginRight: 16, shadowOffset: { width: 0, height: 4 }, shadowOpacity: 0.1, shadowRadius: 8, elevation: 4 },
  leaderAvatar: { width: 64, height: 64, borderRadius: 32, alignItems: 'center', justifyContent: 'center', borderWidth: 2, borderColor: '#FFFFFF' },
  leaderInitials: { fontSize: 20, fontWeight: '900' },
  leaderRowContent: { flex: 1 },
  leaderName: { fontSize: 16, fontWeight: '800', color: Colors.text, marginBottom: 4, lineHeight: 22, paddingTop: 2 },
  leaderRole: { fontSize: 13, color: Colors.textSecondary, lineHeight: 18, paddingTop: 2 },
});
