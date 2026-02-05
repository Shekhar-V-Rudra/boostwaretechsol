# PowerShell script to fix NativePHP npm install on Windows
# Run this script if you encounter the -4082 (EBUSY) error

Write-Host "Fixing NativePHP npm install issue..." -ForegroundColor Cyan

# Step 1: Kill any running Electron/Node processes
Write-Host "`nStep 1: Closing Electron/Node processes..." -ForegroundColor Yellow
Get-Process | Where-Object {$_.ProcessName -like "*electron*" -or $_.ProcessName -like "*node*"} | Stop-Process -Force -ErrorAction SilentlyContinue
Start-Sleep -Seconds 2

# Step 2: Navigate to Electron directory
$electronPath = "vendor\nativephp\desktop\resources\electron"
if (Test-Path $electronPath) {
    Set-Location $electronPath
    Write-Host "Step 2: Changed to Electron directory" -ForegroundColor Green
} else {
    Write-Host "Error: Electron directory not found!" -ForegroundColor Red
    exit 1
}

# Step 3: Clean install with npm ci (avoids file lock issues)
Write-Host "`nStep 3: Installing dependencies with npm ci..." -ForegroundColor Yellow
npm ci --prefer-offline --no-audit

if ($LASTEXITCODE -eq 0) {
    Write-Host "`n✅ Dependencies installed successfully!" -ForegroundColor Green
    Write-Host "`nYou can now run: php artisan native:run" -ForegroundColor Cyan
} else {
    Write-Host "`n❌ Installation failed. Try running as Administrator." -ForegroundColor Red
}

# Return to project root
Set-Location "d:\installations\laragon\www\boostwaretechsol"
