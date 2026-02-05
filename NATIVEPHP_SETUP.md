# NativePHP Setup Guide

## ✅ Installation Complete

NativePHP Desktop has been successfully installed in your Laravel application!

## Configuration

### 1. Update .env file

Add these configuration values to your `.env` file:

```env
# NativePHP Configuration
NATIVEPHP_APP_ID=com.boostwaretech.solutions
NATIVEPHP_APP_VERSION=1.0.0
NATIVEPHP_APP_AUTHOR=BoostwareTech Solutions
NATIVEPHP_APP_DESCRIPTION=IT Services Platform - Native Desktop Application
NATIVEPHP_APP_WEBSITE=https://boostwaretech.com
NATIVEPHP_APP_COPYRIGHT=Copyright © 2026 BoostwareTech Solutions
```

### 2. NativeAppServiceProvider

The service provider is located at `app/Providers/NativeAppServiceProvider.php` and is configured to:
- Open the home page (`/`)
- Window size: 1200x800
- Remember window state, size, and position

## Running the Native App

### Development Mode

```bash
php artisan native:run
```

This will:
1. Start your Laravel application
2. Open it in a native desktop window
3. Enable hot-reloading for development

### Alternative: Use Composer Script

```bash
composer native:dev
```

## Building for Distribution

### Build Native App

```bash
php artisan native:build
```

This creates a distributable app in the `dist` folder.

### Platform-Specific Builds

**Windows:**
```bash
php artisan native:build windows
```

**macOS:**
```bash
php artisan native:build macos
```

**Linux:**
```bash
php artisan native:build linux
```

## Features Available

Your native app includes:

✅ **All Laravel Features**
- Full Laravel application
- Livewire components
- Database access
- All routes and controllers

✅ **Native Desktop Features**
- Native window controls
- System integration
- File system access
- Notifications
- Global shortcuts
- Menu bars

✅ **Your Existing Features**
- Portfolio management
- Blog system
- Contact form
- Admin panel
- API endpoints

## Customization

### Window Configuration

Edit `app/Providers/NativeAppServiceProvider.php`:

```php
Window::open()
    ->url('/')                    // Starting URL
    ->width(1200)                 // Window width
    ->height(800)                 // Window height
    ->title('Your App Name')      // Window title
    ->rememberState()             // Remember window state
    ->rememberSize()              // Remember window size
    ->rememberPosition();         // Remember window position
```

### Menu Bar

You can add a menu bar in the `boot()` method:

```php
use Native\Desktop\Facades\MenuBar;

MenuBar::create()
    ->label('File')
    ->submenu('New', fn() => ...)
    ->submenu('Open', fn() => ...);
```

### Notifications

```php
use Native\Desktop\Facades\Notification;

Notification::create()
    ->title('Hello!')
    ->body('This is a notification')
    ->show();
```

## Troubleshooting

### App won't start

1. Make sure Laravel app works in browser first
2. Check PHP version (8.3+ required)
3. Run `php artisan native:install` again

### Window not opening

- Check `app/Providers/NativeAppServiceProvider.php`
- Verify the URL is correct
- Check Laravel logs: `storage/logs/laravel.log`

### Build errors

- Ensure Node.js 22+ is installed
- Run `npm install` in project root
- Check all dependencies are installed

## Next Steps

1. **Test the app:**
   ```bash
   php artisan native:run
   ```

2. **Customize the window:**
   - Edit `app/Providers/NativeAppServiceProvider.php`
   - Adjust size, title, and behavior

3. **Add native features:**
   - Menu bars
   - System tray
   - Notifications
   - Global shortcuts

4. **Build for distribution:**
   ```bash
   php artisan native:build
   ```

## Documentation

- [NativePHP Desktop Docs](https://nativephp.com/docs/desktop/2/getting-started/installation)
- [NativePHP GitHub](https://github.com/nativephp/nativephp)

## Support

For issues or questions:
- Check NativePHP documentation
- Review Laravel logs
- Test in browser first before native

---

**Your native desktop app is ready!** 🎉

Run `php artisan native:run` to see it in action.
