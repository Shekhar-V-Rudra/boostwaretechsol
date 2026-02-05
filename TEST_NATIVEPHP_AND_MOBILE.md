# How to Test NativePHP and Mobile App

## 🔧 Fix NativePHP npm Issue

The npm install error is a Windows file locking issue. Here are solutions:

### Solution 1: Wait and Retry (Simplest)

1. **Close ALL applications** (IDE, browsers, etc.)
2. **Wait 30 seconds** for file locks to release
3. **Try again:**
   ```bash
   php artisan native:run
   ```

### Solution 2: Manual npm Install (Recommended)

1. **Close all Electron/Node processes:**
   ```powershell
   Get-Process | Where-Object {$_.ProcessName -like "*electron*" -or $_.ProcessName -like "*node*"} | Stop-Process -Force
   ```

2. **Navigate to Electron directory:**
   ```powershell
   cd vendor\nativephp\desktop\resources\electron
   ```

3. **Check if node_modules exists:**
   ```powershell
   Test-Path node_modules
   ```
   If it returns `True`, dependencies are already installed!

4. **If node_modules exists, skip npm install:**
   - The error is just the installer trying to reinstall
   - Your app should work even with this error
   - Try running `php artisan native:run` again

5. **If node_modules doesn't exist, install manually:**
   ```powershell
   # Wait 1 minute, then try:
   npm ci --prefer-offline --no-audit
   ```

6. **Return to project:**
   ```powershell
   cd d:\installations\laragon\www\boostwaretechsol
   ```

7. **Run NativePHP:**
   ```powershell
   php artisan native:run
   ```

### Solution 3: Use Built Assets (Workaround)

If npm keeps failing, you can try building NativePHP directly:

```bash
php artisan native:build windows
```

This creates a standalone `.exe` file in the `dist` folder that you can run.

---

## 📱 How to Test Mobile App

### Step 1: Start Laravel API Server

**Terminal 1:**
```bash
php artisan serve
```

This starts your API at: `http://localhost:8000`

### Step 2: Configure Mobile App API URL

Edit `mobile-app/src/api.js`:

**For Android Emulator:**
```javascript
const API_BASE_URL = 'http://10.0.2.2:8000/api/v1';
```

**For iOS Simulator:**
```javascript
const API_BASE_URL = 'http://localhost:8000/api/v1';
```

**For Physical Device (use your computer's IP):**
```javascript
// Find your IP: ipconfig (Windows) or ifconfig (Mac/Linux)
const API_BASE_URL = 'http://192.168.1.XXX:8000/api/v1';
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

### Step 5: Test in Browser (Quick Test)

```bash
npm run preview
```

Open: `http://localhost:4173`

This lets you test the mobile app UI in a browser before building for native.

### Step 6: Test on Android

**Prerequisites:**
- Android Studio installed
- Android SDK configured
- Emulator or physical device connected

**Commands:**
```bash
# Add Android platform (first time only)
npx cap add android

# Sync and open Android Studio
npm run cap:android
```

**In Android Studio:**
1. Wait for Gradle sync to complete
2. Select your device/emulator
3. Click the green "Run" button
4. App will install and launch

### Step 7: Test on iOS (Mac Only)

**Prerequisites:**
- Xcode installed
- iOS Simulator or physical device

**Commands:**
```bash
# Add iOS platform (first time only)
npx cap add ios

# Sync and open Xcode
npm run cap:ios
```

**In Xcode:**
1. Select your simulator/device
2. Click the "Play" button
3. App will launch

---

## ✅ Quick Test Checklist

### NativePHP Desktop App:
- [ ] Laravel app works in browser (`php artisan serve`)
- [ ] Dependencies installed in `vendor/nativephp/desktop/resources/electron/node_modules`
- [ ] Run `php artisan native:run`
- [ ] Desktop window opens
- [ ] App displays correctly

### Mobile App:
- [ ] Laravel API running (`php artisan serve`)
- [ ] Mobile app dependencies installed (`cd mobile-app && npm install`)
- [ ] API URL configured in `mobile-app/src/api.js`
- [ ] App built (`npm run build`)
- [ ] Tested in browser (`npm run preview`)
- [ ] Android/iOS platform added
- [ ] App runs on device/emulator

---

## 🐛 Troubleshooting

### NativePHP Issues:

**Error: npm install failed**
- Dependencies are likely already installed
- Check: `Test-Path vendor\nativephp\desktop\resources\electron\node_modules`
- If True, try running `php artisan native:run` anyway

**Error: Window doesn't open**
- Check Laravel logs: `storage/logs/laravel.log`
- Make sure Laravel works in browser first
- Try: `php artisan config:clear && php artisan view:clear`

### Mobile App Issues:

**CORS Errors:**
- Make sure Laravel API allows mobile requests
- Check `config/cors.php` or add CORS middleware

**Network Connection Failed:**
- **Android Emulator**: Use `10.0.2.2:8000` (not localhost)
- **iOS Simulator**: Use `localhost:8000`
- **Physical Device**: Use your computer's local IP address

**API Not Found:**
- Make sure Laravel server is running
- Check API routes: `php artisan route:list | findstr api`
- Test API in browser: `http://localhost:8000/api/v1/portfolios`

---

## 🚀 Quick Start Commands

### Test NativePHP:
```bash
# 1. Start Laravel (if not using Laragon)
php artisan serve

# 2. Run NativePHP (in another terminal)
php artisan native:run
```

### Test Mobile App:
```bash
# 1. Start Laravel API
php artisan serve

# 2. Build mobile app
cd mobile-app
npm run build

# 3. Test in browser
npm run preview

# 4. Or test on device
npm run cap:android  # or cap:ios
```

---

## 📝 Notes

- **NativePHP** creates a desktop app from your Laravel app
- **Mobile App** is a separate Capacitor app that connects to your Laravel API
- Both use the same backend, but different frontends
- Mobile app needs the Laravel API to be running
- NativePHP runs Laravel internally, so no separate server needed

---

**Your apps are ready to test!** 🎉
