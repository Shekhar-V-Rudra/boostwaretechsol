# BoostwareTech Solutions Mobile App

Native mobile application built with Capacitor that connects to the Laravel backend API.

## Features

- 📱 Native iOS and Android support
- 🌐 Portfolio browsing
- 📝 Blog articles
- 💼 Services showcase
- 📧 Contact form
- 🎨 Modern UI/UX

## Prerequisites

- Node.js 18+ and npm
- iOS: Xcode (for Mac only)
- Android: Android Studio

## Installation

1. Install dependencies:
```bash
npm install
```

2. Install Capacitor CLI globally (if not already):
```bash
npm install -g @capacitor/cli
```

3. Sync Capacitor:
```bash
npm run cap:sync
```

## Development

Run the development server:
```bash
npm run dev
```

## Building for Production

1. Build the web app:
```bash
npm run build
```

2. Sync with native projects:
```bash
npm run cap:sync
```

## iOS Build

1. Open iOS project:
```bash
npm run cap:ios
```

2. In Xcode:
   - Select your device or simulator
   - Click the Run button
   - Or build for App Store distribution

## Android Build

1. Open Android project:
```bash
npm run cap:android
```

2. In Android Studio:
   - Select your device or emulator
   - Click Run
   - Or build APK/AAB for Play Store

## Configuration

### API URL

Update the API base URL in `src/api.js`:

```javascript
const API_BASE_URL = 'https://your-domain.com/api/v1';
```

For local development, use:
```javascript
const API_BASE_URL = 'http://localhost:8000/api/v1';
```

For Android emulator, use:
```javascript
const API_BASE_URL = 'http://10.0.2.2:8000/api/v1';
```

For iOS simulator, use:
```javascript
const API_BASE_URL = 'http://localhost:8000/api/v1';
```

## App Store Deployment

### iOS (App Store)

1. In Xcode:
   - Select "Any iOS Device"
   - Product → Archive
   - Upload to App Store Connect

### Android (Play Store)

1. In Android Studio:
   - Build → Generate Signed Bundle / APK
   - Create AAB for Play Store
   - Upload to Google Play Console

## Project Structure

```
mobile-app/
├── src/
│   ├── api.js          # API integration
│   ├── main.js         # App initialization
│   ├── navigation.js   # Navigation logic
│   ├── portfolio.js    # Portfolio features
│   ├── blog.js         # Blog features
│   ├── contact.js      # Contact form
│   └── styles.css      # App styles
├── index.html          # Main HTML
├── capacitor.config.ts # Capacitor config
└── package.json        # Dependencies
```

## API Endpoints Used

- `GET /api/v1/portfolios` - Get all portfolios
- `GET /api/v1/portfolios/{id}` - Get single portfolio
- `GET /api/v1/portfolios/categories` - Get categories
- `GET /api/v1/blogs` - Get all blogs
- `GET /api/v1/blogs/{slug}` - Get single blog
- `GET /api/v1/blogs/featured` - Get featured blogs
- `GET /api/v1/blogs/categories` - Get blog categories

## Troubleshooting

### CORS Issues

Make sure your Laravel API allows requests from the mobile app. Add to `config/cors.php`:

```php
'allowed_origins' => ['*'],
'allowed_methods' => ['*'],
'allowed_headers' => ['*'],
```

### Network Issues

- iOS Simulator: Use `localhost:8000`
- Android Emulator: Use `10.0.2.2:8000`
- Physical Device: Use your computer's IP address

## License

Copyright © 2026 BoostwareTech Solutions
