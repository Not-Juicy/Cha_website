import React, { useState } from 'react';
import { View, Text, StyleSheet, ScrollView, TouchableOpacity, TextInput, ActivityIndicator } from 'react-native';
import { Ionicons } from '@expo/vector-icons';
import { useTranslation } from 'react-i18next';
import { authAPI } from '../../api/client';
import { Colors, Spacing, BorderRadius } from '../../theme/colors';

export default function ChangePasswordScreen({ navigation }: any) {
  const { t } = useTranslation();
  const [currentPassword, setCurrentPassword] = useState('');
  const [newPassword, setNewPassword] = useState('');
  const [confirmPassword, setConfirmPassword] = useState('');

  const [showCurrent, setShowCurrent] = useState(false);
  const [showNew, setShowNew] = useState(false);
  const [showConfirm, setShowConfirm] = useState(false);

  const [loading, setLoading] = useState(false);
  const [error, setError] = useState<string | null>(null);
  const [success, setSuccess] = useState<string | null>(null);

  const handleSubmit = async () => {
    setError(null);
    setSuccess(null);

    if (!currentPassword || !newPassword || !confirmPassword) {
      setError('Please fill in all password fields.');
      return;
    }
    if (newPassword.length < 6) {
      setError('New password must be at least 6 characters.');
      return;
    }
    if (newPassword !== confirmPassword) {
      setError('New passwords do not match.');
      return;
    }

    setLoading(true);
    try {
      await authAPI.changePassword(currentPassword, newPassword);
      setSuccess('Password changed successfully.');
      setCurrentPassword('');
      setNewPassword('');
      setConfirmPassword('');
    } catch (e: any) {
      setError(e.message || 'Failed to change password. Please verify current password.');
    } finally {
      setLoading(false);
    }
  };

  return (
    <ScrollView style={styles.container} keyboardShouldPersistTaps="handled">
      {/* Header Bar */}
      <View style={styles.header}>
        <TouchableOpacity style={styles.backBtn} onPress={() => navigation.goBack()} hitSlop={{ top: 10, bottom: 10, left: 10, right: 10 }}>
          <Ionicons name="arrow-back" size={20} color="#0F172A" />
        </TouchableOpacity>
        <Text style={styles.headerTitle}>{t('profile.changePassword', 'Change Password')}</Text>
        <View style={{ width: 38 }} />
      </View>

      <View style={styles.content}>
        <Text style={styles.subtitle}>
          {t('profile.accountSecurity', 'Account Security')}
        </Text>

        {error ? (
          <View style={styles.bannerError}>
            <Ionicons name="alert-circle" size={18} color="#991B1B" />
            <Text style={styles.bannerErrorText}>{error}</Text>
          </View>
        ) : null}

        {success ? (
          <View style={styles.bannerSuccess}>
            <Ionicons name="checkmark-circle" size={18} color="#166534" />
            <Text style={styles.bannerSuccessText}>{success}</Text>
          </View>
        ) : null}

        {/* Current Password */}
        <View style={styles.field}>
          <Text style={styles.inputLabel}>{t('profile.currentPassword', 'Current Password')}</Text>
          <View style={styles.inputWrap}>
            <Ionicons name="lock-closed-outline" size={18} color="#64748B" style={styles.fieldIcon} />
            <TextInput
              style={styles.textInput}
              value={currentPassword}
              onChangeText={setCurrentPassword}
              secureTextEntry={!showCurrent}
              placeholder="Enter current password"
              placeholderTextColor="#94A3B8"
            />
            <TouchableOpacity onPress={() => setShowCurrent(!showCurrent)} hitSlop={{ top: 10, bottom: 10, left: 10, right: 10 }}>
              <Ionicons name={showCurrent ? 'eye-off-outline' : 'eye-outline'} size={18} color="#64748B" />
            </TouchableOpacity>
          </View>
        </View>

        {/* New Password */}
        <View style={styles.field}>
          <Text style={styles.inputLabel}>{t('profile.newPassword', 'New Password')}</Text>
          <View style={styles.inputWrap}>
            <Ionicons name="key-outline" size={18} color="#64748B" style={styles.fieldIcon} />
            <TextInput
              style={styles.textInput}
              value={newPassword}
              onChangeText={setNewPassword}
              secureTextEntry={!showNew}
              placeholder="Min. 6 characters"
              placeholderTextColor="#94A3B8"
            />
            <TouchableOpacity onPress={() => setShowNew(!showNew)} hitSlop={{ top: 10, bottom: 10, left: 10, right: 10 }}>
              <Ionicons name={showNew ? 'eye-off-outline' : 'eye-outline'} size={18} color="#64748B" />
            </TouchableOpacity>
          </View>
        </View>

        {/* Confirm Password */}
        <View style={styles.field}>
          <Text style={styles.inputLabel}>{t('profile.confirmNewPassword', 'Confirm New Password')}</Text>
          <View style={styles.inputWrap}>
            <Ionicons name="checkmark-done-outline" size={18} color="#64748B" style={styles.fieldIcon} />
            <TextInput
              style={styles.textInput}
              value={confirmPassword}
              onChangeText={setConfirmPassword}
              secureTextEntry={!showConfirm}
              placeholder="Re-enter new password"
              placeholderTextColor="#94A3B8"
            />
            <TouchableOpacity onPress={() => setShowConfirm(!showConfirm)} hitSlop={{ top: 10, bottom: 10, left: 10, right: 10 }}>
              <Ionicons name={showConfirm ? 'eye-off-outline' : 'eye-outline'} size={18} color="#64748B" />
            </TouchableOpacity>
          </View>
        </View>

        {/* Submit */}
        <TouchableOpacity style={styles.submitBtn} onPress={handleSubmit} disabled={loading}>
          {loading ? (
            <ActivityIndicator color="#FFFFFF" />
          ) : (
            <>
              <Ionicons name="shield-checkmark" size={18} color="#FFFFFF" />
              <Text style={styles.submitBtnText}>{t('profile.updatePassword', 'Update Password')}</Text>
            </>
          )}
        </TouchableOpacity>
      </View>
      <View style={{ height: Spacing.xl }} />
    </ScrollView>
  );
}

