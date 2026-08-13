import React from 'react';
import { View, StyleSheet, Platform, Dimensions, Animated, Pressable } from 'react-native';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
import { Ionicons } from '@expo/vector-icons';
import { useTranslation } from 'react-i18next';
import { Colors, Shadows } from '../theme/colors';
import { useAuth } from '../store/AuthContext';
import { useAppTheme } from '../store/ThemeContext';

const { width } = Dimensions.get('window');

import HomeScreen from '../screens/Home/HomeScreen';
import AboutScreen from '../screens/About/AboutScreen';
import HaemophiliaScreen from '../screens/Haemophilia/HaemophiliaScreen';
import ProgramsScreen from '../screens/Programs/ProgramsScreen';
import DashboardScreen from '../screens/Dashboard/DashboardScreen';

const Tab = createBottomTabNavigator();

export default function BottomTabs() {
  const { user } = useAuth();
  const { t } = useTranslation();
  const { isDarkMode, theme } = useAppTheme();

  const TabBarButton = (props: any) => {
    const { children, onPress, onLongPress, accessibilityState, accessibilityRole, style } = props;
    const scale = React.useRef(new Animated.Value(1)).current;

    const handlePressIn = () => {
      Animated.spring(scale, { toValue: 0.85, useNativeDriver: true }).start();
    };
    const handlePressOut = () => {
      Animated.spring(scale, { toValue: 1, friction: 3, useNativeDriver: true }).start();
    };

    return (
      <Pressable
        onPress={onPress}
        onLongPress={onLongPress}
        onPressIn={handlePressIn}
        onPressOut={handlePressOut}
        accessibilityRole={accessibilityRole}
        accessibilityState={accessibilityState}
        style={style}
      >
        <Animated.View style={{ flex: 1, alignItems: 'center', justifyContent: 'center', transform: [{ scale }] }}>
          {children}
        </Animated.View>
      </Pressable>
    );
  };

  return (
    <Tab.Navigator
      screenOptions={({ route }) => ({
        headerShown: false,
        tabBarButton: (props) => <TabBarButton {...props} />,
        tabBarIcon: ({ focused }) => {
          let iconName: keyof typeof Ionicons.glyphMap = 'home';
          if (route.name === 'Home') iconName = focused ? 'home' : 'home-outline';
          else if (route.name === 'About') iconName = focused ? 'people' : 'people-outline';
          else if (route.name === 'Haemophilia') iconName = focused ? 'water' : 'water-outline';
          else if (route.name === 'Programs') iconName = focused ? 'medical' : 'medical-outline';
          else if (route.name === 'Account') iconName = focused || user ? 'person' : 'person-outline';

          return (
            <View style={styles.iconContainer}>
              <Ionicons name={iconName} size={22} color={focused ? '#DC2626' : (isDarkMode ? '#94A3B8' : '#64748B')} />
            </View>
          );
        },
        tabBarActiveTintColor: '#DC2626',
        tabBarInactiveTintColor: isDarkMode ? '#94A3B8' : '#64748B',
        tabBarStyle: [
          styles.tabBar,
          {
            backgroundColor: isDarkMode ? '#1E293B' : '#FFFFFF',
            borderTopColor: isDarkMode ? '#334155' : '#E2E8F0',
          },
        ],
        tabBarLabelStyle: styles.tabBarLabel,
      })}
    >
      <Tab.Screen name="Home" component={HomeScreen} options={{ tabBarLabel: t('nav.home', 'Home') }} />
      <Tab.Screen name="About" component={AboutScreen} options={{ tabBarLabel: t('nav.about', 'About') }} />
      <Tab.Screen name="Haemophilia" component={HaemophiliaScreen} options={{ tabBarLabel: t('nav.haemophilia', 'Haemophilia') }} />
      <Tab.Screen name="Programs" component={ProgramsScreen} options={{ tabBarLabel: t('nav.programs', 'Programs') }} />
      <Tab.Screen name="Account" component={DashboardScreen} options={{ tabBarLabel: t('dashboard.title', 'Account') }} />
    </Tab.Navigator>
  );
}

const styles = StyleSheet.create({
  tabBar: {
    borderTopWidth: 1,
    height: Platform.OS === 'ios' ? 88 : 70,
    paddingBottom: Platform.OS === 'ios' ? 28 : 10,
    paddingTop: 8,
    elevation: 8,
    shadowColor: '#000',
    shadowOffset: { width: 0, height: -2 },
    shadowOpacity: 0.05,
    shadowRadius: 6,
  },
  tabBarLabel: {
    fontSize: 11,
    fontWeight: '700',
    paddingTop: 4,
    paddingBottom: 2,
    lineHeight: 16,
  },
  iconContainer: {
    alignItems: 'center',
    justifyContent: 'center',
  },
});
