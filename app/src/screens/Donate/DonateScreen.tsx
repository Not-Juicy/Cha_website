import React, { useState, useRef } from 'react';
import { View, Text, StyleSheet, TouchableOpacity, TextInput, Linking, Alert, Modal, Animated, ActivityIndicator, Platform } from 'react-native';
import { WebView } from 'react-native-webview';
import { Ionicons } from '@expo/vector-icons';
import { useTranslation } from 'react-i18next';
import { LinearGradient } from 'expo-linear-gradient';
import { Colors, Spacing, BorderRadius, Shadows } from '../../theme/colors';
import { donationAPI } from '../../api/client';

const DONATION_LINKS = {
  paypal: 'https://www.paypal.com/donate',
};

const PRESET_AMOUNTS = [10, 25, 50, 100, 250];

interface CheckoutInfo {
  checkout_url: string;
  fields: Record<string, string>;
  tran_id: string;
}

function buildCheckoutHtml(action: string, fields: Record<string, string>) {
  const inputs = Object.entries(fields)
    .map(([k, v]) => `<input type="hidden" name="${k}" value="${String(v).replace(/"/g, '&quot;')}" />`)
    .join('');
  return (
    `<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"></head>` +
    `<body style="margin:0;padding:0;background:#fff">` +
    `<form id="pwform" method="POST" action="${action}">${inputs}</form>` +
    `<script>document.getElementById('pwform').submit();</script>` +
    `</body></html>`
  );
}

