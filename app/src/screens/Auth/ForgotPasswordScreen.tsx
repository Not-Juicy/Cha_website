import React, { useState } from 'react';
import { View, Text, StyleSheet, TouchableOpacity, TextInput, ScrollView, KeyboardAvoidingView, Platform, ActivityIndicator } from 'react-native';
import { SafeAreaView } from 'react-native-safe-area-context';
import { Ionicons } from '@expo/vector-icons';
import { useTranslation } from 'react-i18next';
import { authAPI } from '../../api/client';

export default function ForgotPasswordScreen({ navigation }: any) {
  const { t } = useTranslation();
  const [email, setEmail] = useState('');
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState<string | null>(null);
  const [sent, setSent] = useState(false);

  const handleSubmit = async () => {
    setError(null);
    if (!email.trim() || !email.includes('@')) {
      setError(t('auth.invalidEmail', 'Please enter a valid email address.'));
      return;
    }
    setLoading(true);
    try {
      await authAPI.forgotPassword(email.trim());
      setSent(true);
    } catch (e: any) {
      setError(e.message || t('common.networkError', 'Network error. Please try again.'));
    } finally {
      setLoading(false);
    }
  };

  return (
    <KeyboardAvoidingView style={styles.flex} behavior={Platform.OS === 'ios' ? 'padding' : undefined}>
      <SafeAreaView style={styles.flex} edges={['top']}>
        <ScrollView style={styles.container} contentContainerStyle={styles.scrollContent} keyboardShouldPersistTaps="handled">
          {/* Branded Header */}
          <View style={styles.header}>
            <TouchableOpacity style={styles.backBtn} onPress={() => navigation.goBack()} hitSlop={{ top: 10, bottom: 10, left: 10, right: 10 }}>
              <Ionicons name="arrow-back" size={20} color="#0B1D6D" />
            </TouchableOpacity>
            <View style={styles.headerBrand}>
              <View style={styles.headerLogo}>
                <Ionicons name="water" size={15} color="#E31E24" />
              </View>
              <Text style={styles.headerBrandText}>CHA Cambodia</Text>
            </View>
            <View style={{ width: 40 }} />
          </View>

          {/* Title */}
          <View style={styles.titleBlock}>
            <Text style={styles.greeting}>{t('auth.forgotTitle', 'Reset your password')}</Text>
            <Text style={styles.title}>{t('auth.forgotSub', 'Forgot password?')}</Text>
            <Text style={styles.subtitle}>
              {t('auth.forgotHelp', 'Enter the email address you used to register. We will send you a link to set a new password.')}
            </Text>
          </View>

          <View style={styles.formCard}>
            {error ? (
              <View style={[styles.banner, styles.bannerError]}>
                <Ionicons name="alert-circle" size={16} color="#B91C1C" />
                <Text style={styles.bannerErrorText}>{error}</Text>
              </View>
            ) : null}

            {sent ? (
              <View style={[styles.banner, styles.bannerSuccess]}>
                <Ionicons name="checkmark-circle" size={16} color="#166534" />
                <Text style={styles.bannerSuccessText}>
                  {t('auth.forgotSent', 'If an account exists for that email, a password reset link has been sent. Please check your inbox.')}
                </Text>
              </View>
            ) : (
              <>
                <View style={styles.inputGroup}>
                  <Text style={styles.inputLabel}>{t('auth.email', 'Email address')} <Text style={styles.required}>*</Text></Text>
                  <View style={styles.iconInputRow}>
                    <Ionicons name="mail" size={16} color="#B6BCC6" style={styles.inputIcon} />
                    <TextInput
                      style={styles.fieldInputInRow}
                      placeholder="name@example.com"
                      placeholderTextColor="#B6BCC6"
                      keyboardType="email-address"
                      autoCapitalize="none"
                      autoCorrect={false}
                      value={email}
                      onChangeText={setEmail}
                    />
                  </View>
                </View>

                <TouchableOpacity style={styles.submitBtn} activeOpacity={0.85} onPress={handleSubmit} disabled={loading}>
                  {loading ? (
                    <ActivityIndicator color="#FFFFFF" />
                  ) : (
                    <>
                      <Text style={styles.submitBtnText}>{t('auth.forgotSend', 'Send Reset Link')}</Text>
                      <Ionicons name="arrow-forward" size={16} color="#FFFFFF" />
                    </>
                  )}
                </TouchableOpacity>
              </>
            )}

            <View style={styles.switchRow}>
              <Text style={styles.switchLabel}>{t('auth.rememberPassword', 'Remembered your password?')}</Text>
              <TouchableOpacity onPress={() => navigation.goBack()}>
                <Text style={styles.switchLink}>{t('auth.signInLink', 'Sign in')}</Text>
              </TouchableOpacity>
            </View>
          </View>
        </ScrollView>
      </SafeAreaView>
    </KeyboardAvoidingView>
  );
}

