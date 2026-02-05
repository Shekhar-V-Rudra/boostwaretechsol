# Mobile App Build Instructions

## Quick Start Guide

### Step 1: Install Dependencies

```bash
cd mobile-app
npm install
```

### Step 2: Configure API URL

Edit `src/api.js` and update the API_BASE_URL:

**For Development:**
- iOS Simulator: `http://localhost:8000/api/v1`
- Android Emulator: `http://10.0.2.2:8000/api/v1`
- Physical Device: `http://YOUR_COMPUTER_IP:8000/api/v1`

**For Production:**
- `https://your-domain.com/api/v1`

### Step 3: Build Web App

```bash
npm run build
```

### Step 4: Initialize Capacitor

```bash
npx cap init
```

When prompted:
- App name: `BoostwareTech Solutions`
- App ID: `com.boostwaretech.solutions`
- Web dir: `dist`

### Step 5: Add Platforms

**For iOS (Mac only):**
```bash
npx cap add ios
npm run cap:sync
npm run cap:ios
```

**For Android:**
```bash
npx cap add android
npm run cap:sync
npm run cap:android
```

## Building for App Stores

### iOS App Store

1. Open Xcode:
   ```bash
   npm run cap:ios
   ```

2. In Xcode:
   - Select your development team
   - Go to Product → Archive
   - Click "Distribute App"
   - Choose "App Store Connect"
   - Follow the upload process

### Google Play Store

1. Open Android Studio:
   ```bash
   npm run cap:android
   ```

2. In Android Studio:
   - Build → Generate Signed Bundle / APK
   - Choose "Android App Bundle"
   - Create keystore (first time only)
   - Build the AAB file
   - Upload to Google Play Console

## Testing on Devices

### iOS Device

1. Connect iPhone via USB
2. Open Xcode
3. Select your device
4. Click Run

### Android Device

1. Enable Developer Options on your phone
2. Enable USB Debugging
3. Connect via USB
4. Run: `npx cap run android`

## Troubleshooting

### CORS Errors

Make sure your Laravel API allows mobile app requests. Add to `bootstrap/app.php`:

```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->api(prepend: [
        \Illuminate\Http\Middleware\HandleCors::class,
    ]);
})
```

Or use Laravel's CORS config if available.

### Network Connection Issues

- **iOS Simulator**: Use `localhost:8000`
- **Android Emulator**: Use `10.0.2.2:8000` (special IP for host machine)
- **Physical Device**: Use your computer's local IP (e.g., `192.168.1.100:8000`)

### Build Errors

1. Clear cache: `npm run build -- --force`
2. Re-sync: `npx cap sync`
3. Clean native projects in Xcode/Android Studio

## App Configuration

### App Icons

Place app icons in:
- iOS: `ios/App/App/Assets.xcassets/AppIcon.appiconset/`
- Android: `android/app/src/main/res/`

### Splash Screen

Configured in `capacitor.config.ts`. Customize images in platform folders.

## Production Checklist

- [ ] Update API URL to production
- [ ] Configure app icons
- [ ] Set up app signing certificates
- [ ] Test on physical devices
- [ ] Update app version
- [ ] Configure push notifications (if needed)
- [ ] Set up analytics (if needed)
- [ ] Test all features
- [ ] Prepare app store screenshots
- [ ] Write app description

## Support

For issues, check:
- [Capacitor Documentation](https://capacitorjs.com/docs)
- [Laravel API Documentation](https://laravel.com/docs)
