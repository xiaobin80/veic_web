---
title: "Build your own PHP on Windows"
date: 2021-04-20T10:08:08+08:00
---
Build Dev:
- VS2017
- [phpsdk](https://github.com/Microsoft/php-sdk-binary-tools)

1. Enter build
```bash
cd D:\progFiles\php-sdk-binary-tools-php-sdk-2.2.0
phpsdk-vc15-x64.bat
``` 

2. Gen deps directory
```bash
D:\progFiles
phpsdk_buildtree phpdev
```

3. git php src
```
cd d:\progFiles\phpdev\vc15\x64
git clone -b PHP-7.4.* https://github.com/php/php-src.git
```
*: version number

4. deps updates
```bash
phpsdk_deps --update
```

5. build
```bash
buildconf && configure && nmake
```