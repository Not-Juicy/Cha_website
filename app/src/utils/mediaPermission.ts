import { Platform, Alert, Linking } from 'react-native';
import * as ImagePicker from 'expo-image-picker';

export async function ensureMediaPermission(): Promise<boolean> {
  const perm = await ImagePicker.getMediaLibraryPermissionsAsync();
  if (perm.granted) return true;

  const canAsk = perm.canAskAgain;

  if (canAsk) {
    const req = await ImagePicker.requestMediaLibraryPermissionsAsync();
    if (req.granted) return true;
  }

  Alert.alert(
    'Photo permission needed',
    canAsk
      ? 'Allow photo access to choose a card photo.'
      : 'Photo access is turned off. You can enable it in your device Settings.',
    canAsk
      ? [{ text: 'OK', style: 'cancel' }]
      : [
          { text: 'Cancel', style: 'cancel' },
          { text: 'Open Settings', onPress: () => Linking.openSettings() },
        ]
  );
  return false;
}
