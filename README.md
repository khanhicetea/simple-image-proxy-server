# Simple Image Proxy Server

Powered by [intervention/image](http://image.intervention.io/)

## Guide

Example URL : `http://[your-domain-name]/index.php?s=7E0D0626111602763FAE22A905A5096F&w=413&h=640&url=aHR0cHM6Ly9pLmltZ3VyLmNvbS9xNE1xUS5qcGc=`

- URL query params
    + `url` : base64_encode of remote url
    + `w` : width of returned image (optional if height is set)
    + `h` : height of  returned image (optional if width is set)
    + `s` : signature to verify origin
- `storage` directory contains 2 sub-dirs:
    + `image` : storage downloaded image from remote resource
    + `cache` : store manipulated image to re-use in next request
- supports `signature` via `s` query param with simple hash function : `$signature = md5(base64_encode($remote_url).$secret)` (left it blank means no checking signature)

**For large scale of production environment, please consider use [Thumbor](https://github.com/thumbor/thumbor)**

## LICENSE

This project is licensed under the MIT license.