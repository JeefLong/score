@echo off
cd ./_Cache.d
del *.*  /F /Q
cd ../_Compile.d
del *.*  /F /Q
cd ../Application/Library/Phpqrcode/cache
del *.*  /F /Q
@pause