export default function DonateScreen({ navigation }: any) {
  const { t } = useTranslation();
  const [frequency, setFrequency] = useState<'oneTime' | 'monthly'>('oneTime');
  const [amount, setAmount] = useState<number | null>(25);
  const [customAmount, setCustomAmount] = useState('');
  const [method, setMethod] = useState<'aba' | 'paypal'>('aba');
  const [loading, setLoading] = useState(false);

  const [checkout, setCheckout] = useState<CheckoutInfo | null>(null);
  const [showCheckout, setShowCheckout] = useState(false);
  const [receipt, setReceipt] = useState<{ tranId: string; amount: number } | null>(null);
  const [showReceipt, setShowReceipt] = useState(false);

  const scrollY = useRef(new Animated.Value(0)).current;

  const selectedAmount = customAmount.trim() ? parseFloat(customAmount) : amount ?? 0;

  const handleDonate = async () => {
    const value = customAmount.trim() ? parseFloat(customAmount) : amount ?? 0;
    if (!value || value <= 0) {
      Alert.alert(t('donate.title', 'Donation'), t('donate.invalidAmount', 'Please select or enter a valid donation amount.'));
      return;
    }
    if (method === 'paypal') {
      Linking.openURL(DONATION_LINKS.paypal).catch(() => {
        Alert.alert('Payment Link', 'Opening PayPal donation portal for CHA.');
      });
      return;
    }
    // PayWay hosted checkout
    setLoading(true);
    try {
      const res: any = await donationAPI.purchase(value, 'USD');
      if (!res || !res.success) {
        throw new Error((res && res.message) || 'Could not start payment.');
      }
      setCheckout({
        checkout_url: res.checkout_url,
        fields: res.fields,
        tran_id: res.tran_id,
      });
      setShowCheckout(true);
    } catch (e: any) {
      Alert.alert(t('donate.title', 'Donation'), e?.message || 'Could not start payment. Please try again.');
    } finally {
      setLoading(false);
    }
  };

  const handleShouldStartLoad = (request: any) => {
    const url = request.url || '';
    if (/^https?:\/\//i.test(url)) return true;
    // Android intent:// scheme — extract scheme and open the native app
    if (/^intent:\/\//i.test(url)) {
      const schemeMatch = url.match(/scheme=([^;#]+)/i);
      if (schemeMatch) {
        const scheme = schemeMatch[1];
        const pathMatch = url.match(/^intent:\/\/([^#]*)/);
        const path = pathMatch ? pathMatch[1] : '';
        Linking.openURL(`${scheme}://${path}`).catch(() => {});
      } else {
        Linking.openURL(url).catch(() => {});
      }
      return false;
    }
    // Direct native scheme links
    if (/^[a-z][a-z0-9+.-]*:\/\//i.test(url) && !/^https?:\/\//i.test(url)) {
      Linking.openURL(url).catch(() => {});
      return false;
    }
    return true;
  };

  const handleCheckoutNav = (nav: any) => {
    const url = nav?.url || '';
    if (url.includes('donation-thank-you')) {
      // Payment confirmed server-side; show receipt
      setShowCheckout(false);
      if (checkout) {
        setReceipt({ tranId: checkout.tran_id, amount: selectedAmount });
        setShowReceipt(true);
      }
    } else if (url.includes('donation-cancelled')) {
      setShowCheckout(false);
      Alert.alert(t('donate.title', 'Donation'), 'Your donation was not completed. No payment was taken.');
    }
  };

  const parallaxTranslateY = scrollY.interpolate({
    inputRange: [-200, 0, 400],
    outputRange: [-100, 0, 150],
    extrapolate: 'clamp',
  });

  const scaleZoom = scrollY.interpolate({
    inputRange: [-200, 0],
    outputRange: [1.5, 1],
    extrapolateRight: 'clamp',
  });

  return (
    <View style={styles.container}>
      {/* Animated Parallax Gradient Header */}
      <Animated.View style={[styles.heroContainer, { transform: [{ translateY: parallaxTranslateY }, { scale: scaleZoom }] }]}>
        <LinearGradient
          colors={['#DC2626', '#991B1B']}
          start={{ x: 0, y: 0 }}
          end={{ x: 1, y: 1 }}
          style={styles.heroGradient}
        >
          <View style={styles.heroContent}>
            <View style={styles.heroIconWrap}>
              <View style={styles.heroIconGlass}>
                <Ionicons name="heart" size={42} color="#FFFFFF" />
              </View>
            </View>

            <Text style={styles.heroTitle}>{t('donate.title', 'Help Change Lives')}</Text>
            <Text style={styles.heroLead}>
              {t('donate.subtitle', 'Your generosity directly funds vital treatment and support for bleeding disorder patients across Cambodia.')}
            </Text>
          </View>
        </LinearGradient>
      </Animated.View>

      <Animated.ScrollView
        style={styles.scrollView}
        contentContainerStyle={styles.scrollContent}
        showsVerticalScrollIndicator={false}
        onScroll={Animated.event([{ nativeEvent: { contentOffset: { y: scrollY } } }], { useNativeDriver: true })}
        scrollEventThrottle={16}
      >
        <View style={styles.contentWrapper}>

          {/* iOS-Style Frequency Segmented Control */}
          <View style={styles.section}>
            <Text style={styles.sectionLabel}>{t('donate.frequency', 'Donation Frequency')}</Text>
            <View style={styles.segmentedControl}>
              {([
                { key: 'oneTime', label: t('donate.oneTime', 'One-time') },
                { key: 'monthly', label: t('donate.monthly', 'Monthly') },
              ] as const).map((opt) => (
                <TouchableOpacity
                  key={opt.key}
                  style={[styles.segmentBtn, frequency === opt.key && styles.segmentBtnActive]}
                  onPress={() => setFrequency(opt.key)}
                  activeOpacity={0.8}
                >
                  <Text style={[styles.segmentText, frequency === opt.key && styles.segmentTextActive]}>{opt.label}</Text>
                </TouchableOpacity>
              ))}
            </View>
          </View>

          {/* Premium Amount Grid */}
          <View style={styles.section}>
            <Text style={styles.sectionLabel}>{t('donate.amount', 'Select Amount ($ USD)')}</Text>
            <View style={styles.amountGrid}>
              {PRESET_AMOUNTS.map((amt) => (
                <TouchableOpacity
                  key={amt}
                  style={[styles.amountCard, amount === amt && !customAmount.trim() && styles.amountCardActive]}
                  onPress={() => { setAmount(amt); setCustomAmount(''); }}
                  activeOpacity={0.7}
                >
                  <Text style={[styles.amountText, amount === amt && !customAmount.trim() && styles.amountTextActive]}>${amt}</Text>
                </TouchableOpacity>
              ))}
            </View>

            <View style={[styles.customInputCard, customAmount.trim() ? styles.customInputCardActive : null]}>
              <Ionicons name="cash-outline" size={20} color={customAmount.trim() ? Colors.primary : Colors.secondary} />
              <TextInput
                style={styles.customInput}
                placeholder={t('donate.customPlaceholder', 'Other amount...')}
                placeholderTextColor={Colors.textMuted}
                keyboardType="numeric"
                value={customAmount}
                onChangeText={setCustomAmount}
              />
            </View>
          </View>

          {/* Premium Payment Method Selector */}
          <View style={styles.section}>
            <Text style={styles.sectionLabel}>{t('donate.paymentMethod', 'Payment Method')}</Text>
            <View style={styles.methodGrid}>
              {([
                { key: 'aba', icon: 'qr-code' as const, label: 'ABA KHQR Pay', tag: 'Instant' },
                { key: 'paypal', icon: 'card' as const, label: 'PayPal / Cards', tag: 'Global' },
              ] as const).map((m) => (
                <TouchableOpacity
                  key={m.key}
                  style={[styles.methodRow, method === m.key && styles.methodRowActive]}
                  onPress={() => setMethod(m.key)}
                  activeOpacity={0.7}
                >
                  <View style={[styles.methodIconBox, method === m.key && styles.methodIconBoxActive]}>
                    <Ionicons name={m.icon} size={22} color={method === m.key ? '#FFFFFF' : Colors.secondary} />
                  </View>
                  <View style={styles.methodInfo}>
                    <Text style={[styles.methodTitle, method === m.key && styles.methodTitleActive]}>{m.label}</Text>
                    <Text style={styles.methodTag}>{m.tag}</Text>
                  </View>
                  <View style={[styles.radioCircle, method === m.key && styles.radioCircleActive]}>
                    {method === m.key && <View style={styles.radioDot} />}
                  </View>
                </TouchableOpacity>
              ))}
            </View>
          </View>

          {/* Checkout Footer */}
          <View style={styles.checkoutFooter}>
            <View style={styles.summaryRow}>
              <Text style={styles.summaryLabel}>Total Donation:</Text>
              <Text style={styles.summaryValue}>${selectedAmount.toFixed(2)}</Text>
            </View>
            <TouchableOpacity style={styles.checkoutBtn} onPress={handleDonate} activeOpacity={0.85} disabled={loading}>
              <LinearGradient
                colors={['#DC2626', '#B91C1C']}
                start={{ x: 0, y: 0 }}
                end={{ x: 1, y: 1 }}
                style={styles.checkoutGradient}
              >
                {loading ? (
                  <ActivityIndicator color="#FFFFFF" />
                ) : (
                  <>
                    <Ionicons name="lock-closed" size={18} color="#FFFFFF" />
                    <Text style={styles.checkoutBtnText}>
                      {frequency === 'monthly' ? t('donate.proceedMonthly', 'Setup Monthly Support') : t('donate.donateNow', 'Donate Now')}
                    </Text>
                  </>
                )}
              </LinearGradient>
            </TouchableOpacity>
            <View style={styles.secureBanner}>
              <Ionicons name="shield-checkmark" size={14} color={Colors.success} />
              <Text style={styles.secureBannerText}>Encrypted & Secure via PayWay (ABA Bank)</Text>
            </View>
          </View>

        </View>
      </Animated.ScrollView>

      {/* Floating Back Button */}
      <TouchableOpacity style={styles.floatingBackBtn} onPress={() => navigation.goBack()} hitSlop={{ top: 10, bottom: 10, left: 10, right: 10 }}>
        <Ionicons name="arrow-back" size={20} color="#FFFFFF" />
      </TouchableOpacity>

      {/* PayWay Hosted Checkout Modal */}
      <Modal visible={showCheckout} animationType="slide" onRequestClose={() => setShowCheckout(false)}>
        <View style={styles.webviewHeader}>
          <TouchableOpacity onPress={() => setShowCheckout(false)} hitSlop={{ top: 10, bottom: 10, left: 10, right: 10 }}>
            <Ionicons name="close" size={26} color="#0B1D6D" />
          </TouchableOpacity>
          <Text style={styles.webviewHeaderTitle}>PayWay Secure Checkout</Text>
          <View style={{ width: 26 }} />
        </View>
        {checkout ? (
          <WebView
            originWhitelist={['*']}
            source={{ html: buildCheckoutHtml(checkout.checkout_url, checkout.fields) }}
            style={{ flex: 1 }}
            startInLoadingState
            renderLoading={() => (
              <View style={styles.webviewLoading}><ActivityIndicator size="large" color={Colors.primary} /></View>
            )}
            onShouldStartLoadWithRequest={handleShouldStartLoad}
            onNavigationStateChange={handleCheckoutNav}
            javaScriptEnabled
            domStorageEnabled
          />
        ) : (
          <View style={styles.webviewLoading}><ActivityIndicator size="large" color={Colors.primary} /></View>
        )}
      </Modal>

      {/* Thank You Receipt Modal */}
      <Modal visible={showReceipt} transparent animationType="fade" onRequestClose={() => setShowReceipt(false)}>
        <View style={styles.modalBackdrop}>
          <View style={styles.receiptCard}>
            <LinearGradient
              colors={['#DC2626', '#991B1B']}
              start={{ x: 0, y: 0 }}
              end={{ x: 1, y: 1 }}
              style={styles.receiptHeaderBox}
            >
              <Ionicons name="heart" size={40} color="#FFFFFF" />
            </LinearGradient>

            <Text style={styles.receiptTitle}>Thank You for Your Gift!</Text>
            <Text style={styles.receiptSub}>Cambodian Haemophilia Association</Text>

            <View style={styles.receiptDetails}>
              <View style={styles.receiptRow}>
                <Text style={styles.receiptLabel}>Receipt No:</Text>
                <Text style={styles.receiptVal}>#{receipt?.tranId || 'CHA-0000'}</Text>
              </View>
              <View style={styles.receiptRow}>
                <Text style={styles.receiptLabel}>Amount:</Text>
                <Text style={[styles.receiptVal, { color: Colors.primary, fontSize: 16 }]}>${(receipt?.amount || 0).toFixed(2)}</Text>
              </View>
              <View style={styles.receiptRow}>
                <Text style={styles.receiptLabel}>Status:</Text>
                <Text style={[styles.receiptVal, { color: Colors.success }]}>Verified & Completed</Text>
              </View>
            </View>

            <TouchableOpacity style={styles.receiptCloseBtn} onPress={() => setShowReceipt(false)}>
              <Text style={styles.receiptCloseText}>Close Receipt</Text>
            </TouchableOpacity>
          </View>
        </View>
      </Modal>
    </View>
  );
}

const styles = StyleSheet.create({
  container: { flex: 1, backgroundColor: '#F8FAFC' },
  heroContainer: {
    position: 'absolute',
    top: 0,
    left: 0,
    right: 0,
    height: 320,
    zIndex: 1,
  },
  heroGradient: {
    flex: 1,
    paddingTop: 60,
    paddingHorizontal: Spacing.lg,
  },
  heroContent: {
    alignItems: 'center',
    zIndex: 2,
  },
  floatingBackBtn: {
    position: 'absolute',
    top: 60,
    left: Spacing.lg,
    width: 40,
    height: 40,
    borderRadius: 20,
    backgroundColor: 'rgba(255,255,255,0.25)',
    alignItems: 'center',
    justifyContent: 'center',
    zIndex: 10,
    ...Shadows.sm,
  },
  heroIconWrap: {
    marginBottom: Spacing.md,
    marginTop: 10,
  },
  heroIconGlass: {
    width: 80,
    height: 80,
    borderRadius: 40,
    backgroundColor: 'rgba(255,255,255,0.15)',
    alignItems: 'center',
    justifyContent: 'center',
    borderWidth: 1,
    borderColor: 'rgba(255,255,255,0.3)',
    ...Shadows.md,
  },
  heroTitle: { fontSize: 28, fontWeight: '800', color: '#FFFFFF', marginBottom: 8, textAlign: 'center' },
  heroLead: { fontSize: 14, color: 'rgba(255,255,255,0.9)', lineHeight: 22, textAlign: 'center', maxWidth: 320 },

  scrollView: { flex: 1, zIndex: 2 },
  scrollContent: { paddingTop: 280 },
  contentWrapper: {
    backgroundColor: '#F8FAFC',
    borderTopLeftRadius: 32,
    borderTopRightRadius: 32,
    paddingTop: 32,
    paddingBottom: 80,
    paddingHorizontal: Spacing.lg,
    minHeight: 800,
    ...Shadows.lg,
  },

  section: { marginBottom: 28 },
  sectionLabel: { fontSize: 13, fontWeight: '700', color: Colors.textSecondary, textTransform: 'uppercase', letterSpacing: 1, marginBottom: 12 },

  // Segmented Control
  segmentedControl: {
    flexDirection: 'row',
    backgroundColor: '#E2E8F0',
    borderRadius: 14,
    padding: 4,
  },
  segmentBtn: { flex: 1, paddingVertical: 12, borderRadius: 10, alignItems: 'center' },
  segmentBtnActive: { backgroundColor: '#FFFFFF', ...Shadows.sm },
  segmentText: { fontSize: 14, fontWeight: '600', color: Colors.textSecondary },
  segmentTextActive: { color: Colors.secondary, fontWeight: '700' },

  // Amount Grid
  amountGrid: { flexDirection: 'row', flexWrap: 'wrap', gap: 10, marginBottom: 10 },
  amountCard: {
    width: '31%',
    backgroundColor: '#FFFFFF',
    borderRadius: 16,
    paddingVertical: 16,
    alignItems: 'center',
    justifyContent: 'center',
    borderWidth: 1.5,
    borderColor: 'transparent',
    ...Shadows.sm,
  },
  amountCardActive: { borderColor: Colors.primary, backgroundColor: '#FFF5F5' },
  amountText: { fontSize: 18, fontWeight: '800', color: Colors.secondary },
  amountTextActive: { color: Colors.primary },

  customInputCard: {
    flexDirection: 'row',
    alignItems: 'center',
    gap: 12,
    backgroundColor: '#FFFFFF',
    borderRadius: 16,
    paddingHorizontal: 16,
    paddingVertical: 14,
    borderWidth: 1.5,
    borderColor: 'transparent',
    ...Shadows.sm,
  },
  customInputCardActive: { borderColor: Colors.primary, backgroundColor: '#FFF5F5' },
  customInput: { flex: 1, fontSize: 16, fontWeight: '700', color: Colors.text },

  // Payment Methods
  methodGrid: { gap: 12 },
  methodRow: {
    flexDirection: 'row',
    alignItems: 'center',
    backgroundColor: '#FFFFFF',
    borderRadius: 16,
    padding: 16,
    borderWidth: 1.5,
    borderColor: 'transparent',
    ...Shadows.sm,
  },
  methodRowActive: { borderColor: Colors.primary, backgroundColor: '#FFF5F5' },
  methodIconBox: { width: 44, height: 44, borderRadius: 12, backgroundColor: '#F1F5F9', alignItems: 'center', justifyContent: 'center', marginRight: 14 },
  methodIconBoxActive: { backgroundColor: Colors.primary },
  methodInfo: { flex: 1 },
  methodTitle: { fontSize: 16, fontWeight: '700', color: Colors.secondary, marginBottom: 2 },
  methodTitleActive: { color: Colors.primary },
  methodTag: { fontSize: 12, color: Colors.textSecondary },
  radioCircle: { width: 24, height: 24, borderRadius: 12, borderWidth: 2, borderColor: '#CBD5E1', alignItems: 'center', justifyContent: 'center' },
  radioCircleActive: { borderColor: Colors.primary },
  radioDot: { width: 12, height: 12, borderRadius: 6, backgroundColor: Colors.primary },

  // Checkout Footer
  checkoutFooter: {
    backgroundColor: '#FFFFFF',
    borderRadius: 24,
    padding: 24,
    ...Shadows.md,
    marginTop: 10,
  },
  summaryRow: { flexDirection: 'row', justifyContent: 'space-between', alignItems: 'center', marginBottom: 20 },
  summaryLabel: { fontSize: 15, fontWeight: '600', color: Colors.textSecondary },
  summaryValue: { fontSize: 24, fontWeight: '800', color: Colors.secondary },
  checkoutBtn: { borderRadius: 16, overflow: 'hidden', marginBottom: 16, ...Shadows.md },
  checkoutGradient: { flexDirection: 'row', alignItems: 'center', justifyContent: 'center', gap: 10, paddingVertical: 18 },
  checkoutBtnText: { fontSize: 16, fontWeight: '800', color: '#FFFFFF' },
  secureBanner: { flexDirection: 'row', alignItems: 'center', justifyContent: 'center', gap: 6 },
  secureBannerText: { fontSize: 12, fontWeight: '600', color: Colors.textMuted },

  // WebView Header
  webviewHeader: {
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'space-between',
    paddingHorizontal: Spacing.lg,
    paddingTop: Platform.OS === 'ios' ? 58 : 14,
    paddingBottom: 14,
    backgroundColor: '#FFFFFF',
    borderBottomWidth: 1,
    borderBottomColor: Colors.borderLight,
  },
  webviewHeaderTitle: { fontSize: 15, fontWeight: '700', color: '#0B1D6D' },
  webviewLoading: { flex: 1, alignItems: 'center', justifyContent: 'center', backgroundColor: '#F8FAFC' },

  // Modals
  modalBackdrop: { flex: 1, backgroundColor: 'rgba(15,30,84,0.6)', justifyContent: 'center', alignItems: 'center', padding: Spacing.lg },

  // Receipt
  receiptCard: { backgroundColor: '#FFFFFF', borderRadius: 24, padding: 24, width: '100%', maxWidth: 340, alignItems: 'center', ...Shadows.lg },
  receiptHeaderBox: { width: 80, height: 80, borderRadius: 40, alignItems: 'center', justifyContent: 'center', marginBottom: 20, ...Shadows.md },
  receiptTitle: { fontSize: 22, fontWeight: '800', color: Colors.secondary, textAlign: 'center', marginBottom: 4 },
  receiptSub: { fontSize: 14, color: Colors.textSecondary, textAlign: 'center', marginBottom: 24 },
  receiptDetails: { backgroundColor: '#F8FAFC', padding: 16, borderRadius: 16, width: '100%', gap: 12, marginBottom: 24, borderWidth: 1, borderColor: Colors.borderLight },
  receiptRow: { flexDirection: 'row', justifyContent: 'space-between', alignItems: 'center' },
  receiptLabel: { fontSize: 13, color: Colors.textSecondary },
  receiptVal: { fontSize: 14, fontWeight: '800', color: Colors.secondary },
  receiptCloseBtn: { backgroundColor: Colors.secondary, paddingVertical: 16, borderRadius: 16, width: '100%', alignItems: 'center' },
  receiptCloseText: { fontSize: 15, fontWeight: '700', color: '#FFFFFF' },
});
