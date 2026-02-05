# Fix NativePHP Install Error (-4082)

## Problem
The error `-4082` (EBUSY) occurs because Windows has locked the Electron files during npm install.

## Solutions

### Solution 1: Close All Processes (Recommended)

1. **Close any running Electron/NativePHP apps:**
   - Check Task Manager for `electron.exe` processes
   - End any NativePHP-related processes

2. **Close your IDE/Editor:**
   - Sometimes IDEs lock files
   - Close and reopen if needed

3. **Disable Antivirus temporarily:**
   - Windows Defender or other antivirus may lock files
   - Temporarily disable real-time scanning

4. **Run the installer again:**
   ```bash
   php artisan native:install --force
   ```

### Solution 2: Manual Install (If Solution 1 doesn't work)

The dependencies are already installed in `vendor/nativephp/desktop/resources/electron/node_modules`.

You can skip the npm install step by:

1. **Edit composer.json** to remove the post-update-cmd temporarily:
   ```json
   "post-update-cmd": [
       "@php artisan vendor:publish --tag=laravel-assets --ansi --force"
   ]
   ```

2. **Or run composer update with --no-scripts:**
   ```bash
   composer update --no-scripts
   ```

### Solution 3: Use NativePHP Without Full Install

NativePHP should work even if npm install fails, as long as:
- The package is installed via Composer ✅
- The service provider exists ✅
- Configuration file exists ✅

The npm dependencies are only needed for building the Electron app.

### Solution 4: Clean Install

1. **Delete node_modules:**
   ```powershell
   Remove-Item -Recurse -Force vendor\nativephp\desktop\resources\electron\node_modules
   ```

2. **Clear npm cache:**
   ```bash
   npm cache clean --force
   ```

3. **Reinstall:**
   ```bash
   cd vendor\nativephp\desktop\resources\electron
   npm install
   ```

## Quick Fix (Recommended)

Since the dependencies appear to already be installed, you can:

1. **Skip the npm install error** - NativePHP should still work
2. **Test if it works:**
   ```bash
   php artisan native:run
   ```

If it works, you're done! The error only affects the installer, not the actual functionality.

## Verify Installation

Check if NativePHP is properly installed:

```bash
php artisan list | grep native
```

You should see commands like:
- `native:build`
- `native:run`
- `native:install`

## If NativePHP Still Doesn't Work

1. Check if the service provider is registered
2. Verify `config/nativephp.php` exists
3. Check `app/Providers/NativeAppServiceProvider.php` exists
4. Try running: `php artisan native:run`

The npm install error is just for Electron dependencies - your Laravel app with NativePHP should still function!
