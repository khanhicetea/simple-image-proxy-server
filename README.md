# Simple Image Proxy Server

Powered by [intervention/image](http://image.intervention.io/)

## Guide

- URL query params
    + `url` : base64_encode of remote url
    + `w` : width of returned image
    + `h` : height of  returned image
    + `s` : signature to verify origin
- `storage` directory contains 2 sub-dirs:
    + `image` : storage downloaded image from remote resource
    + `cache` : store manipulated image to re-use in next request
- supports `signature` via `s` query param with simple hash function : `$signature = md5(base64_encode($remote_url).$secret)` (left it blank means no checking signature)

**For large scale of production environment, please consider use [Thumbor](https://github.com/thumbor/thumbor)**

## LICENSE

This project is licensed under the MIT license.