const styles = StyleSheet.create({
  flex: { flex: 1, backgroundColor: '#F8FAFC' },
  container: { flex: 1 },
  scrollContent: { paddingHorizontal: 20, paddingBottom: 40 },

  header: { flexDirection: 'row', alignItems: 'center', justifyContent: 'space-between', paddingTop: 12, paddingBottom: 20 },
  backBtn: { width: 38, height: 38, borderRadius: 19, backgroundColor: '#FFFFFF', alignItems: 'center', justifyContent: 'center', borderWidth: 1, borderColor: '#E2E8F0' },
  headerBrand: { flexDirection: 'row', alignItems: 'center', gap: 6 },
  headerLogo: { width: 24, height: 24, borderRadius: 12, backgroundColor: '#FEE2E2', alignItems: 'center', justifyContent: 'center' },
  headerBrandText: { fontSize: 13, fontWeight: '800', color: '#0B1D6D', letterSpacing: 0.5, paddingTop: 2 },

  titleBlock: { marginBottom: 20 },
  greeting: { fontSize: 13, fontWeight: '700', color: '#E31E24', textTransform: 'uppercase', letterSpacing: 0.5, marginBottom: 4, lineHeight: 18, paddingTop: 2 },
  title: { fontSize: 26, fontWeight: '800', color: '#0B1D6D', marginBottom: 6, lineHeight: 36, paddingTop: 4 },
  subtitle: { fontSize: 13, color: '#64748B', lineHeight: 20, paddingTop: 2 },

  formCard: { backgroundColor: '#FFFFFF', borderRadius: 16, padding: 20, borderWidth: 1, borderColor: '#E2E8F0' },

  banner: { flexDirection: 'row', alignItems: 'center', gap: 8, padding: 12, borderRadius: 8, marginBottom: 16 },
  bannerError: { backgroundColor: '#FEE2E2', borderWidth: 1, borderColor: '#FCA5A5' },
  bannerErrorText: { fontSize: 12, color: '#991B1B', flex: 1, lineHeight: 18, paddingTop: 2 },
  bannerSuccess: { backgroundColor: '#DCFCE7', borderWidth: 1, borderColor: '#86EFAC' },
  bannerSuccessText: { fontSize: 12, color: '#166534', flex: 1, lineHeight: 18, paddingTop: 2 },

  inputGroup: { gap: 4, marginBottom: 18 },
  inputLabel: { fontSize: 12, fontWeight: '700', color: '#334155', lineHeight: 18, paddingTop: 2 },
  required: { color: '#E31E24' },
  iconInputRow: { flexDirection: 'row', alignItems: 'center', backgroundColor: '#F8FAFC', borderWidth: 1, borderColor: '#CBD5E1', borderRadius: 10, paddingHorizontal: 12, height: 46 },
  inputIcon: { marginRight: 8 },
  fieldInputInRow: { flex: 1, fontSize: 14, color: '#0F172A', paddingVertical: 0 },

  submitBtn: { backgroundColor: '#E31E24', flexDirection: 'row', alignItems: 'center', justifyContent: 'center', gap: 8, height: 48, borderRadius: 10, marginTop: 6 },

  submitBtnText: { color: '#FFFFFF', fontSize: 14, fontWeight: '700', paddingTop: 2 },

  switchRow: { flexDirection: 'row', alignItems: 'center', justifyContent: 'center', gap: 6, marginTop: 20 },
  switchLabel: { fontSize: 13, color: '#64748B', paddingTop: 2 },
  switchLink: { fontSize: 13, fontWeight: '700', color: '#0B1D6D', paddingTop: 2 },
});
