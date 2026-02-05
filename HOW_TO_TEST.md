# How to Test NativePHP & Mobile App

## ✅ Status Check

### NativePHP Dependencies
✅ **INSTALLED** - Your dependencies are already in place!
- Location: `vendor/nativephp/desktop/resources/electron/node_modules`
- The npm error is just the installer trying to reinstall (Windows file lock issue)
- **Your app should work despite the error!**

### Mobile App
✅ **READY** - Mobile app is set up and ready to test!

---

## 🖥️ Test NativePHP Desktop App

### Quick Test:

```bash
php artisan native:run
```

**Expected Result:**
- A desktop window opens automatically
- Window title: "BoostwareTech Solutions"
- Window size: 1200x800
- Shows your home page at `/`

**If window doesn't open:**

1. **First, verify Laravel works:**
   ```bash
   php artisan serve
   ```
   Open `http://localhost:8000` in browser
   - If this works, NativePHP should work too

2. **Clear caches:**
   ```bash
   php artisan config:clear
   php artisan view:clear
   ```

3. **Try NativePHP again:**
   ```bash
   php artisan native:run
   ```

**Note:** The npm install error can be ignored if dependencies already exist (which they do).

---

## 📱 Test Mobile App

### Step 1: Start Laravel API Server

**Terminal 1:**
```bash
php artisan serve
```

Your API will be available at: `http://localhost:8000`

**Verify API works:**
Open in browser:
- `http://localhost:8000/api/v1/portfolios`
- `http://localhost:8000/api/v1/blogs`

You should see JSON data.

### Step 2: Configure Mobile App API URL

The mobile app API URL is in: `mobile-app/src/api.js`

**Current setting:** `http://localhost:8000/api/v1`

**For different testing scenarios:**

**Android Emulator:**
```javascript
const API_BASE_URL = 'http://10.0.2.2:8000/api/v1';
```

**iOS Simulator:**
```javascript
const API_BASE_URL = 'http://localhost:8000/api/v1';
```

**Physical Device (Your IP: 192.168.0.102):**
```javascript
const API_BASE_URL = 'http://192.168.0.102:8000/api/v1';
```

**Production:**
```javascript
const API_BASE_URL = 'https://your-domain.com/api/v1';
```

### Step 3: Install Mobile App Dependencies

**Terminal 2:**
```bash
cd mobile-app
npm install
```

### Step 4: Build Mobile App

```bash
npm run build
```

This creates optimized files in `mobile-app/dist/`

### Step 5: Quick Browser Test (Easiest!)

Test the mobile app UI without Android Studio/Xcode:

```bash
npm run preview
```

Open: `http://localhost:4173`

**What you'll see:**
- Mobile app interface
- Portfolio section
- Blog section
- Contact form
- All UI elements

**Note:** API calls will work if Laravel server is running!

### Step 6: Test on Android Device/Emulator

**Prerequisites:**
- Android Studio installed
- Android emulator running OR physical device connected via USB

**Commands:**
```bash
# First time only - add Android platform
npx cap add android

# Sync and open Android Studio
npm run cap:android
```

**In Android Studio:**
1. Wait for Gradle sync (bottom right)
2. Select device from dropdown (top toolbar)
3. Click green "Run" button ▶️
4. App installs and launches!

**Important:** If using Android Emulator, update API URL to:
```javascript
const API_BASE_URL = 'http://10.0.2.2:8000/api/v1';
```

### Step 7: Test on iOS (Mac Only)

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
1. Select simulator/device from dropdown
2. Click "Play" button ▶️
3. App launches!

---

## 🔍 Verify Everything Works

### Check NativePHP:
- [ ] `php artisan native:run` executes
- [ ] Desktop window opens
- [ ] Home page displays correctly
- [ ] Navigation works (Portfolio, Services, Blog, etc.)
- [ ] No errors in window

### Check Mobile App:
- [ ] Laravel API running (`php artisan serve`)
- [ ] API endpoints return data (test in browser)
- [ ] Mobile app built (`npm run build`)
- [ ] Browser preview works (`npm run preview`)
- [ ] App runs on device/emulator
- [ ] Data loads from API (portfolios, blogs)

---

## 🐛 Troubleshooting

### NativePHP Issues:

**Problem:** npm install error (-4082)
- **Solution:** Dependencies are already installed. Ignore the error and try `php artisan native:run` anyway.

**Problem:** Window doesn't open
- **Solution:** 
  1. Make sure Laravel works in browser first
  2. Clear caches: `php artisan config:clear && php artisan view:clear`
  3. Check logs: `storage/logs/laravel.log`

### Mobile App Issues:

**Problem:** CORS Error
- **Solution:** Make sure Laravel allows CORS. Check `config/cors.php`:
  ```php
  'allowed_origins' => ['*'],
  'allowed_methods' => ['*'],
  'allowed_headers' => ['*'],
  ```

**Problem:** Network Connection Failed
- **Solution:** Check API URL:
  - Android Emulator: `10.0.2.2:8000` (NOT localhost!)
  - iOS Simulator: `localhost:8000`
  - Physical Device: Your computer's IP (192.168.0.102:8000)

**Problem:** API returns 404
- **Solution:**
  1. Make sure Laravel server is running
  2. Test API in browser: `http://localhost:8000/api/v1/portfolios`
  3. Check routes: `php artisan route:list | findstr api`

**Problem:** App shows blank screen
- **Solution:**
  1. Check browser console for errors
  2. Make sure `npm run build` completed successfully
  3. Verify API URL is correct
  4. Check Laravel server is running

---

## 🚀 Quick Command Reference

```bash
# NativePHP Desktop App
php artisan native:run

# Laravel API Server
php artisan serve

# Mobile App - Setup
cd mobile-app
npm install
npm run build

# Mobile App - Browser Test
npm run preview

# Mobile App - Android
npm run cap:android

# Mobile App - iOS
npm run cap:ios
```

---

## 📝 Important Notes

1. **NativePHP** = Desktop app (Windows/Mac/Linux)
   - Runs Laravel internally
   - No separate server needed
   - Just run `php artisan native:run`

2. **Mobile App** = iOS/Android app
   - Needs Laravel API running separately
   - Connects via API endpoints
   - Requires Android Studio or Xcode for device testing

3. **API URL Configuration:**
   - Different for emulator vs physical device
   - Android emulator uses special IP: `10.0.2.2`
   - Physical devices use your computer's IP: `192.168.0.102`

---

## ✅ Success Indicators

### NativePHP Working:
- Desktop window opens
- App displays correctly
- Navigation works
- All features functional

### Mobile App Working:
- App launches on device/emulator
- Portfolio data loads
- Blog posts display
- Contact form works
- No network errors

---

**You're ready to test! Start with the browser preview for mobile app, and `php artisan native:run` for desktop app!** 🎉
