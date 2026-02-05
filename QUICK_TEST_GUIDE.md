# Quick Test Guide - NativePHP & Mobile App

## ✅ Good News!

Your NativePHP dependencies are **already installed**! The error is just the installer trying to reinstall them.

## 🖥️ Test NativePHP Desktop App

### Option 1: Try Running Again

The app should work even with the npm error. Try:

```bash
php artisan native:run
```

**What should happen:**
- A desktop window opens
- Shows your BoostwareTech Solutions website
- Window title: "BoostwareTech Solutions"
- Size: 1200x800

### Option 2: If Window Doesn't Open

1. **Check Laravel works first:**
   ```bash
   php artisan serve
   ```
   Open: `http://localhost:8000` in browser
   - If this works, NativePHP should work too

2. **Clear caches:**
   ```bash
   php artisan config:clear
   php artisan view:clear
   php artisan route:clear
   ```

3. **Try again:**
   ```bash
   php artisan native:run
   ```

---

## 📱 Test Mobile App

### Step 1: Start Laravel API

**Terminal 1:**
```bash
php artisan serve
# Or if using Laragon, make sure it's running
```

Your API will be at: `http://localhost:8000`

### Step 2: Update Mobile App API URL

Edit `mobile-app/src/api.js`:

**For Development (Android Emulator):**
```javascript
const API_BASE_URL = 'http://10.0.2.2:8000/api/v1';
```

**For Development (iOS Simulator):**
```javascript
const API_BASE_URL = 'http://localhost:8000/api/v1';
```

**For Physical Device:**
1. Find your computer's IP:
   ```bash
   ipconfig  # Windows
   # Look for IPv4 Address (e.g., 192.168.1.100)
   ```

2. Update `mobile-app/src/api.js`:
   ```javascript
   const API_BASE_URL = 'http://YOUR_IP:8000/api/v1';
   // Example: 'http://192.168.1.100:8000/api/v1'
   ```

### Step 3: Install & Build Mobile App

```bash
cd mobile-app
npm install
npm run build
```

### Step 4: Quick Browser Test

Test the mobile app UI in browser:

```bash
npm run preview
```

Open: `http://localhost:4173`

This lets you see the mobile app without needing Android Studio or Xcode!

### Step 5: Test on Android

**Prerequisites:**
- Android Studio installed
- Android emulator running OR physical device connected

**Commands:**
```bash
# First time only - add Android platform
npx cap add android

# Sync and open Android Studio
npm run cap:android
```

**In Android Studio:**
1. Wait for Gradle to sync
2. Select your device/emulator from dropdown
3. Click green "Run" button ▶️
4. App installs and launches!

### Step 6: Test on iOS (Mac Only)

**Prerequisites:**
- Xcode installed
- iOS Simulator or physical device

**Commands:**
```bash
# First time only - add iOS platform
npx cap add ios

# Sync and open Xcode
npm run cap:ios
```

**In Xcode:**
1. Select simulator/device
2. Click "Play" button ▶️
3. App launches!

---

## 🔍 Verify Everything Works

### Check Laravel API:

```bash
# Test API endpoints in browser:
http://localhost:8000/api/v1/portfolios
http://localhost:8000/api/v1/blogs
http://localhost:8000/api/v1/blogs/featured
```

You should see JSON data.

### Check Mobile App API Connection:

1. Open mobile app
2. Check browser console (F12) or device logs
3. Look for API calls
4. Should see portfolio/blog data loading

---

## 🐛 Common Issues & Fixes

### NativePHP: Window doesn't open

**Fix:**
```bash
# Make sure Laravel works first
php artisan serve
# Test in browser, then try native:run again
```

### Mobile App: CORS Error

**Fix:** Make sure Laravel allows CORS. Check `config/cors.php`:
```php
'allowed_origins' => ['*'],
'allowed_methods' => ['*'],
'allowed_headers' => ['*'],
```

### Mobile App: Network Error

**Fix:** Check API URL:
- Android Emulator: `10.0.2.2:8000` (NOT localhost)
- iOS Simulator: `localhost:8000`
- Physical Device: Your computer's IP address

### Mobile App: API returns 404

**Fix:**
1. Make sure Laravel server is running
2. Check route exists: `php artisan route:list | findstr api`
3. Test API in browser first

---

## ✅ Success Checklist

### NativePHP:
- [ ] `php artisan native:run` executes
- [ ] Desktop window opens
- [ ] Home page displays
- [ ] Navigation works

### Mobile App:
- [ ] Laravel API running
- [ ] API URL configured correctly
- [ ] `npm run build` succeeds
- [ ] `npm run preview` shows app
- [ ] App runs on device/emulator
- [ ] Data loads from API

---

## 🚀 Quick Commands Reference

```bash
# NativePHP
php artisan native:run

# Mobile App - Development
cd mobile-app
npm install
npm run build
npm run preview  # Browser test

# Mobile App - Android
npm run cap:android

# Mobile App - iOS
npm run cap:ios

# Laravel API
php artisan serve
```

---

**You're all set! Start testing!** 🎉