const styles = StyleSheet.create({
  container: { flex: 1, backgroundColor: '#F8FAFC' },
  header: {
    paddingTop: 56,
    paddingBottom: 16,
    paddingHorizontal: Spacing.lg,
    backgroundColor: '#FFFFFF',
    borderBottomWidth: 1,
    borderBottomColor: '#E2E8F0',
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'space-between',
  },
  backBtn: {
    width: 38,
    height: 38,
    borderRadius: 19,
    alignItems: 'center',
    justifyContent: 'center',
    backgroundColor: '#F1F5F9',
  },
  headerTitle: { fontSize: 18, fontWeight: '800', color: '#0F172A', lineHeight: 28, paddingTop: 4 },
  content: { padding: Spacing.lg },

  subtitle: { fontSize: 13, color: '#64748B', marginBottom: 20, lineHeight: 20, paddingTop: 2 },

  bannerError: { flexDirection: 'row', alignItems: 'center', gap: 8, backgroundColor: '#FEE2E2', borderWidth: 1, borderColor: '#FCA5A5', padding: 12, borderRadius: BorderRadius.md, marginBottom: 16 },
  bannerErrorText: { fontSize: 13, color: '#991B1B', flex: 1, lineHeight: 19, paddingTop: 2 },
  bannerSuccess: { flexDirection: 'row', alignItems: 'center', gap: 8, backgroundColor: '#DCFCE7', borderWidth: 1, borderColor: '#86EFAC', padding: 12, borderRadius: BorderRadius.md, marginBottom: 16 },
  bannerSuccessText: { fontSize: 13, color: '#166534', flex: 1, lineHeight: 19, paddingTop: 2 },

  field: { marginBottom: Spacing.lg },
  inputLabel: { fontSize: 13, fontWeight: '700', color: '#334155', marginBottom: 6, lineHeight: 20, paddingTop: 2 },
  inputWrap: { flexDirection: 'row', alignItems: 'center', backgroundColor: '#FFFFFF', borderWidth: 1, borderColor: '#CBD5E1', borderRadius: BorderRadius.md, paddingHorizontal: 12, height: 48 },
  fieldIcon: { marginRight: 8 },
  textInput: { flex: 1, fontSize: 14, color: '#0F172A', paddingVertical: 0 },

  submitBtn: { backgroundColor: Colors.primary, flexDirection: 'row', alignItems: 'center', justifyContent: 'center', gap: 8, height: 50, borderRadius: BorderRadius.md, marginTop: Spacing.md },
  submitBtnText: { color: '#FFFFFF', fontSize: 15, fontWeight: '800', paddingTop: 2 },
});
